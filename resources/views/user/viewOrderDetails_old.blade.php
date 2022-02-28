
@extends('user.layouts.master')


@section('title','Order Detail')

@section('main-content')

@section('title','Order Detail')


<div class="card">
<h5 class="card-header">Order Details
  </h5>
  <div class="card-body">
    @if($order)
    <table class="table table-striped table-hover">
      <thead>
        <tr>
            <th>Order No.</th>
            <th>Name</th>
            <th>Mobile </th>
            <th>Email </th>
            <th>Total Amount</th>
            <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <tr>
            @php
                $shipping_charge = 0;//DB::table('shippings')->where('id',$order->shipping_id)->pluck('price');
            @endphp
            <td>{{$order->order_number}}</td>
            <td>{{@$order->address->first_name}} {{@$order->address->last_name}} </td>
            <td>{{$order->address->mobile}}</td>
            <td>{{$order->address->email}}</td>
            <td>{{number_format($order->total_amount,2)}}</td>            <td>
              <span class="badge {{@$order->order_status->class}}">{{@$order->order_status->name}} In Process</span>
            </td>
        </tr>
      </tbody>
    </table>

    <section class="confirmation_part section_padding">
      <div class="order_boxes">
        <div class="row">
          <div class="col-lg-6 col-lx-4">
            <div class="order-info">
              <h4 class="text-center pb-4">ORDER INFORMATION</h4>
              <table class="table">             
                    <tr>
                        <td>Order Date</td>
                        <td> : {{$order->created_at->format('D d M, Y')}} at {{$order->created_at->format('g : i a')}} </td>
                    </tr>
                    <tr>
                        <td>Quantity</td>
                        <td> : {{$order->quantity}}</td>
                    </tr>
                    <tr>
                      <td>Coupon Code</td>
                      <td> : {{$order->coupon_code ? $order->coupon_code :'NA'}}</td>
                    </tr>
                    <tr>
                      <td>Gift Card</td>
                      <td> : {{$order->giftcard_code ? $order->giftcard_code :'NA'}}</td>
                    </tr>                 
            
                    <tr>
                      <td>Actual Amount</td>
                      <td> :  &#x20B9; {{number_format($order->sub_total,2)}}</td>
                    </tr>

                    <tr>
                      <td>Discount</td>
                      <td> : &#x20B9;  {{number_format($order->total_discount,2)}}</td>
                    </tr>

                    <tr>
                      <td>Coupon Discount</td>
                      <td> : &#x20B9;  {{$order->coupon_value}}</td>
                    </tr>

                    <tr>
                      <td>Gift Card Discount</td>
                      <td> : &#x20B9;  {{$order->giftcard_value}}</td>
                    </tr>
       
                    <tr>
                        <td>Total Amount</td>
                        <td> : &#x20B9;  {{number_format($order->total_amount,2)}}</td>
                    </tr>
                    <tr>
                      <td>Payment Method</td>
                      <td> : {{strtoupper($order->payment_method)}}</td>
                    </tr>
                    <tr>
                        <td>Payment Status</td>
                        <td> : {{$order->payment_status}}</td>
                    </tr>
              </table>
            </div>
          </div>

          <div class="col-lg-6 col-lx-4">
            <div class="shipping-info">
              <h4 class="text-center pb-4">SHIPPING INFORMATION</h4>
              <table class="table">
                    <tr class="">
                        <td>Full Name</td>
                        <td> : {{@$order->address->first_name}} {{@$order->address->last_name}}</td>
                    </tr>
                   
                    <tr>
                        <td>Address</td>
                        <td> : {{@$order->address->address}}</td>
                    </tr>
                    <tr>
                        <td>State</td>
                        <td> : {{@$order->state->name}}</td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td> : {{@$order->city->name}}</td>
                    </tr>
                    <tr>
                      <td>Pincode</td>
                      <td> : {{@$order->address->pincode}}</td>
                  </tr>
              </table>
            </div>
          </div>
          <div class="col-lg-12 col-lx-12">
            <div class="shipping-info">
              <h4 class="text-center pb-4">Order List</h4>
              <table class="table">
                <thead>
                  <tr>
                  </tr>
                  <th>Sr No</th>
                  <th>Image</th>
                  <th>Product Name</th>
                  <th>Color</th>
                  <th>Size</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th>Discount</th>      
                  <th>Sub Total</th>
                </thead>
                <tbody>
                  @foreach ($order->order_list as $key => $list)
                    <tr>
                      <td>{{++$key}}</td>
                      <td> <img alt=""
                        src="@if(!empty($list->product->images()->first()->image)){{@$list->product->images()->first()->image}}@else {{@$list->product->images()->first()->image}} @endif"
                         style="height:70px;width:70px;"
                        class="active grid-item__visuals-blue"></td>
                      <td>{{$list->product->name}}</td>
                      <td>{{$list->color->name}}</td>
                      <td>{{$list->size->name}}</td>
                      <td>{{$list->quantity}}</td>
                      <td>{{$list->price}}</td>
                      <td>{{$list->discount}}</td>
                      <td>{{$list->taxable_amount}}</td>
                    </tr>
                  @endforeach

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endif

  </div>
</div>
@endsection
@push('styles')
<style>
    .order-info,.shipping-info{
        background:#ECECEC;
        padding:20px;
    }
    .order-info h4,.shipping-info h4{
        text-decoration: underline;
    }

</style>
@endpush
