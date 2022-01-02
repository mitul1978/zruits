$(document).ready(function(){
	      //$(".fetchpallets").removeClass('active');
          $(".fetchpallets").on('click',function(){
              var id = $(this).attr('id');
              $("#"+id).addClass('active');
          });
          var loc = window.location;
          var baseURL = loc.protocol + "//" + loc.hostname;
          $(".pro-slider-img .pro-img-view").fancybox();


            $(".wish1").on('click',function(){
                var id = $(this).data('id');

                $("#prod_id").val(id);
            });

            $("body").on('click','.wish1',function(){

                 var loc =  window.location;
                 var baseURL = loc.protocol + "//" + loc.hostname;
                var product_id = $(this).data('id');
                var data = {'product_id':product_id};
                $.ajax({
                      url: baseURL+"/wishlist",
                      type: 'post',
                      data:data,
                      success: function(result) {

                          var imgs = baseURL+'/frontend/images/redwishlist.png';
                          document.getElementById("wishlist"+product_id).src = imgs;
                           //    setTimeout(function(){
                           //      location.reload();
                           // }, 1000);

                      }
                });
            });

            $("body").on('click','.wish2',function(){

                 var loc =  window.location;
                 var baseURL = loc.protocol + "//" + loc.hostname;
                var product_id = $(this).data('id');
                var data = {'product_id':product_id};
                $.ajax({
                      url: baseURL+"/wishlistprod",
                      type: 'post',
                      data:data,
                      success: function(result) {
                         if(result == 'success'){
                          var imgs = baseURL+'/frontend/images/redwishlist.png';
                          document.getElementById("wishlist"+product_id).src = imgs;
                         }
                           //    setTimeout(function(){
                           //      location.reload();
                           // }, 1000);

                      }
                });
            });

                  $("#abcd").on('click',function(){console.log("#abcd");
                   var product_id = $("#prod_id").val();
                    var name = $("#name1").val();
                    var mobile1 = $("#mobile1").val();
                   var email = $("#email").val();

                   var utm_source = $(".utm_source").val();
                   var utm_medium = $(".utm_medium").val();
                   var utm_campaign = $(".utm_campaign").val();
                   var loc = window.location;
                   var baseURL = loc.protocol + "//" + loc.hostname;
                   var data = {'product_id':product_id,'name':name,'mobile':mobile1,'email':email,'utm_source':utm_source,'utm_campaign':utm_campaign,'utm_medium':utm_medium};
                   $.ajax({
                      url: baseURL+"/wishlist",
                      type: 'post',
                      data:data,
                      success: function(result) {
                        if(result == 'success'){
                             //$("#abcd")[0].reset();
                             $("#msg").html("We will save your wishlist");
                              setTimeout(function(){
                                $(".alert-success").html('');
                           }, 4000);
                             $("#wishlist").attr('src',baseURL+'/frontend/images/redwishlist.png');
                              setTimeout(function(){
                                $("#msg").html("");
                                $(".close").click();
                           }, 2000);

                        }
                        else{
                           $("#msg").html("We will not save your wishlist");
                        }
                      }
                  });

            });


            $("#store_enquiry_btn").click(function(e){
              e.preventDefault();
              var product_name = $(".pname").text();
              var name = $.trim($('#name').val());
              var email = $.trim($('#email1').val());
              var contact = $.trim($('#mobile').val());
              var state_id = $("#state_id").val();
                   var city_id = $("#city_id").val();
              var message = $.trim($('#message').val());
              var utm_source = $('.utm_source').val();
              var utm_medium = $('.utm_medium').val();
              var utm_campaign = $('.utm_campaign').val();

              var flag=0;
              var EmailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
              var PhonePattern = /^[0-9]{10}$/;
              if(name=='' || name == null)
              {
                  $('#name').addClass('error');
                  flag++;
              }
              else
              {
                  $('#name').removeClass('error');
              }

              if(contact == null || contact == '' || !PhonePattern.test(contact))
              {
                  $('#mobile').addClass('error');
                  flag++;
              }
              else
              {
                  $('#mobile').removeClass('error');
              }


              if(flag==0)
              {
                $('#store_enquiry_btn').prop('disabled',true);
                $('#store_enquiry_btn').html('Please wait...');
                  var form_data = new FormData();
              form_data.append('product_name', product_name);
              form_data.append('name', name);
              form_data.append('email', email);
              form_data.append('mobile', contact);
              form_data.append('state_id',state_id);
              form_data.append('city_id', city_id);
              form_data.append('message', message);
              form_data.append('utm_source', utm_source);
              form_data.append('utm_campaign', utm_campaign);
              form_data.append('utm_medium', utm_medium);

                         $.ajaxSetup({
                      headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                     });
                          $.ajax({
                          type : "POST",
                          url : '/product-enquiry',
                          contentType: false,
                          cache: false,
                          processData:false,
                          data : form_data,
                         success:function(response){
                         $('#store_enquiry_btn').html('Submit');
                          $("#store_enquiry")[0].reset()
                           $('#store_enquiry_btn').prop('disabled',false);
                          $('#store_enquiry_msg').html('<p class="alert alert-success">'+response+'</p>');
                           setTimeout(function(){
                                $(".close").click();
                                $('#store_enquiry_msg').html('');
                           }, 2000);

                      },
                          error: function() {
                            $('#store_enquiry_btn').prop('disabled',false);
                              $('#store_enquiry_msg').html('<p class="alert alert-danger">'+response+'</p>');
                          }
                      });
              }

          });
      // -----------------------------------------------------------------------------smooth scroll
      // var html = document.documentElement;
      // var body = document.body;

      // var scroller = {
      //   target: document.querySelector(".smoothScroll"),
      //   ease: 0.1,
      //   endY: 0,
      //   y: 0,
      //   resizeRequest: 1,
      //   scrollRequest: 0,
      // };

      // var requestId = null;

      // TweenLite.set(scroller.target, {
      //   rotation: 0.01,
      //   force3D: true
      // });

      // window.addEventListener("load", onLoad);

      // function onLoad() {
      //   updateScroller();
      //   window.focus();
      //   window.addEventListener("resize", onResize);
      //   document.addEventListener("scroll", onScroll);

      // }

      // function updateScroller() {

      //   var resized = scroller.resizeRequest > 0;

      //   if (resized) {
      //     var height = scroller.target.clientHeight;
      //     body.style.height = height + "px";
      //     scroller.resizeRequest = 0;
      //   }

      //   var scrollY = window.pageYOffset || html.scrollTop || body.scrollTop || 0;

      //   scroller.endY = scrollY;
      //   scroller.y += (scrollY - scroller.y) * scroller.ease;

      //   if (Math.abs(scrollY - scroller.y) < 0.05 || resized) {
      //     scroller.y = scrollY;
      //     scroller.scrollRequest = 0;
      //   }

      //   TweenLite.set(scroller.target, {
      //     y: -scroller.y
      //   });

      //   requestId = scroller.scrollRequest > 0 ? requestAnimationFrame(updateScroller) : null;
      // }

      // function onScroll() {
      //   scroller.scrollRequest++;
      //   if (!requestId) {
      //     requestId = requestAnimationFrame(updateScroller);
      //   }
      // }

      // function onResize() {
      //   scroller.resizeRequest++;
      //   if (!requestId) {
      //     requestId = requestAnimationFrame(updateScroller);
      //   }
      // }

      // -----------------------------------------------------------------------------smooth scroll end


    //   var controller = new ScrollMagic.Controller();

    // // build tween
    //     var tween = TweenMax.to(".product-fallbackVisual", 0.5, {scale: 0.2, ease: Power2.easeOut});

    //     // build scene
    //     var scene = new ScrollMagic.Scene({triggerElement: ".product-mainContent", duration: 400,triggerHook:0.9, offset: 250})
    //             .setTween(tween)
    //             .setPin(".product-fallbackVisual")
    //             // .addIndicators({name: "resize"}) // add indicators (requires plugin)
    //             .addTo(controller);

    //      })


    //   var galleysection = new ScrollMagic.Scene({
    //           triggerElement: ".product-mainContent",
    //           triggerHook: 0.9, // show, when scrolled 10% into view
    //           duration: "80%", // hide 10% before exiting view (80% + 10% from bottom)
    //           offset: 50 // move trigger to center of element
    //         })
    //         .setClassToggle(".product-mainContent", "visible") // add class to reveal
    //         // .addIndicators() // add indicators (requires plugin)
    //         .addTo(controller);


    $(".fetchpallets").on('click',function(){
        // alert();
        $('.fetchpallets').removeClass('active');
        $(this).addClass('active');

        $("#pallete_data").css('opacity','0.5').css('transition','1s ease');
        var count = $(this).attr('data-pallet');
        //var a = count.replace('Pallet Design ','template2-bg');
        var a = count.replace(/ /g, "_");
        $(".pallets").addClass(a);
        var id = $(this).attr('id');
        var product_id = $("#prod_id1").val();
        var form_data = {'id':id,'product_id':product_id};
        $.ajax({
          type : "POST",
          url : '/fetchdesign_colorpallete',
          data : form_data,
          success:function(response){
             $("#pallete_data").html(response);
             $("#pallete_data").css('opacity','1').css('transition','3s ease');
               $(".custom-grid-item-products").hover(function(event) {
        $(".custom-rel-product-title").css({top: event.clientY, left: event.clientX}).show();
    }, function() {
        $(".custom-rel-product-title").hide();
    });
             if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                $('.product-visuals').on('click',function() {
                        $('.custom-rel-product-title').toggleClass('myClass');
                        $('.grid-container').toggleClass('afterclass');
                        $('.related-product-overlay').toggleClass('opacity1');
                });
              }

              $('.scrollTo').click(function(){
                $('html, body').animate({
                    scrollTop: $( $(this).attr('href') ).offset().top
                }, 700);
                return false;
            });
     },
          error: function() {
          }
        });
      });

        $(".custom-grid-item-products").hover(function(event) {
        $(".custom-rel-product-title").css({top: event.clientY, left: event.clientX}).show();
    }, function() {
        $(".custom-rel-product-title").hide();
    });

/*------------color pallet button js starts-----*/
    $(document).ready(function(){
   if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
      $('.product-visuals').on('click',function() {
              $('.custom-rel-product-title').toggleClass('myClass');
              $('.grid-container').toggleClass('afterclass');
              $('.related-product-overlay').toggleClass('opacity1');
      });
    }

    $('.scrollTo').click(function(){
      $('html, body').animate({
          scrollTop: $( $(this).attr('href') ).offset().top
      }, 700);
      return false;
  });


    // $('.palette-btn-white li').click(function () {
    //     alert();
    //     $('.palette-btn-white li').removeClass('active');
    //     $(this).addClass('active');
    // });

});

  });
