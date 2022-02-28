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
        $api = new Api('rzp_test_AUZM3pIm1dTRB7', 'CsQzqnGwJdgAdBRtoiKOFCa9');
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
            'razorpay_key' => 'rzp_test_AUZM3pIm1dTRB7',
            'amount' => $order->total_amount * 100,
            'name' => $order->address->name,
            'currency' => 'INR',
            'email' => $order->address->email,
            'contactNumber' =>$order->address->mobile,
            'address' => $order->address->address,
            'description' => 'Testing description',
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
        $order = Order::where('payment_status','process')->where('user_id',auth()->user()->id)->where('order_number',$order_number)->first();

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
            $order->save();
            $payment->save();
            Alert::success("Payment done successfully");

            try
            {
              $email = @auth()->user()->email;
              $user = @auth()->user();
              $orderDetails = $order;

              foreach($order->order_list as $orderList)
              {
                 $stock = ProductStock::where('product_id',$orderList->product_id)->where('color_id',$orderList->color_id)->where('size_id',$orderList->size_id)->first();
                 $stock->decrement('stock_qty', $orderList->quantity);
              }

              Mail::send('mail.complete-order-cus', ['user' => $user,'orderDetails' => $orderDetails], function ($message) use ($email) {
                  $message->to($email);
                  $message->subject('Thanks for shopping with us');
              });

              $orderId = $order->order_number;
              Mail::send('mail.invoice-order-details-cus', ['user' => $user,'orderDetails' => $orderDetails], function ($message) use ($email,$orderId) {
                $message->to($email);
                $message->subject('Invoice for order ' . $orderId);
            });

              $adminUser = User::where('role','admin')->first();
              $email = $adminUser->email;
              Mail::send('mail.new-order-admin', ['user' => $user,'orderDetails' => $orderDetails], function ($message) use ($email) {
                $message->to($email);
                $message->subject('New order received!');
              });
            }
            catch(exception $e)
            {
                dd($e);
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
          $api = new Api('rzp_test_AUZM3pIm1dTRB7','CsQzqnGwJdgAdBRtoiKOFCa9');
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