@extends('frontend.layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('backend/css/sweetalert.min.css')}}" />

@include('frontend.layouts.svg-icons')
    @livewire('cart')
@endsection

@section('scripts')
<script src="{{asset('backend/js/sweetalert.min.js')}}"></script>

<script type="text/javascript">
	// e-commerce js

  // We're sorry! Only 5 unit(s) allowed in each order

  $( document ).ready(function() {

    window.addEventListener('swal:confirm', event => { 

      console.log(event.detail)
    swal({
        title: event.detail.message,
        text: event.detail.text,
        icon: event.detail.type,
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.livewire.emit('cartDelete',event.detail.product_id);
        }
      });
  });

    
      $('.input-number').on('input',function(){
        var product_id = $(this).data('product_id');
        var product_qty = parseInt($(this).val());

        var product_price = $('#product_price'+product_id).data('price');

        $('.product_total'+product_id).text(product_price*product_qty);
      
      })

      $('.input-number').on('change',function(){
        // var product_id = $(this).data('product_id');
        // var product_qty = parseInt($(this).val());
        // var min = $('#cart_item_count'+product_id).attr('min');
        // var product_price = $('#product_price'+product_id).data('price');

        
        // if(min <=product_qty){

        // }else{
        //   $('#cart_item_count'+product_id).val(min);
        //   $('.product_total'+product_id).text(product_price*min);

        //   swal({
        //           // title: "Are you sure?",
        //           text: "We're sorry! Minimum limit "+min+" unit(s) allowed in this product",
        //           icon: "warning",
        //           buttons: false,  
        //           // dangerMode: false,
        //       });
        // }
      })  


      $('.update_cart_btn').click(function(){
          $('.cart_update_form').submit();
      })


      $('.cart_product_qunity_change').click(function(e){
        var product_id = $(this).data('product_id');
        var action = $(this).attr('action_type');


        // var min = $('#cart_item_count'+product_id).attr('min');
        // var max = $('#cart_item_count'+product_id).attr('max');

        //Cart product price calculate 
       

        
        if(action =='decrement'){
          var product_qty = $('#cart_item_count'+product_id).val();
          var product_price = $('#product_price'+product_id).data('price');
          --product_qty

          if(product_qty >=0){
            $('.product_total'+product_id).text(product_price*product_qty);
            $('#cart_item_count'+product_id).val(product_qty);
          }
        
          else
          swal({
                  // title: "Are you sure?",
                  text: "We're sorry! Invalid quntity",
                  icon: "warning",
                  buttons: false,  
                  // dangerMode: false,
              });
        }else{
          var product_qty = $('#cart_item_count'+product_id).val();
          var product_price = $('#product_price'+product_id).data('price');
          ++product_qty
          $('.product_total'+product_id).text(product_price*product_qty);

          $('#cart_item_count'+product_id).val(product_qty);
        }
      })
    
      $('.dltBtn').click(function(e){
          // var form=$(this).closest('form');
            var dataID=$(this).data('id');
            e.preventDefault();
            swal({
                  title: "Are you sure?",
                  text: "Are you want to remove this item?",
                  icon: "warning",
                  buttons: true,  
                  dangerMode: true,
              })
              .then((willDelete) => {
                  if (willDelete) {
                      $.ajax({
                          url:"{{url('cart-delete')}}/"+dataID,
                          data:{_token:"{{csrf_token()}}"},
                          type:"POST",
                          success:function(response){
                      
                            if(response.cart_count){


                              swal({
                                // title: "Are you sure?",
                                text: response.msg,
                                icon: "success",
                                buttons: false,  
                                // dangerMode: false,
                              });

                        
                                $('.delete_cart_item'+dataID).hide();  
                                $('.cart-count').text(response.cart_count);
                                $('.cart-subtotal').text(response.cart_subtotal);
                            }else{

                              location.reload(true);
                            }
                               

                             }
                          });
                  } else {
                      // swal("Your product is not remo!");
                  }
              });
        })


    $('.btn-ship-submit').on('click',function(){
      $('.zip_alert').html('');
      $('.freight_charge_result').html('');

        var pincode = $('#zip-code').val();
        var msg = '';
        if(true){
            $.ajax({
            url:"/calculate-fright-charge",
            data:{_token:"{{csrf_token()}}",pincode},
            type:"POST",
            success:function(response){
        
              if(response.freight_charge != undefined){
                $('.freight_charge_result').html(' &#x20B9; '+response.freight_charge);

              }

              if(response.pincode[0] != undefined)
                  $('.zip_alert').html('<span class="text-danger">'+response.pincode[0]+'</span>');
              }
            
            });
        }else{
        }
    })
});

</script>
@endsection
