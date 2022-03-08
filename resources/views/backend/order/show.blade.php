@extends('backend.layouts.master')


@section('title','Order Detail')

@section('main-content')
<div class="card">
<h5 class="card-header">Order       
  {{-- <a href="{{route('order.pdf',$order->id)}}" class=" btn btn-sm btn-primary shadow-sm float-right"><i class="fas fa-download fa-sm text-white-50"></i> Generate PDF</a> --}}
  </h5>
  <div class="card-body">
    @if($order)
    <table class="table table-striped table-hover">
      <thead>
        <tr>
            <th>S.N.</th>
            <th>Order No.</th>
            <th>Name</th>
            <th>Mobile </th>
            <th>Total Amount</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
            @php
                $shipping_charge=DB::table('shippings')->where('id',$order->shipping_id)->pluck('price');
            @endphp
            <td>{{$order->id}}</td>
            <td>{{$order->order_number}}</td>
            <td>{{@$order->address->first_name}} {{@$order->address->last_name}} </td>
            <td>{{$order->address->mobile}}</td>

            <td>{{number_format($order->total_amount,2)}}</td>
            <td>
              <span class="badge {{@$order->order_status->class}}">{{@$order->order_status->name}}</span>

            </td>
            <td>
              <a href="{{route('order.edit',$order->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
              <form method="POST" action="{{route('order.destroy',[$order->id])}}">
                @csrf
                @method('delete')
                    <button class="btn btn-danger btn-sm dltBtn" data-id={{$order->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
              </form>
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
                    <td>Sub Total</td>
                    <td> : &#x20B9;  {{number_format($order->sub_total,2)}}</td>
                  </tr>

                  <tr>
                    <td>Discount</td>
                    <td> : &#x20B9;  {{number_format($order->total_discount,2)}}</td>
                  </tr>
                  
                  <?php 
                  $subtotal = 0;
                  $tax = 0;
                 
                   if($order->total_amount > 1000)
                 {
                   $taxPercent = 12;
                 } 
                 else 
                 {
                   $taxPercent = 5;
                 }

                 $calculateGst = $order->taxable_amount - ( $order->taxable_amount * (100/(100 + $taxPercent)));
                 $amtExclGst   = $order->taxable_amount - $calculateGst;
               ?>
                  <tr>
                    <td>Taxable Amount</td>
                    <td> :  &#x20B9; {{number_format($amtExclGst,2)}}</td>
                  </tr>

                  <tr>
                    <td>Tax</td>
                    <td> : &#x20B9;  {{number_format($calculateGst,2)}}</td>
                  </tr>

                 

                  <tr>
                    <td>Freight Charge</td>
                    <td> : &#x20B9;  {{$order->freight_charge}}</td>
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
                      <td> : Prepaid</td>
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
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Sub Total</th>
                  <th>Discount</th>                  
                  <th>Taxable Amount</th>
                  <th>Tax</th>
                  <th>Total</th>


                </thead>
                <tbody>

                  @foreach ($order->order_list as $key => $list)
                    <tr>
                      <td>{{++$key}}</td>
                      <td> <img alt=""
                        src="@if(!empty($list->product->a4sheet_view)){{$list->product->a4sheet_view}}@else {{$list->product->fullsheet_view}} @endif?tr=w-100,h-100"
                        class="active grid-item__visuals-blue"></td>
                      <td>{{$list->product->name}}</td>
                      <td>{{$list->price}}</td>
                      <td>{{$list->quantity}}</td>
                      <td>{{$list->sub_total}}</td>
                      <td>{{$list->discount}}</td>
                     
                        <?php 
                            $calculateGst = $list->taxable_amount - ( $list->taxable_amount * (100/(100 + $taxPercent)));
														$amtExclGst = $list->taxable_amount - $calculateGst;
                         ?>                       
                      <td>{{round($amtExclGst,2)}}</td>
                      <td>{{round($calculateGst,2)}}</td>
                      <td>{{$list->taxable_amount}}</td>
                      

                      <td></td>
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
