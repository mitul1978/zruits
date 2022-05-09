<?php
namespace App\Http\Controllers\Frontend;
use Str;

use Alert;
use Helper;
use App\User;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use App\Models\OrderProductList;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Notifications\StatusNotification;
use App\Http\Controllers\Frontend\RazorpayPaymentController;
use Notification,Auth,Session;
use Illuminate\Support\Facades\Mail; 
class OrdersController extends Controller
{
    function place_order(Request $request)
    {
        $requestData = $request->all();

        if(count(get_cart()))
        {   
            if($request->address_id =='new' || $request->address_id == null)
            {   
                Session::put('flag',1);
                
                $this->validate($request,[
                    'mobile'=>'required',
                    //'last_name'=>'required',
                    'email'=>'required|email',
                    'first_name'=>'required',
                    'address'=>'required',
                    'state_id'=>'required',
                    'city_id'=>'required',
                    'pincode' => 'required|integer|regex:/\b\d{6}\b/',
                ],[
                    'pincode.regex'=>'Please enter a valid 6 digit pincode',
                    'pincode.required' => 'The pincode field is required',
                ]);
            }
            else
            {
               $address =  UserAddress::find($request->address_id)->toArray();
               $request_address = new Request($address);
               Session::put('flag',0);
               $this->validate($request_address,[
                'mobile'=>'required',
                //'last_name'=>'required',
                'email'=>'required|email',
                'first_name'=>'required',
                'address'=>'required',
                'state_id'=>'required',
                'city_id'=>'required',
                'pincode' => 'required|integer|regex:/\b\d{6}\b/',
                ],[
                    'pincode.regex'=>'Please enter a valid 6 digit pincode',
                    'pincode.required' => 'The pincode field is required',
                    'pincode.exists' => 'Pincode is not exists',
                ]);                

                $requestData =$request_address->all() ;
                $requestData['address_id'] = $request->address_id;
            }  

            DB::beginTransaction();
            try 
            {   
                if(!@auth()->user()->id)
                {   
                    $ifAvailable = User::where('email',$request->email)->first();
                    
                    if(!$ifAvailable)
                    {
                        $user =  User::create([
                            'name' => $request->first_name,
                            'email' => $request->email,
                            'mobile' => $request->mobile,
                            'password' => bcrypt($request->mobile),
                        ]);
                    }
                    else
                    {
                        $user = $ifAvailable;
                    }                    
    
                    if(Auth::attempt(['email' => $user->email, 'password' => $request->mobile,'status'=>'active','role'=>'user']))
                    {
                        Session::put('user',$request->email);
                        add_to_cart_session_cart_item();
                    }
                    else
                    {
                        Alert::error('Something is went wrong... Please try again');
                        return redirect()->back();
                    }
                }

                //$requestData['state_id'] = 1;
                //$requestData['city_id'] = 1;
                $total_amount = 0;
                $total_discount = 0;
                $order = new Order();
                //$order->order_number = 'O-'.@auth()->user()->id.'-'.strtoupper(time());
                // $order->user_id = @auth()->user()->id;
                if (date('m') < 4) 
                {
                    $financial_year = (date('y')-1) . '-' . date('y');
                } 
                else 
                {
                    $financial_year = date('y') . '-' . (date('y') + 1);
                }
                $lastOrderNumber = Order::latest()->first()->order_sequence + 1;
                $lastOrderNumber = str_pad($lastOrderNumber,4,"0",STR_PAD_LEFT);
                $todaysDate = date('d/m/y');
                $order->order_number = 'ZE / '. $financial_year .' / '. $lastOrderNumber . ' ' . $todaysDate;
                $order->user_id = @auth()->user()->id;
                $order->order_sequence = $lastOrderNumber;
                    
                if(session('order_note'))
                {
                    $order->order_note=session('order_note');
                } 
                else
                {
                    $order->order_note=$request->order_notes;
                }          

                $order->status=0;
                $order->payment_method='razorpay';
                $order->payment_status='process';
              

                $order->state_id =$requestData['state_id'];
                $order->city_id = $requestData['city_id'];
                $order->freight_charge = 0;// Helper::getPincodeFreightCharge($requestData['pincode']);;

                // $total_amount = $order->freight_charge;

                if($request->address_id=='new' || $request->address_id==null):
                    $order->address_id = $this->addNewUserAddress($requestData);
                else:
                    $order->address_id =$requestData['address_id'];
                endif;

                $order->save();  

                $cart_items = Cart::where('user_id', auth()->user()->id)->where('order_id', null)->get();
           
                $tax = 0;
                $taxable_amount =0;
                $sub_total = 0;
                $quantity = 0;
                $discount = 0;
                foreach($cart_items as $item)
                {
                    $order_list = new OrderProductList();
                    $order_list->order_id = $order->id;
                    $order_list->user_id =  @auth()->user()->id;
                    $order_list->product_id =  $item->product_id;
                    $order_list->price =  $item->product->price;
                    $order_list->quantity =  $item->quantity;
                    $order_list->discount =  ($item->product->price - $item->product->discounted_amt ) * $order_list->quantity;
                    $order_list->tax_rate =  0;
                    $order_list->color_id =  $item->color_id;
                    $order_list->size_id =  $item->size_id;
                    $order_list->taxable_amount = $item->product->discounted_amt * $order_list->quantity;
                    $order_list->tax = 0;//($order_list->tax_rate * $order_list->taxable_amount) / 100;
                    $order_list->sub_total = $item->product->price * $order_list->quantity;// +$order_list->tax ;
                    
                    if($item->product->is_giftcard == 1)
                    {
                        $order_list->name =  $item->name;
                        $order_list->email =  $item->email;
                        $order_list->message = $item->message;
                        $order_list->from_name =  $item->from_name;
                    }

                    $order_list->save();

                    $quantity += $order_list->quantity;
                    $tax += $order_list->tax;
                    $taxable_amount += $order_list->taxable_amount;
                    $sub_total += $order_list->sub_total;
                    $discount += $order_list->discount;
                }

                $order->coupon_value = 0;

                if(session('coupon'))
                {
                    $order->coupon_id = session('coupon')['id'];
                    $order->coupon_value=session('coupon')['value'];
                    $order->coupon_code=session('coupon')['code'];
                    //$total_amount -= $order->coupon_value;
                    // $total_discount += $order->coupon_value;
                }

                $order->giftcard_value = 0;

                if(session('giftcard'))
                {
                    $order->giftcard_id = session('giftcard')['id'];
                    $order->giftcard_value = session('giftcard')['value'];
                    $order->giftcard_code = session('giftcard')['code'];
                    //$total_amount -= $order->giftcard_value;
                    // $total_discount += $order->giftcard_value;
                }

                $order->quantity = $quantity;
                $order->tax = $tax ;
                $order->taxable_amount = $taxable_amount;
                $order->sub_total = $sub_total;
                $order->total_discount =  $discount + get_offer_discount_amount1() + get_offer_discount_amount2();
                $total_amount =  $sub_total - $order->total_discount - $order->coupon_value - $order->giftcard_value; 
                $order->total_amount =  $total_amount;
                $order->save();
                if($order)
                {
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
                session()->forget('giftcard');
                session()->forget('order_note');
                session()->forget('freight_charge');

                Cart::where('user_id', auth()->user()->id)->where('order_id', null)->update(['order_id' => $order->id]);

                    //if(request('payment_method')=='razorpay')
                    //{
                $razorpay = new RazorpayPaymentController();
                $response = $razorpay->create_razorpay_order($order);
                $order->razerpay_order = json_encode($response );
                $order->save();
                DB::commit();
                 $orderNumberString = str_replace(' ','_',$order->order_number);
                 $orderNumberString = str_replace('/','O',$orderNumberString);
                return redirect('payment-initiate/'.$orderNumberString);
               
                //   Alert::success('Your product successfully placed in order');                
                // return redirect()->route('user');
            }
            catch (\Exception $e) 
            {
                DB::rollback();
                dd($e);
                Log::channel('order_error')->error($e->getMessage().' on line no '.$e->getLine());
                // something went wrong
                Alert::error('Something is went wrong..');
                return redirect()->back();
            }
        }
        else
        {
            Alert::error('Something is went wrong..');    
            Log::channel('order_error')->error('redirection blanck checkout');    
            return redirect()->route('user');
        }
    }


    function addNewUserAddress($data)
    {
        if(@$data['is_primary'])
        {
            UserAddress::where('user_id',auth()->user()->id)->update(['is_primary'=>0]);
        }

        $address = new UserAddress();
        
        $address->mobile = @$data['mobile'];
        $address->email = @$data['email'];
        $address->first_name = @$data['first_name'];
        //$address->last_name = @$data['last_name'];
        $address->address = @$data['address'];
        $address->address2 =  @$data['address1'];
        $address->state_id = @$data['state_id'];
        $address->city_id = @$data['city_id'];
        $address->pincode = @$data['pincode'];
        $address->dnd = @(int)$data['dnd'];
        $address->is_primary =  1;
        $address->pincode = (int)$data['pincode'];
        $address->user_id = @auth()->user()->id;
        $address->save();
        return $address->id;
    }
}