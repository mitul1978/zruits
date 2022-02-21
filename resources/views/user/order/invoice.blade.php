
@php
   $path =auth()->user()->role=='admin' ? 'backend.layouts.master' :'user.layouts.master'
@endphp
@extends( $path)

@section('main-content')
    <style>
        body{
    margin-top:20px;
    color: #484b51;
}
.text-secondary-d1 {
    color: #728299!important;
}
.page-header {
    margin: 0 0 1rem;
    padding-bottom: 1rem;
    padding-top: .5rem;
    border-bottom: 1px dotted #e2e2e2;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -ms-flex-align: center;
    align-items: center;
}
.page-title {
    padding: 0;
    margin: 0;
    font-size: 1.75rem;
    font-weight: 300;
}
.brc-default-l1 {
    border-color: #dce9f0!important;
}

.ml-n1, .mx-n1 {
    margin-left: -.25rem!important;
}
.mr-n1, .mx-n1 {
    margin-right: -.25rem!important;
}
.mb-4, .my-4 {
    margin-bottom: 1.5rem!important;
}

hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid rgba(0,0,0,.1);
}

.text-grey-m2 {
    color: #888a8d!important;
}

.text-success-m2 {
    color: #86bd68!important;
}

.font-bolder, .text-600 {
    font-weight: 600!important;
}

.text-110 {
    font-size: 110%!important;
}
.text-blue {
    color: #478fcc!important;
}
.pb-25, .py-25 {
    padding-bottom: .75rem!important;
}

.pt-25, .py-25 {
    padding-top: .75rem!important;
}
.bgc-default-tp1 {
    background-color: rgba(121,169,197,.92)!important;
}
.bgc-default-l4, .bgc-h-default-l4:hover {
    background-color: #f3f8fa!important;
}
.page-header .page-tools {
    -ms-flex-item-align: end;
    align-self: flex-end;
}

.btn-light {
    color: #757984;
    background-color: #f5f6f9;
    border-color: #dddfe4;
}
.w-2 {
    width: 1rem;
}

.text-120 {
    font-size: 120%!important;
}
.text-primary-m1 {
    color: #4087d4!important;
}

.text-danger-m1 {
    color: #dd4949!important;
}
.text-blue-m2 {
    color: #68a3d5!important;
}
.text-150 {
    font-size: 150%!important;
}
.text-60 {
    font-size: 60%!important;
}
.text-grey-m1 {
    color: #7b7d81!important;
}
.align-bottom {
    vertical-align: bottom!important;
}

@media print{
    .print_invoice {
    display:none;
}

body {
	font-family: Georgia, serif;
	background: none;
	color: black;
}
}

@media print {
  /* styling goes here */
  .page-content {
    display: none !important;
  }
}

    </style>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<title>INVOICE</title>
</head>
<body>




