
@extends('backend.layouts.master')


@section('main-content')
<div class="container-fluid">
    @include('user.layouts.notification')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Order Dashboard</h1>
    </div>



    <div class="row">

      <!-- Order -->
      <div class="col-xl-12 col-lg-12">
        <table class="table table-bordered" id="order-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>S.N.</th>
              <th>Order Date</th>
              <th>Order No.</th>
              <th>Name</th>
              <th>Quantity</th>
              <th>Sub Total</th>
              <th>Discount</th>
              <th>Coupon Discount</th>
              <th>Gift Card Discount</th>
              <th>Total Amount</th>
              <th>Payment Method</th>
              <th>Payment Staus</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
         
          <tbody>
            @if(count($orders)>0)
              @foreach($orders as $order)   
                <tr>                  
                    <td>{{$order->id}}</td>
                    <td>{{date('d F Y h:i',strtotime($order->created_at))}}</td>
                    <td>{{$order->order_number}}</td>
                    <td>{{@$order->address->first_name}} {{@$order->address->last_name}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>&#x20B9; {{$order->sub_total}}</td>
                    <td>&#x20B9; {{$order->total_discount}}</td>
                    <td>&#x20B9; {{$order->coupon_value}}</td>
                    <td>&#x20B9; {{$order->giftcard_value}}</td>
                    <td>&#x20B9; {{round($order->total_amount,2)}}</td>
                    <td>{{$order->payment_method}}</td>
                    <td>
                      @if($order->payment_status=='paid')
                        <span class="badge badge-success">{{$order->payment_status}}</span>
                      @elseif ($order->payment_status=='process')
                        <span class="badge badge-warning">{{$order->payment_status}}</span>
                      @elseif ($order->payment_status=='failed')
                        <span class="badge badge-danger">{{$order->payment_status}}</span>
                      @else
                        <span class="badge">{{$order->payment_status}}</span>
                      @endif
                    </td>                   
                    <td>
                      <span class="badge {{@$order->order_status->class}}">{{@$order->order_status->name}}</span>                      
                    </td>
                    <td>
                      <a href="{{route('order.show',$order->id)}}" class="btn btn-warning btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="view" data-placement="bottom"><i class="fas fa-eye"></i></a>
                      <a href="{{route('order.edit',$order->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                      <form method="POST" action="{{route('order.destroy',[$order->id])}}">
                        @csrf
                        @method('delete')
                            <button class="btn btn-danger btn-sm dltBtn" data-id={{$order->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                      </form>
                    </td>
                </tr>  
              @endforeach
              @else
                <td colspan="8" class="text-center"><h4 class="my-4">You have no order yet!!</h4></td>
              @endif
          </tbody>
        </table>
        <span style="float:right">{{$orders->links()}}</span>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
<script type="text/javascript">
  // const url = "{{route('product.order.income')}}";

  // Set new default font family and font color to mimic Bootstrap's default styling
  // Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  // Chart.defaults.global.defaultFontColor = '#858796';

    // function number_format(number, decimals, dec_point, thousands_sep) {
    //   // *     example: number_format(1234.56, 2, ',', ' ');
    //   // *     return: '1 234,56'
    //   number = (number + '').replace(',', '').replace(' ', '');
    //   var n = !isFinite(+number) ? 0 : +number,
    //     prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    //     sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    //     dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    //     s = '',
    //     toFixedFix = function(n, prec) {
    //       var k = Math.pow(10, prec);
    //       return '' + Math.round(n * k) / k;
    //     };
    //   // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    //   s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    //   if (s[0].length > 3) {
    //     s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    //   }
    //   if ((s[1] || '').length < prec) {
    //     s[1] = s[1] || '';
    //     s[1] += new Array(prec - s[1].length + 1).join('0');
    //   }
    //   return s.join(dec);
    // }

      // Area Chart Example
      // var ctx = document.getElementById("myAreaChart");

      // axios.get(url)
      //             .then(function (response) {
      //               const data_keys = Object.keys(response.data);
      //               const data_values = Object.values(response.data);


      // var myLineChart = new Chart(ctx, {
      //   type: 'line',
      //   data: {
      //     labels: data_keys, //["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
      //     datasets: [{
      //       label: "Earnings",
      //       lineTension: 0.3,
      //       backgroundColor: "rgba(78, 115, 223, 0.05)",
      //       borderColor: "rgba(78, 115, 223, 1)",
      //       pointRadius: 3,
      //       pointBackgroundColor: "rgba(78, 115, 223, 1)",
      //       pointBorderColor: "rgba(78, 115, 223, 1)",
      //       pointHoverRadius: 3,
      //       pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      //       pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      //       pointHitRadius: 10,
      //       pointBorderWidth: 2,
      //       data: data_values, //[0, 10000, 5000, 15000, 10000, 20000, 15000, 25000, 20000, 30000, 25000, 44660],
      //     }],
      //   },
      //   options: {
      //     maintainAspectRatio: false,
      //     layout: {
      //       padding: {
      //         left: 10,
      //         right: 25,
      //         top: 25,
      //         bottom: 0
      //       }
      //     },
      //     scales: {
      //       xAxes: [{
      //         time: {
      //           unit: 'date'
      //         },
      //         gridLines: {
      //           display: false,
      //           drawBorder: false
      //         },
      //         ticks: {
      //           maxTicksLimit: 7
      //         }
      //       }],
      //       yAxes: [{
      //         ticks: {
      //           maxTicksLimit: 5,
      //           padding: 10,
      //           // Include a dollar sign in the ticks
      //           callback: function(value, index, values) {
      //             return '$' + number_format(value);
      //           }
      //         },
      //         gridLines: {
      //           color: "rgb(234, 236, 244)",
      //           zeroLineColor: "rgb(234, 236, 244)",
      //           drawBorder: false,
      //           borderDash: [2],
      //           zeroLineBorderDash: [2]
      //         }
      //       }],
      //     },
      //     legend: {
      //       display: false
      //     },
      //     tooltips: {
      //       backgroundColor: "rgb(255,255,255)",
      //       bodyFontColor: "#858796",
      //       titleMarginBottom: 10,
      //       titleFontColor: '#6e707e',
      //       titleFontSize: 14,
      //       borderColor: '#dddfeb',
      //       borderWidth: 1,
      //       xPadding: 15,
      //       yPadding: 15,
      //       displayColors: false,
      //       intersect: false,
      //       mode: 'index',
      //       caretPadding: 10,
      //       callbacks: {
      //         label: function(tooltipItem, chart) {
      //           var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
      //           return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
      //         }
      //       }
      //     }
      //   }
      // });











      //             })
      //             .catch(function (error) {
      //             //   vm.answer = 'Error! Could not reach the API. ' + error
      //             console.log(error)
      //             });

  </script>
@endpush