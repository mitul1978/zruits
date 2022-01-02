@extends('frontend.layouts.app')
@section('content')


@section('css')
<!-- <link rel="stylesheet" type="text/css" href="http://royaletouche.firsteconomy.com/frontend/css/normalize.css"> -->
<!-- <link rel="stylesheet" type="text/css" href="http://royaletouche.firsteconomy.com/frontend/css/demo.css"> -->


<style type="text/css">
@import url('https://fonts.googleapis.com/css2?family=Mr+De+Haviland&display=swap');
  body.home_copy_page{
    /*overflow:visible!important;*/
  }
.edit-num{
   border-bottom: 1px solid #000 !important;
}
/*=======================================*/
@media screen (max-width: 767px){

    .carousel-home .owl-nav{
    display: block !important;
    }

  .slider-block{
    transform: scale(1.5);
  }

  .slider-inner img{
    transform: translateX(10px);
  }
  body.home_copy_page{
    /*overflow:visible!important;*/
  }
  #footer{display: none;}
}

</style>
@endsection
<p id="demo" style="display:none;" onLoad="">Your coordinates:Latitude: <br>Longitude: </p>

<a href="javascript:void(0);" id="archi-line" class="archi-line">Are you an Architect?</a>
 <div class="mobile-version-home visible-xs">
   <a href="tel:9898344689" class="mob-home-call">Call Us</a>


            <!-- whats app button -->

                    <a href="https://api.whatsapp.com/send?phone=919687671044&amp;text=%F0%9F%91%8B%F0%9F%8F%BD%20Hi!%20I%20would%20like%20more%20about%20Royalé%20Touché%20Laminates%20and%20Pavimento%20wooden%20floors." target="_blank" class="mob-home-call whatsappmob hidden-lg hidden-md hidden-sm">
                           Whatsapp Us
                    </a>
                <!-- whats app button end-->
                  <section class="mob-section-home">


                     <!--  <div class="mob-title-block-home">
                          <h1 class="title-mob">Welcome to the world of luxury laminates!</h1>
                          <h2 class="subtitle-mob">Bring your dream home to reality</h2>
                      </div>
 -->
                      <div class="carousel-block-mob">
                          <div class="container-fluid">
                              <div class="carousel-home owl-carousel owl-theme">
                                  <div class="item">
                                    <img class="mob-portrait" src="https://ik.imagekit.io/heccv5isbw/mob-s1.jpg">
                                    <img class="mob-landscape" src="https://ik.imagekit.io/heccv5isbw/land1.jpg">
                                  </div>
                                  <!-- <div class="item">
                                     <img src="{{asset('frontend/images/home/slider-mob/mob-s2.jpg')}}">
                                  </div> -->

                              </div>
                          </div>
                      </div>

                      <div class="mob-navigators">
                            <div class="navi-btns">
                                <a href="{{url('guide')}}" data-url="" class="btn  home-action-btn-mob visible-xs">
                                   <!-- <div class="btn-bg"></div> -->
                                   <!-- <span>Guide me through <br> your collection</span> -->
                                  <span>Guide me through <br> the collection</span>
                                </a>

                                <a href="{{route('products')}}" class=" home-action-btn-mob btn visible-xs">
                                 <!-- <div class="btn-bg"></div> -->
                                 <!-- <span>I want to check the <br> entire collection</span> -->
                                 <span>I want to check the <br> entire collection</span>
                              </a>
                            </div>
                      </div>
                            <div id="right-form-block" class="right-form-block">
                 <div class="form-block">
                  <i class="fa fa-times close-form-block" aria-hidden="true"></i>
                    <p class="form-line">Please share your contact details for our executive to get in touch with you.</p>
                    <div>
                       <form id="user-info-form" method="post" name="user-info-form" action="javascript:void(0);">

                          <input type="hidden" name="_token" value="eB5AUHwP5Ul1yGL6Y9BKmrJBO8GHMfwAVWkZWY2G">
                          <div class="form-group">
                          <input type="text" name="name" placeholder="Name" required="" class="form-control" id="name" data-validation="required custom" data-validation-regexp="^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$" autocomplete="off">
                          </div>
                          <!-- <div class="form-group">
                             <input type="number" name="phone" placeholder="Phone" data-validation="number length" data-validation-length="min10"  maxlength="10" onchange="checkMobileNumber(this)" class="form-control" id="phone">
                          </div> -->


                        <div class="col-xs-12 form-group nopadding">
                           <div class="col-xs-2 nopadding">
                              <div class="edit-num">+91</div>
                           </div>
                           <div class="col-xs-10 nopadding">
                              <input type="number" name="phone" placeholder="Phone" data-validation="number length" data-validation-length="min10"  maxlength="10" onchange="checkMobileNumber(this)" class="form-control" id="phone">
                           </div>


                     </div>
                          <div class="form-group">
                             <input type="email" name="email" data-validation="required email" placeholder="Email" required="required" class="form-control" id="email">
                          </div>

                          <div class="form-group">

                            <select name="state_id" class="form-control" id="state_id" onChange="getcity('/select-city?state_id='+this.value)">

                                                                     <option value="1">Andhra Pradesh</option>
                                                                        <option value="2">Assam</option>
                                                                        <option value="3">Bihar</option>
                                                                        <option value="4">Chandigarh</option>
                                                                        <option value="5">Chhattisgarh</option>
                                                                        <option value="6">Gujarat</option>
                                                                        <option value="7">Jharkhand</option>
                                                                        <option value="8">Karnataka</option>
                                                                        <option value="9">Madhya Pradesh</option>
                                                                        <option value="10">Maharashtra</option>
                                                                        <option value="11">New Delhi</option>
                                                                        <option value="12">Odisha</option>
                                                                        <option value="13">Punjab</option>
                                                                        <option value="14">Rajasthan</option>
                                                                        <option value="15">Tamil Nadu</option>
                                                                        <option value="16">Uttar Pradesh</option>
                                                                        <option value="17">West Bengal</option>
                                                                        <option value="18">Telangana</option>
                                                                        <option value="19">Haryana</option>
                                                                        <option value="20">Nepal</option>
                                                                        <option value="21">Kerala</option>
                                                                    </select>
                          </div>
                         <div class="form-group" id="citydiv">
                            <select name="city_id" id="city_id" class="form-control" style="pointer-events:none" >
                                     <option value="">Select city</option>
                            </select>
                          </div>
                          <input type="hidden" class="utm_source" name="utm_source" id="utm_source" value="{{request()->query('utm_source')}}">
                          <input type="hidden" name="utm_medium" class="utm_medium" id="utm_medium" value="{{request()->query('utm_medium')}}">
                          <input type="hidden" name="utm_campaign" class="utm_campaign" id="utm_campaign" value="{{request()->query('utm_campaign')}}">
                          <div class="submit-block">
                             <input type="submit" class="btn btn-submit" id="arc_submit" value="Submit">
                             <div id="msg" style="font-size: 25px;"></div>

                          </div>
                       </form>
                    </div>
                 </div>
              </div>
                  </section>
                </div>





