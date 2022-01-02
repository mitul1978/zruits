
@extends('frontend.layouts.app')
@section('content')

<style type="text/css">

/*--------CSS for homepage starts video section & changes for it--------*/
a.archi-line:hover {
    color: #ffffff;
    border-color: #ffffff;
}

.edit-num{
   border-bottom: 1px solid #000 !important;
}
#myVideo{
      position: absolute;
    right: 0;
    bottom: 0;
    /*top: -72px;*/
    min-width: 100%;
    min-height: 100%;
    width: 100%;
}
.search-btn, .product-noticeButton__wrapper, .home-action-guide .home-action-bt .btn-bg, .home-action-grid .home-action-bt  .btn-bg{
    border: 2px solid #bca148;
}
.home-action-guide .home-action-bt span, a.home-action-bt.btn.popover-btn span {
    color: #ffffff !important;
}
.home-action-bt .btn-bg:before, button#store_enquiry_btn:before {
    background: #bca148;
    color: #000000;
}

a.archi-line {
    color: #bea449;
    border-bottom: 1px solid #bea449;
    font-weight: 600;
  }
  p.home-action-desc{
    color: #bea449 !important;
    /*font-weight: 600;*/
  }
  .home_page .footer-right-item {
    color: #bea449;
}

/*=======================================*/
.search-btn, .product-noticeButton__wrapper, .home-action-guide .home-action-bt .btn-bg, .home-action-grid .home-action-bt .btn-bg{
background:#295265
}


  .home-actions {
    width: 100%;
    background: #ffffff;
    max-width: 100%;
    left: 0px;
    padding: 0px;
    margin: 0 auto;
    padding: 10px 25% 0px;
    bottom:-40px !important;
}
.home-wrapper{
  width: 100%;
    margin: 0px !important;
    max-width: 100%;
}
.home-wrapper{
  width: 100%;
    margin: 0px !important;
    max-width: 100%;
}
a.archi-line {
    position: absolute;
    right: 166px;
}
.homepage .footer-right-item {
    color: #bea449;
}

