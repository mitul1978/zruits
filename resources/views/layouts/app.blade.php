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
    <link rel="shortcut icon" href="{{URL::asset('assets/images/icons/favicon.png')}}">
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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
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
                $(".add_to_wishlist_msg"+product_id).text('Adding');

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
            var prodType = $('#productType').val();
            var colorId = '';
            var sizeId = '';

            if(prodType == 0)
            {
                var gProduct = $('#product').val();
                if(gProduct == "")
                {
                    Swal.fire({
                                    icon: "error",
                                    text: 'Please Select Amount ',
                                    toast: true,
                                    position: 'top-right',
                                    timer: 5000,
                                    showConfirmButton:false,
                                    title: "Select Amount!",
                                    })
                    return false;      
                }

                if(toName == "")
                {
                    Swal.fire({
                                    icon: "error",
                                    text: 'Please Add Receipient Name ',
                                    toast: true,
                                    position: 'top-right',
                                    timer: 5000,
                                    showConfirmButton:false,
                                    title: "Empty Field!",
                                    })
                    return false;      
                }

                if(toEmail == "")
                {
                    Swal.fire({
                                    icon: "error",
                                    text: 'Please Add Receipient Email ',
                                    toast: true,
                                    position: 'top-right',
                                    timer: 5000,
                                    showConfirmButton:false,
                                    title: "Empty Field!",
                                    })
                    return false;      
                }

                if(fromName == "")
                {
                    Swal.fire({
                                    icon: "error",
                                    text: 'Please Add Your Name ',
                                    toast: true,
                                    position: 'top-right',
                                    timer: 5000,
                                    showConfirmButton:false,
                                    title: "Empty Field!",
                                    })
                    return false;      
                }                
            }
            
            $('.colorOptions' + product_id).each(function() {
                var isChecked = $(this).prop('checked')?true:false; 
               
                if(isChecked)
                {
                    colorId = $(this).val();
                }
            });

            if(colorId == '' && prodType != 0)
            {
                Swal.fire({
                                    icon: "error",
                                    text: 'Please Select Color ',
                                    toast: true,
                                    position: 'top-right',
                                    timer: 5000,
                                    showConfirmButton:false,
                                    title: "Select Color!",
                                    })
                return false;                    
            }

            $('.sizeOptions' + product_id).each(function() {
                var isChecked = $(this).prop('checked')?true:false; 
                console.log(isChecked);
                if(isChecked)
                {
                    sizeId = $(this).val();
                }
            });

            if(sizeId == '' && prodType != 0)
            {
                Swal.fire({
                                    icon: "error",
                                    text: 'Please Select Size ',
                                    toast: true,
                                    position: 'top-right',
                                    timer: 5000,
                                    showConfirmButton:false,
                                    title: "Select Size!",
                                    })
                return false;                    
            }

            var loopTime = 0;
            if(qty != undefined)
            {
                loopTime = qty;
            }
           
           $('.product'+product_id).text('Adding');            

           if(loopTime == 0 || prodType != 0)
           {   
                for(var i = 0; i < loopTime; i++)
                {
                         $.ajax({
                            url: "{{route('ajax-add-to-cart')}}",
                            type: 'post',
                            data:{
                                _token:"{{csrf_token()}}",
                                product_id,
                                colorId,
                                sizeId
                            },
                            success: function(response) 
                            {
                                // if(response.add_to_cart)
                                // {
                                    //var res = response.msg;
                                    // Swal.fire({
                                    //     icon: "success",
                                    //     text: res,
                                    //     toast: true,
                                    //     position: 'top-right',
                                    //     timer: 5000,
                                    //     showConfirmButton:false,
                                    //     title: response.add_to_cart+"!",
                                    // })

                                     $('.cart-count').text(response.cart_count);
                                // }
                                // else
                                // {
                                    // Swal.fire({
                                    // icon: "error",
                                    // text: res,
                                    // toast: true,
                                    // position: 'top-right',
                                    // timer: 5000,
                                    // showConfirmButton:false,
                                    // title: response.error+"!",
                                    // })
                               // }

                                
                            }
                        });
                }  

                Swal.fire({
                            icon: "success",
                            text: "Added to Cart",
                            toast: true,
                            position: 'top-right',
                            timer: 5000,
                            showConfirmButton:false,
                            title: "Added!",
                        });

                $('.product'+product_id).text('Added');      
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
                $('#gift_card_from').val('');
                $('#giftcard_message').text('');
                $('.product'+product_id).text('Added');
           }            
        });
        
    </script>
    <script>
        $(document).ready(function() {
            $('.keyup-email').keyup(function() {
                $('span.error-keyup-7').remove();
                var inputVal = $(this).val();
                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                if(!emailReg.test(inputVal)) {
                    $(this).after('<span class="error error-keyup-7">Invalid Email Format.</span>');
                }
            });

            $(".keyup-mobile").keypress(function (e) {
                var mobilePattern = /^\d{9}$/;
                var mobile = $(this).val();

                $('span.error-keyup-8').remove();
                if(!mobilePattern.test(mobile))
                {
                    $(this).after('<span class="error error-keyup-8">Invalid Mobile Number.</span>');
                }
                else
                {
                    $('span.error-keyup-8').remove();
                }
                // var keyCode = e.keyCode || e.which;
    
                // $(this).after('');
    
                // //Regex for Valid Characters i.e. Numbers.
                // var regex = /^[0-9]+$/;
    
                // //Validate TextBox value against the Regex.
                // var isValid = regex.test(String.fromCharCode(keyCode));
                // if (!isValid) 
                // {
                //     $(this).after('<span class="error error-keyup-7">Invalid Mobile Number.</span>');
                // }
    
                // return isValid;
            });


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
                    }
                    else
                    {
                    }
                });

                $('#submit-newsletter-button').on('click',function()
                {                    
                   var newsletterEmail = $('#newsletter-email').val();
                   var EmailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;

                   if(!EmailPattern.test(newsletterEmail))
                   {
                       Swal.fire({
                                    icon: "error",
                                    text: 'Please Enter Valid Email',
                                    toast: true,
                                    position: 'top-right',
                                    timer: 5000,
                                    showConfirmButton:false,
                                    title: "Valid Email!",
                                });  

                        return false;
                   }

                   
                    if(newsletterEmail != '')
                    {
                        $.ajax({
                        url:"/submit-newsletter",
                        data:{_token:"{{csrf_token()}}",newsletterEmail},
                        type:"POST",
                        success:function(response)
                        {                    
                            if(response == 1)
                            {
                                Swal.fire({
                                        icon: "success",
                                        text: "You have subscribed to our newsletter",
                                        toast: true,
                                        position: 'top-right',
                                        timer: 5000,
                                        showConfirmButton:false,
                                        title: "Subscribed!",
                                    });
                            }   
                            else if(response == 2)
                            {
                                Swal.fire({
                                    icon: "alert",
                                    text: 'You have already subscribed to our newsletter',
                                    toast: true,
                                    position: 'top-right',
                                    timer: 5000,
                                    showConfirmButton:false,
                                    title: "Already Subscribed!",
                                });  
                            }   
                            else
                            { 
                                Swal.fire({
                                    icon: "error",
                                    text: 'Something went wrong !',
                                    toast: true,
                                    position: 'top-right',
                                    timer: 5000,
                                    showConfirmButton:false,
                                    title: "Error !",
                                });  

                            } 
                            $('#newsletter-email').val('');            
                        }
                      });
                    }
                    else
                    {
                        Swal.fire({
                                    icon: "error",
                                    text: 'Please Add Email',
                                    toast: true,
                                    position: 'top-right',
                                    timer: 5000,
                                    showConfirmButton:false,
                                    title: "Require Email!",
                             });
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

       // $('.customFilterData').change(function() {
        //     $("input:checkbox[class=customFilterData]:checked").each(function () {
        //         alert("Id: " + $(this).attr("id") + " Value: " + $(this).val());
        //     });
        // });
    </script>

    
<script>
        $(document).ready(function ()
        {
            $(".show-sidebar-btn").click(function ()
            {
                $("body").addClass("show-hidden-sidebar");
                $(".sidebar-container").addClass("show-hidden-sidebar");
            });
            $(".close-sidebar-btn").click(function ()
            {
                $("body").removeClass("show-hidden-sidebar");
                $(".sidebar-container").removeClass("show-hidden-sidebar");
            });

        });
    </script>

</body>
</html>