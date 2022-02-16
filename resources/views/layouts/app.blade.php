<!DOCTYPE html>
<html lang="en">

<!-- molla/index-2.html  22 Nov 2019 09:55:32 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Zehna</title>
    <meta name="keywords" content="Zehna">
    <meta name="description" content="Zehna">
    <meta name="author" content="Zruits">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{URL::asset('assets/images/icons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{URL::asset('assets/images/icons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{URL::asset('assets/images/icons/favicon-16x16.png')}}">
    <link rel="manifest" href="{{URL::asset('assets/images/icons/site.html')}}">
    <link rel="mask-icon" href="{{URL::asset('assets/images/icons/safari-pinned-tab.svg')}}" color="#666666">
    <link rel="shortcut icon" href="{{URL::asset('assets/images/icons/favicon.ico')}}">
    <meta name="apple-mobile-web-app-title" content="Zehna">
    <meta name="application-name" content="Zehna">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{{URL::asset('assets/images/icons/browserconfig.xml')}}">
    <meta name="theme-color" content="#ffffff">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{URL::asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/plugins/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/plugins/magnific-popup/magnific-popup.css')}}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{URL::asset('assets/css/style.css')}}">
    {{-- <link rel="stylesheet" href="{{URL::asset('assets/css/demos/demo-2.css')}}"> --}}
    {{-- <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"> --}}
    <link rel="stylesheet" href="{{URL::asset('assets/css/plugins/nouislider/nouislider.css')}}">
    @livewireStyles
</head>

<body>
    
        <!-- Header File -->
        @include('layouts.header')

        <!-- Plugins JS File -->
        <script src="{{URL::asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{URL::asset('assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{URL::asset('assets/js/jquery.hoverIntent.min.js')}}"></script>
        <script src="{{URL::asset('assets/js/jquery.waypoints.min.js')}}"></script>
        <script src="{{URL::asset('assets/js/superfish.min.js')}}"></script>
        <script src="{{URL::asset('assets/js/owl.carousel.min.js')}}"></script>
        <script src="{{URL::asset('assets/js/jquery.elevateZoom.min.js')}}"></script>
        <script src="{{URL::asset('assets/js/bootstrap-input-spinner.js')}}"></script>
     
        <!-- Main JS File -->
        <script src="{{URL::asset('assets/js/main.js')}}"></script>
        {{-- <script src="{{URL::asset('assets/js/demos/demo-2.js')}}"></script> --}}
        <script  src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>       
        <script src="{{URL::asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
        @livewireScripts

        @yield('content')

    <!-- Footer -->
   
    @include('layouts.footer2')
    
    @include('vendor.sweetalert.alert')




    <script>
        $('.footer-middle .widget-title').click(function(e){
            $(this).parent().find('.widget-list').slideToggle();
            $(this).toggleClass('active');
        })

        $("body").on('click','.add_to_wishlist',function()
        {
                var product_id = $(this).data('id');

                $(".add_to_wishlist_img"+product_id).hide();
                $(".add_to_wishlist_msg"+product_id).show();
                $(".add_to_wishlist_msg"+product_id).text('Please Wait');

                $.ajax({
                    url: "{{route('add-to-wishlist')}}",
                    type: 'post',
                    data:{_token:"{{csrf_token()}}",product_id},
                    success: function(response) {

                        if(response.wishlist_product)
                        {
                            var res = response.msg;
                            Swal.fire({
                                icon: "success",
                                text: res,
                                toast: true,
                                position: 'top-right',
                                timer: 5000,
                                showConfirmButton:false,
                                title: response.wishlist_product+"!",

                            })
                            var image_name= response.wishlist_product=='Added' ? '/redwishlist.png' :'/wishlist.png';
                            var imgs = "{{url('/frontend/images/')}}";
                            $("#wishlist"+product_id).attr('src',imgs+image_name);
                        }
                        else
                        {
                            Swal.fire({
                                icon: "error",
                                text: res,
                                toast: true,
                                position: 'top-right',
                                timer: 5000,
                                showConfirmButton:false,
                                title: response.error+"!",
                            })
                        }

                        $(".add_to_wishlist_img"+product_id).show();
                        $(".add_to_wishlist_msg"+product_id).hide();
                    }
                });
        });


        $("body").on('click','.add_to_cart',function()
        {
            var product_id = $(this).data('id');
            var qty = $('#quantity').val();
            var toName = $('#gift_card_to_name').val();
            var toEmail =  $('#gift_card_to').val();
            var fromName = $('#gift_card_from').val();
            var message = $('#giftcard_message').val();

            var loopTime = 0;
            if(qty != undefined)
            {
                loopTime = qty;
            }
           
           $('.product'+product_id).text('Please Wait...');

           if(loopTime == 0)
           {
                         $.ajax({
                            url: "{{route('ajax-add-to-cart')}}",
                            type: 'post',
                            data:{
                                _token:"{{csrf_token()}}",
                                product_id,
                            },
                            success: function(response) {
                                if(response.add_to_cart)
                                {
                                    var res = response.msg;
                                    Swal.fire({
                                        icon: "success",
                                        text: res,
                                        toast: true,
                                        position: 'top-right',
                                        timer: 5000,
                                        showConfirmButton:false,
                                        title: response.add_to_cart+"!",
                                    })

                                   $('.cart-count').text(response.cart_count);

                                }
                                else
                                {
                                    Swal.fire({
                                    icon: "error",
                                    text: res,
                                    toast: true,
                                    position: 'top-right',
                                    timer: 5000,
                                    showConfirmButton:false,
                                    title: response.error+"!",
                                    })
                                }

                                $('.product'+product_id).text('Added');
                            }
                        });
           }
           else
           {
                for(var i = 0; i < loopTime; i++)
                {
                    $.ajax({
                            url: "{{route('ajax-add-to-cart')}}",
                            type: 'post',
                            data:{
                                _token:"{{csrf_token()}}",
                                product_id,
                                toName,
                                toEmail,
                                fromName,
                                message
                            },
                            success: function(response) 
                            {
                                if(response.add_to_cart)
                                {
                                    $('.cart-count').text(response.cart_count);
                                }
                                // else
                                // {
                                //     Swal.fire({
                                //     icon: "error",
                                //     text: res,
                                //     toast: true,
                                //     position: 'top-right',
                                //     timer: 5000,
                                //     showConfirmButton:false,
                                //     title: response.error+"!",
                                //     })
                                // }
                            }
                        });
                }

                //var res = response.msg;
                                    Swal.fire({
                                        icon: "success",
                                        text: "Gift Card successfully added to cart",
                                        toast: true,
                                        position: 'top-right',
                                        timer: 5000,
                                        showConfirmButton:false,
                                        title: "Added!",
                                    })
                $('#gift_card_to_name').val('');
                $('#gift_card_to').val('');
                $('.product'+product_id).text('Added');
           }            
        });
        
    </script>
    <script>
        $(document).ready(function() {
            $('#product').on('change', function() {
               var prodId = $(this).val();
               if(prodId != "")
               {   
                   $('.wishlist_rows').hide();
                   $('#wishlist'+prodId).show();
                   $('#product'+prodId).show();
               }
               else
               {
                  $('.wishlist_rows').hide();
               }
            });
        });
    </script>

        <script src="{{asset('backend/js/sweetalert.min.js')}}"></script>
        <script type="text/javascript">

            $(document).ready(function() 
            {
                window.addEventListener('swal:confirm', event => { 
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
                });

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
                }); 

                $('.update_cart_btn').click(function(){
                    $('.cart_update_form').submit();
                });

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
                    }
                    else
                    {
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
                });    
                
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
                });
            });
    </script>

    <script>
        // $(".customFilterData").live("click", function () {
        //     $("input:checkbox[class=customFilterData]:checked").each(function () {
        //         alert("Id: " + $(this).attr("id") + " Value: " + $(this).val());
        //     });
        // });

        $('.customFilterData').change(function() {
            $("input:checkbox[class=customFilterData]:checked").each(function () {
                alert("Id: " + $(this).attr("id") + " Value: " + $(this).val());
            });
        });
    </script>

</body>

</html>