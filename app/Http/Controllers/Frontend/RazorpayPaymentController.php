<?php
namespace App\Http\Controllers\Frontend;
use Alert;
use App\User;
use App\Models\Order;
use Razorpay\Api\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Support\Facades\Mail;
use Session,Auth;
use App\Models\ProductStock;
use Seshac\Shiprocket\Shiprocket;
use App\Models\Coupon;

class RazorpayPaymentController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create_razorpay_order($order)
    {   
        $receiptId = $order->order_number;      
        // Create an object of razorpay
        $payment = new Payment();
        $api = new Api(env('RAZORPAY_CLIENT_ID'), env('RAZORPAY_CLIENT_SECRET'));
        // In razorpay you have to convert rupees into paise we multiply by 100
        // Currency will be INR
        // Creating order
        $razerpay_order = $api->order->create(
            array(
                'receipt' => $receiptId,
                'amount' => $order->total_amount * 100,
                'currency' => 'INR',
                )
        );

        // Return response on payment page
        $response = [
            'razerpay_order_id' => $razerpay_order['id'],
            'razorpay_key' => env('RAZORPAY_CLIENT_ID'),
            'amount' => $order->total_amount * 100,
            'name' => $order->address->name,
            'currency' => 'INR',
            'email' => $order->address->email,
            'contactNumber' =>$order->address->mobile,
            'address' => $order->address->address,
            'description' => 'Zehna',
        ];

        $payment->payment_order_id =  $razerpay_order['id'];
        $payment->payment_mode = 'razerpay';
        $payment->user_id = auth()->user()->id;
        $payment->order_number = $order->order_number;
        $payment->save();
        
        return $response;

    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */

     public function payment_initiate($order_number)
     {
        $orderNumberString = str_replace('_',' ',$order_number);
        $orderNumberString = str_replace('O','/',$orderNumberString);
        $order = Order::where('payment_status','process')->where('user_id',auth()->user()->id)->where('order_number',$orderNumberString)->first();

        if($order):
            $response =json_decode( $order->razerpay_order,true);
            return view('payment_initiate',compact('order','response'));
        else:
            Alert::error("Payment failed..");
            return redirect('/');
        endif;        
     }



    function payment_response(Request $request)
    {
        // Now verify the signature is correct . We create the private function for verify the signature
        $signatureStatus = $this->SignatureVerify(
          $request->all()['rzp_signature'],
          $request->all()['rzp_paymentid'],
          $request->all()['rzp_orderid']
      );
      
      $payment= Payment::where('payment_order_id',$request->all()['rzp_orderid'])->first();
  
      $order = Order::where('order_number',$payment->order_number)->first();
      $payment->payment_id = $request->all()['rzp_paymentid'];
      $payment->payment_signature = $request->all()['rzp_signature'];

      // If Signature status is true We will save the payment response in our database
      // In this tutorial we send the response to Success page if payment successfully made
      
        if($signatureStatus == true)
        {
            $payment->payment_status ='paid';
            $order->payment_status='paid';
            $order->status=1;
            if($order->giftcard_id != 0)
            {
                $coupon = Coupon::where('id',$order->giftcard_id)->first();
                if($coupon->is_giftcard == 1)
                {
                    $coupon->is_used = 1;
                    $coupon->save();
                }
                else
                {
                    $coupon->decrement('max_use', 1);
                }
            }
            $order->save();
            $payment->save();
            Alert::success("Payment done successfully");

            try
            {
              $email = @auth()->user()->email;
              $user = @auth()->user();
              $orderDetails = $order;
              $orderItems = [];
              $subItem = [];

              $flag = 0;

              foreach($order->order_list as $orderList)
              {
                if($orderList->product->is_giftcard == 0)
                {                    
                    $stock = ProductStock::where('product_id',$orderList->product_id)->where('color_id',$orderList->color_id)->where('size_id',$orderList->size_id)->first();
                    $stock->decrement('stock_qty', $orderList->quantity);
                    $subItem =  [            
                        "name" => $orderList->product->name,
                        "sku" => $orderList->product->design.substr($orderList->color->name, 0, 1).$orderList->size->name,
                        "units" => $orderList->quantity,
                        "selling_price" => $orderList->price,
                        "discount"=> $orderList->discount,
                        "tax" => "",
                        "hsn" => $orderList->product->hsn, 
                    ];    
                    array_push($orderItems,$subItem);
                }  
                else
                {  
                    $flag = 1;
                    for($i=0; $i < $orderList->quantity; $i++)
                    {   
                            $data['code'] = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 16);
                            $code = $data['code'];
                            $data['type'] = 'fixed';
                            $data['is_used'] = 0;
                            $data['value'] =  $orderList->price;
                            $data['status'] = '1';
                            Coupon::create($data);

                            $name = $orderList->name;
                            $email = $orderList->email;
                            $messageP = $orderList->message;
                            $fromName = $orderList->from_name;

                            try
                            {                                
                                Mail::send('mail.email-giftcard', ['name' => $name,'fromName' => $fromName,'messagep' => $messageP,'code' => $code], function ($message) use ($email) {
                                    $message->to($email);
                                    $message->subject('Your Gift Card Is Here');
                                });
                            }
                            catch(\Exception $e)
                            {
                            }
                    }
                }
              }

              $email = @auth()->user()->email;

              try
              { 
                Mail::send('mail.complete-order-cus', ['user' => $user,'orderDetails' => $orderDetails], function ($message) use ($email) {
                    $message->to($email);
                    $message->subject('Thanks for shopping with us');
                });
              }
              catch(\Exception $e)
              {
              }  

              $orderId = $order->order_number;
              try
              {
                Mail::send('mail.invoice-order-details-cus', ['user' => $user,'orderDetails' => $orderDetails], function ($message) use ($email,$orderId) {
                    $message->to($email);
                    $message->subject('Invoice for order ' . $orderId);
                });
              }
              catch(\Exception $e)
              {
              }  

              $adminUser = User::where('role','admin')->first();
              $email = $adminUser->email;
              try
              {
                Mail::send('mail.new-order-admin', ['user' => $user,'orderDetails' => $orderDetails], function ($message) use ($email) {
                    $message->to($email);
                    $message->subject('New order received!');
                });
              }
              catch(\Exception $e)
              {
              }  

              if($flag == 0)
              {
                    //API data to push it into shiprocket
                    $orderDetails = [
                        "order_id" => $order->order_number,
                        "order_date"  => $order->created_at,
                        "pickup_location"  => "Primary",
                        "channel_id" => "",
                        "comment" => $order->order_note,
                        "billing_customer_name" => @$order->address->first_name,
                        "billing_last_name" => "",
                        "billing_address" => @$order->address->address,
                        "billing_address_2" => @$order->address->address2,
                        "billing_city" => @$order->address->get_city->name,
                        "billing_pincode" => @$order->address->pincode,
                        "billing_state" => @$order->address->get_state->name,
                        "billing_country" => "India",
                        "billing_email" => @$order->address->email,
                        "billing_phone" => @$order->address->mobile,
                        "shipping_is_billing" => true,
                        "shipping_customer_name"=> "",
                        "shipping_last_name"=> "",
                        "shipping_address" => "",
                        "shipping_address_2" => "",
                        "shipping_city"=> "",
                        "shipping_pincode" => "",
                        "shipping_country" => "",
                        "shipping_state" =>  "",
                        "shipping_email"  => "",
                        "shipping_phone" => "",
                        "order_items" => $orderItems,
                        "payment_method" => "Prepaid",
                        "shipping_charges" => 0,
                        "giftwrap_charges" => 0,
                        "transaction_charges" => 0,
                        "total_discount" =>  0,
                        "sub_total" => @$order->total_amount,
                        "length" => 10,
                        "breadth" => 15,
                        "height"=> 20,
                        "weight"=> 2.5          
                    ];
            
                    // $orderDetails = json_encode($orderDetails);
                    $token =  Shiprocket::getToken(); //create token of shiprocket
                    $response =  Shiprocket::order($token)->create($orderDetails);
                    if($response)
                    {
                        if(isset($response['order_id']));
                        {
                            $order->shiprocket_order_id=$response['order_id'];
                            $order->save();
                        }                        
                    }
                } 
            }
            catch(exception $e)
            {
            }
           
            $flag = Session::get('flag');

            if($flag == 0)
            {
                return redirect('/user');
            }
            else
            {   
                Session::put('orderId',$order->id);
                Session::forget('user');
                Auth::logout();
                return  redirect('/viewOrderDetails');
            }
            //   return view('payment-success-page');
        }
        else
        {
            $payment->status ='failed';
            $order->payment_status='failed';
            $order->save();
            $payment->save();
            Alert::error("Payment failed..");
            return redirect('/');
        }  
    }


    private function SignatureVerify($_signature,$_paymentId,$_orderId)
    {
      try
      {
          // Create an object of razorpay class
          $api = new Api(env('RAZORPAY_CLIENT_ID'),env('RAZORPAY_CLIENT_SECRET'));
          $attributes  = array('razorpay_signature'  => $_signature,  'razorpay_payment_id'  => $_paymentId ,  'razorpay_order_id' => $_orderId);
          $order  = $api->utility->verifyPaymentSignature($attributes);
          return true;
      }
      catch(\Exception $e)
      {
          // If Signature is not correct its give a excetption so we use try catch
          return false;
      }
    }
     
}