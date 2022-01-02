<?php
namespace App\Http\Controllers;

use App\Models\Order;

class InvoiceController extends Controller
{

    function invoice($order_id){


       $order =  Order::with(['order_list','address','state','city','user'])->findOrFail($order_id);

       return view('user.order.invoice',compact('order'));
   }
    

}