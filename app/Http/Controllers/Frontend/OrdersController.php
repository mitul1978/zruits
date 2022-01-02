<?php
namespace App\Http\Controllers\Frontend;
use Str;

use Alert;
use Helper;
use App\User;
use App\Models\Cart;
use App\Models\Order;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use App\Models\OrderProductList;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Notifications\StatusNotification;
use App\Http\Controllers\Frontend\RazorpayPaymentController;
use Notification;
class OrdersController extends Controller
{

 

    function place_order(Request $request){

  

        $requestData = $request->all();


        if(count(get_cart())){

            if($request->address_id =='new' || $request->address_id == null){
                $this->validate($request,[
                    'mobile'=>'required',
                    'last_name'=>'required',
                    'email'=>'required|email',
                    'first_name'=>'required',
                    'address'=>'required',
                    'state_id'=>'required',
                    'city_id'=>'required',
                    'pincode' => 'required|integer|regex:/\b\d{6}\b/|exists:pincodes,pincode',
                ],[
                    'pincode.regex'=>'Please enter a valid 6 digit pincode',
                    'pincode.required' => 'The pincode field is required',
                    'pincode.exists' => 'Pincode is not exists',
                ]);

            }else{
               $address =  UserAddress::find($request->address_id)->toArray();
               $request_address = new Request($address);

               $this->validate($request_address,[
                'mobile'=>'required',
                'last_name'=>'required',
                'email'=>'required|email',
                'first_name'=>'required',
                'address'=>'required',
                'state_id'=>'required',
                'city_id'=>'required',
                'pincode' => 'required|integer|regex:/\b\d{6}\b/|exists:pincodes,pincode',
                ],[
                    'pincode.regex'=>'Please enter a valid 6 digit pincode',
                    'pincode.required' => 'The pincode field is required',
                    'pincode.exists' => 'Pincode is not exists',
                ]);
                

                $requestData =$request_address->all() ;
                $requestData['address_id'] = $request->address_id;
            }



            DB::beginTransaction();
            try {

                $total_amount = 0;
                $order=new Order();
                $order->order_number='O-'.auth()->user()->id.'-'.strtoupper(time());
                $order->user_id=auth()->user()->id;
    
                if(session('coupon')){
                    $order->coupon_value=session('coupon')['value'];
                    $order->coupon_code=session('coupon')['code'];
                    $total_amount-$order->coupon_value;
                }
                    
                if(session('order_note')){
                    $order->order_note=session('order_note');
                }           
                // return $order_data['total_amount'];
                $order->status=0;
                if(request('payment_method')=='razorpay'){
                    $order->payment_method='razorpay';
                    $order->payment_status='process';
                }
                else{
                    $order->payment_method='cod';
                    $order->payment_status='Unpaid';
                }
                $order->state_id =(int)$requestData['state_id'];
                $order->city_id = (int)$requestData['city_id'];
                $order->freight_charge = Helper::getPincodeFreightCharge($requestData['pincode']);;

                $total_amount+=$order->freight_charge;

                if($request->address_id=='new' || $request->address_id==null):
                    $order->address_id = $this->addNewUserAddress($requestData);
                else:
                    $order->address_id =$requestData['address_id'];
                endif;

                $order->save();
        
                // 
                $cart_items = Cart::where('user_id', auth()->user()->id)->where('order_id', null)->get();
            
                $tax = 0;
                $taxable_amount =0;
                $sub_total = 0;
                $quantity = 0;
                foreach($cart_items as $item){

                    $order_list=new OrderProductList();
                    $order_list->order_id = $order->id;
                    $order_list->user_id =  auth()->user()->id;
                    $order_list->product_id =  $item->product_id;
                    $order_list->price =  $item->product->price;
                    $order_list->quantity =  $item->quantity;
                    $order_list->tax_rate =  18;
                    $order_list->taxable_amount = $order_list->price * $order_list->quantity;
                    $order_list->tax = ($order_list->tax_rate * $order_list->taxable_amount) / 100;
                    $order_list->sub_total = $order_list->taxable_amount +$order_list->tax ;

                    $order_list->save();

                    $quantity += $order_list->quantity;
                    $tax += $order_list->tax;
                    $taxable_amount += $order_list->taxable_amount;
                    $sub_total +=$order_list->sub_total;
                }
                
                $order->quantity = $quantity ;
                $order->tax = $tax ;
                $order->taxable_amount = $taxable_amount ;
                $order->sub_total = $sub_total ;

                $total_amount +=  $sub_total; 
                $order->total_amount =  $total_amount;
                $order->save();


                if($order){

                    $users=User::where('role','admin')->first();
                    $details=[
                        'title'=>'New order created By '.@$order->address->first_name,
                        'actionURL'=>route('order.show',$order->id),
                        'fas'=>'fa-file-alt'
                    ];
                    
                 Notification::send($users, new StatusNotification($details));


                }
             


                session()->forget('cart');
                session()->forget('coupon');
                session()->forget('order_note');
                session()->forget('freight_charge');

               Cart::where('user_id', auth()->user()->id)->where('order_id', null)->update(['order_id' => $order->id]);


                if(request('payment_method')=='razorpay'){


                    $razorpay = new RazorpayPaymentController();
                    $response = $razorpay->create_razorpay_order($order);
                    $order->razerpay_order = json_encode($response );
                    $order->save();
                    DB::commit();

                    return redirect('payment-initiate/'.$order->order_number);
                }

                DB::commit();

                Alert::success('Your product successfully placed in order');

                return redirect()->route('user');
            }catch (\Exception $e) {
                DB::rollback();

                dd($e);
                Log::channel('order_error')->error($e->getMessage().' on line no '.$e->getLine());
                // something went wrong
                Alert::error('Something is went wrong..');
                return redirect()->back();

            }
        }else{


            Alert::error('Something is went wrong..');
    
            Log::channel('order_error')->error('redirection blanck checkout');
    
            return redirect()->route('user');
        }
    }


    function addNewUserAddress($data){


        if(@$data['is_primary']){
            UserAddress::where('user_id',auth()->user()->id)->update(['is_primary'=>0]);
        }

        $address=new UserAddress();
        
        $address->mobile = $data['mobile'];
        $address->email = $data['email'];
        $address->first_name = $data['first_name'];
        $address->last_name = $data['last_name'];
        $address->address = $data['address'];
        $address->state_id = $data['state_id'];
        $address->city_id = $data['city_id'];
        $address->pincode = $data['pincode'];
        $address->dnd = @(int)$data['dnd'];
        $address->is_primary =  @(int)$data['is_primary'];
        $address->pincode = (int)$data['pincode'];
        $address->user_id = auth()->user()->id;
        $address->save();


        return $address->id;
        
        
    }
    

}