@media screen and (max-width: 767px){
   .home-action-desc{
    font-size: 11px;
  }
  .home-action{
    padding:0px 10px;
    /*margin-bottom: 12px;*/
  }
  .home-actions{
    left: 50% !important;
      margin-left: 0px !important;
      transform: translateX(-50%);
      width: 100%;
      bottom: 150px;
      padding: 0!important;
      /*bottom: 0px;*/
  }

/*------------CSS for homepage ends video section & changes for it--------*/
/*=======================================*/

.note-block{
  margin-top:10px;
  text-align: justify!important;
  background: transparent!important;
  color:#333!important;
}
.note-block span{
  font-size: 12px;
  line-height: 16px;
  display: block;
  letter-spacing: 0.5px;
  text-align: justify;
}
 .policy-link{
      color:#cea668;
    }
    .space-block{
      height: 30px;
    }
    #privacy-policy-popup.modal{
      z-index: 9909!important;
    }
        .p-close{
  color: #fff;
    opacity: 1;
    background: #23504a!important;
    width: 30px;
    height: 30px;
}
}
</style>






      <video autoplay muted playsinline id="myVideo" class="video-desktoponly">
        <source src="https://ik.imagekit.io/heccv5isbw/desktop.mp4" type="video/mp4">
      <!-- Your browser does not support HTML5 video. -->
      </video>

      <video autoplay muted playsinline id="myVideo" class="video-mobileonly">
        <source src="https://ik.imagekit.io/heccv5isbw/mobile.mp4" type="video/mp4" class="mobileonly">
      <!-- Your browser does not support HTML5 video. -->
      </video>


          <section id="page" class="home" >


            <!--   <a href="https://web.whatsapp.com/send?phone=916353448624&amptext=%F0%9F%91%8B%F0%9F%8F%BD%20Hi!%20I%20would%20like%20some%20information%20from%20Royale%20Touche." target="_blank" class="hidden-xs ">
                     Whatsapp Us
              </a> -->



               <div class="home-wrapper">

                <!-- <a href="{{url('architecture_form')}}" class="archi-line">Are you an Architect?</a> -->
                <div><a href="javascript:void(0);" id="archi-line" class="archi-line">Are you an Architect?</a>
                  </div>



                   <a href="https://web.whatsapp.com/send?phone=919687671044&amp;text=%F0%9F%91%8B%F0%9F%8F%BD%20Hi!%20I%20would%20like%20more%20about%20Royale%20Touche%20Laminates%20and%20Pavimento%20Wooden%20Floors." data-url="" target="_blank" class="whatsappdesk home-action-bt btn hidden-xs">
                      <div class="btn-bg"></div>
                        <span><h2>  <img class="icons-col" src="{{asset('frontend/images/landing-collection/whatsappicon.png')}}"> Whatsapp Us</h2></span>
                    </a>

                  <div class="home-actions">
                     <div class="home-action home-action-guide">
                        <a href="{{route('guide',['applications'])}}" data-url="" class="home-action-bt btn hidden-xs">
                           <div class="btn-bg"></div>
                           <!-- <span>Guide My Choice</span> -->
                           <span><h2>Guide My Choice</h2></span>
                        </a>

                        <h3 class="home-action-desc">Guide me through<br class="hidden-xs"> your collection</h3>
                     </div>
                     <div class="home-action home-action-grid">
                        <a href="{{route('products')}}" class="home-action-bt btn popover-btn hidden-xs">
                           <div class="btn-bg"></div>
                           <!-- <span>Whole Collection</span> -->
                           <span><h2>Whole Collection</h2></span>
                        </a>
            
                        <div class='popup'>
                          <div class="popuptext">We have an extensive collection of designs with over 800+ products. We recommend that you let us guide you.</div>
                         <svg height="20" width="100" viewBox="0 0 230 50">
                            <path d="M0 50 L65 0 L40 0 Z"></path>
                            Sorry, your browser does not support inline SVG.
                          </svg>
                        </div>

                        <!-- <p class="home-action-desc">I want to see the<br class="hidden-xs"> entire collection</p> -->
                        <!-- <p class="home-action-desc">I want to check the<br class="hidden-xs"> entire collection</p> -->
                        <h3 class="home-action-desc">I want to check the<br class="hidden-xs"> entire collection</h3>
                     </div>
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
                              <input type="number" name="phone" placeholder="Phone" data-validation="number length" data-validation-length="min10" pattern="[789][0-9]{9}" maxlength="10" onchange="checkMobileNumber(this)" class="form-control" id="phone">
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
                           <input type="hidden" id="gclid_field" name="gclid_field" value="">
                          <div class="submit-block">
                             <input type="submit" class="btn btn-submit" id="arc_submit" value="Submit">
                             <div id="msg" style="font-size: 25px;"></div>

                          </div>

                          <div class="note-block">
                            <span>*By clicking Submit you agree to Royale Touche's <a href="javascript:void(0);" class="policy-link">privacy policy.</a></span>
                        </div>


                       </form>
                    </div>
                 </div>
              </div>





      </section>

        <!-- Privacy policy popup -->
                <div id="privacy-policy-popup" class="modal fade white-modal nxt-gen-modal" role="dialog">
                   <div class="modal-dialog">
                      <!-- Modal content-->
                      <div class="modal-content">
                         <div class="modal-header">
                            <button type="button" class="close close-modal" data-dismiss="modal">&times;</button>
                          </div>
                         <div class="modal-body thank-you-body">
                           <h5 class="modal-title text-center">Royale Touche's privacy policy
                            <br>
                             You Authorize Royale Touche to send you updates via Whatsapp.</h5>
                         </div>
                         <div class="space-block"></div>
                      </div>
                   </div>
                </div>
                <!-- privacy policy end -->


@endsection
@section('scripts')
<script type="text/javascript">

         $(document).ready(function(){


          $('.policy-link').click(function(){
             $('#privacy-policy-popup').modal('show');
          });
           $('.close-modal').click(function(){
             $('#privacy-policy-popup').modal('hide');
           });

        });

  </script>
@endsection