<div class="page-content container printArea">
    <div class="page-header text-blue-d2">
            <div></div>
        </h1>

        <div class="page-tools">
            <div class="action-buttons">
                <button class="btn bg-white btn-light mx-1px text-95 print_invoice pull-right"  data-title="Print">
                    <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                    Print
                </button>
            </div>
        </div>
    </div>

    <div class="container-fluid px-0">
        <div class="row mt-4">
            <div class="col-12 col-lg-10 offset-lg-1">
                <div class="row">
                    <div class="col-6">
                        <div class="text-left text-150">
                                <span class="text-default-d3"><img height="140px" src="{{asset('frontend/images/logopre1.png')}}" alt=""></span>
                        </div>
                    </div>
                    <div class="col-1">
                    </div>
                        <div class="col-5">
                        <div class="">
                            
                            <div class="my-1">
                                6, Patel Avenue,<br> First Floor, Near Gurudwara, S.G.
                              <br> Highway, Ahmedabad - 380054
                            </div>
                           
                            
                            <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b class="text-600">+91- 9586478629                            </b></div>
                            <div class="my-1"><i class="fa fa-envelope fa-flip-horizontal text-secondary"></i> <b class="text-600">customersupport@royaletouche.com</b></div>
                        </div>
                    </div>
                </div>
                <!-- .row -->

                <hr class="row brc-default-l1 col-12" />

                <div class="row">
                    <div class="col-6">
                        <div>
                            <span class="text-sm text-grey-m2 align-middle">To:</span>
                            <span class="text-600 text-110 text-blue align-middle">{{@$order->address->first_name}} {{$order->address->last_name}}</span>
                        </div>
                        <div class="text-grey-m2">
                            <div class="my-1">
                                {{@$order->address->address}}
                            </div>
                            <div class="my-1">
                               Zip Code {{@$order->address->pincode}}
                            </div>
                            <div class="my-1">
                                {{@$order->city->name}},  {{@$order->state->name}}, India
                            </div>
                            
                            <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b class="text-600">{{@$order->address->mobile}}</b></div>
                            <div class="my-1"><i class="fa fa-envelope fa-flip-horizontal text-secondary"></i> <b class="text-600">{{@$order->address->email}}</b></div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-1 text-left">
                    </div>

                    <div class="col-5 text-left">
                        <div class="text-grey-m2">
                            <div class="text-left mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                Invoice
                            </div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">ID:</span> #{{$order->order_number}}</div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Issue Date:</span> {{date('d F Y',strtotime($order->created_at))}}</div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status:</span> <span class="badge {{@$order->order_status->class}} badge-pill px-25">{{@$order->order_status->name}}</span></div>
                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Payment Method:</span> {{strtoupper($order->payment_method)}}</div>
                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Payment Status:</span> {{$order->payment_status}}</div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
               

                    <div class="row border-b-2 brc-default-l2"></div>

                    <!-- or use a table instead -->
                 
            <div class="table-responsive">
                <table class="table table-striped table-borderless border-0 border-b-2 brc-default-l1">
                    <thead class="bg-none bgc-default-tp1">
                        <tr class="text-white">
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Qty</th>
                            <th>Unit Price</th>
                            <th>Taxable Amount</th>
                            <th>Tax</th>
                            <th>Sub Total</th>
                        </tr>
                    </thead>

                    <tbody class="text-95 text-secondary-d3">
                        <tr></tr>
                  @foreach ($order->order_list as $key => $list)

                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$list->product->name}}</td>
                            <td>{{$list->quantity}}</td>
                            <td>{{$list->price}}</td>
                            <td>{{$list->taxable_amount}}</td>
                            <td>{{$list->tax}}</td>
                            <td> &#x20B9; {{$list->sub_total}}</td>
                        </tr> 
                  @endforeach

                    </tbody>
                </table>
            </div>
            

                    <div class="row mt-3">
                        <div class="col-5 text-95 mt-2 mt-lg-0">
                            Declaration: 1. Invoice is subject to terms and conditions of "annual policy" and related circulars as applicable. <br>
2. Title & Risks in Goods shall pass on to the buyer on "Delivery" only, as the sales are on "FOR Destination basis" 
                        </div>

                        <div class="col-7">
                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    SubTotal
                                </div>
                                <div class="col-5">
                                    <span class="text-120 text-secondary-d1">&#x20B9; {{number_format($order->taxable_amount,2)}}</span>
                                </div>
                            </div>

                            @if($order->state_id==12)
                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    	
                                </div>
                                <div class="col-5">
                                    <span class="text-110 text-secondary-d1">$225</span>
                                </div>
                            </div>

                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    SGST(9%)
                                </div>
                                <div class="col-5">
                                    <span class="text-110 text-secondary-d1">&#x20B9;  {{number_format($order->tax/2,2)}}</span>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    CGST(9%)
                                </div>
                                <div class="col-5">
                                    <span class="text-110 text-secondary-d1">&#x20B9;  {{number_format($order->tax/2,2)}}</span>
                                </div>
                            </div>
                            @else

                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    IGST(18%)
                                </div>
                                <div class="col-5">
                                    <span class="text-110 text-secondary-d1">&#x20B9;  {{number_format($order->tax,2)}}</span>
                                </div>
                            </div>

                            @endif

                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    Freight Charge
                                </div>
                                <div class="col-5">
                                    <span class="text-110 text-secondary-d1">&#x20B9;  {{$order->freight_charge}}</span>
                                </div>
                            </div>

                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    Coupon Discount
                                </div>
                                <div class="col-5">
                                    <span class="text-110 text-secondary-d1">&#x20B9;  {{$order->coupon_value}}</span>
                                </div>
                            </div>

                            <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                <div class="col-7 text-right">
                                    Total Amount
                                </div>
                                <div class="col-5">
                                    <span class="text-150 text-success-d3 opacity-2">&#x20B9; {{number_format($order->total_amount,2)}}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr />

                    <div>
                        <span class="text-secondary-d1 text-105">Thank you for your business</span>
                        {{-- <a href="#" class="btn btn-info btn-bold px-4 float-right mt-3 mt-lg-0">Pay Now</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    
@endsection

@push('scripts')

<script src="{{asset('js/printThis.js')}}"></script>
<script>
    $(document).on('click','.print_invoice',function(){
        $('.printArea').printThis();
    })
</script>
@endpush