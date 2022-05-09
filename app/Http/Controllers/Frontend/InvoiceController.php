<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use App\Models\Order;

class InvoiceController extends Controller
{

    function invoice($order_id){ 

       $order =  Order::with(['order_list','address','state','city','user'])->where('user_id',auth()->user()->id)->findOrFail($order_id);

       return view('user.order.invoice',compact('order'));
   }
    

}