@endsection
@section('scripts')


<script type="text/javascript">
  $(document).ready(function(){console.log(window.matchMedia("(min-width: 767px)").matches);

var x=document.getElementById("demo");
function getLocation1() {

  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);

  }
  else{
    x.innerHTML="Geolocation is not supported by this browser.";
  }
}
function showPosition(position)
{
 x.innerHTML = "Latitude: " + position.coords.latitude + "<br>Longitude: " + position.coords.longitude;

            //     var ajax_data = {
            //     Latitude : position.coords.latitude,
            //     Longitude : position.coords.longitude,
            // };
            var ajax_data = {
                Latitude : position.coords.latitude,
                Longitude : position.coords.longitude,
            };

            $.ajaxSetup({
                      headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                     });
            $.ajax({
                type: "POST",
                url: '/fetch-latlng',
                data: ajax_data,
                success: function(result) {
                    //console.log(result);return false;
                   var a = JSON.parse(result);
                   var state = parseInt(a[0].state_id);
                   var city = parseInt(a[0].city_id);

                    $.when($("select#state_id").val(state).change()).then(function() {
                        setTimeout(function(){
                         $("#city_id").val(city);
                         $("#city_id").change();
                        },4000);
                    });


                },
                error: function() {


                }
            });
}
getLocation1();
            $('.carousel-home').owlCarousel({
                loop:true,
                margin:10,
                dots:false,
                // animateIn: 'fadeIn',
                // animateOut: 'fadeOut',
                nav:true,
                navText: [
                 "<i class='fa fa-caret-left'></i>",
                '<img src="{{asset("frontend/images/next1.png")}}" class="" alt="images not found">'
                ],
                mouseDrag:false,
                touchDrag:false,
                smartSpeed:2500,
                // autoplaySpeed:5500,
                mouseDrag:false,
                // fluidSpeed:5500,
                // autoplay:true,

                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:1
                    },
                    1000:{
                        items:1
                    }
                }
            });
  $("#archi-line").click(function() {
        $("#right-form-block").addClass("open");
       });

      $(".close-form-block").click(function() {
        $("#right-form-block").removeClass("open");
          });



});

 function getXMLHTTP() {
    var xmlhttp = false;
    try {
        xmlhttp = new XMLHttpRequest();
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (e) {
            try {
                xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e1) {
                xmlhttp = false;
            }
        }
    }
    return xmlhttp;
}
    function getcity(strURL) {
    var req4 = getXMLHTTP();
    if (req4) {
        req4.onreadystatechange = function() {
            if (req4.readyState == 4) {
                if (req4.status == 200) {
                    document.getElementById('citydiv').innerHTML = req4.responseText;

                } else {
                    alert("There was a problem while using XMLHTTP:\n" + req4.statusText);
                }
            }
        }
        req4.open("GET", strURL, true);
        req4.send(null);
    }
}
</script>
@endsection
