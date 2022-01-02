@extends('frontend.layouts.app')
@section('content')
@include('frontend.layouts.svg-icons')
@section('css')
   <link rel="stylesheet" href="{{asset('frontend/css/custom1.css')}}" />
   <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/lightgallery.css')}}">
   <style type="text/css">
 ul.catalog-block {
  margin: 0;
  padding: 0;
  display: block;/*flex;*/
}
 #state_id option, #city_id option {
             color: #000 !important;
          }
ul.catalog-block li {
  list-style: none;
  width: 33% !important;
  padding:50px;
    float: left;

    min-height: 620px;
    margin: 0px;
}

ul.catalog-block li a {
  position: relative;
  display: block;
  text-align: center;
  line-height: 63px;
  /*background: #333;*/
  /*background: #fff;*/
  /*border-radius: 50%;*/
  border-radius: 20px;
  font-size: 30px;
  color: #666;
  transition: .5s;
}

ul.catalog-block li a::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  /*border-radius: 50%;*/
  border-radius: 20px;

  background:#fff;
  transition: .3s;
  transform: scale(.5);
  z-index: -1;
}

ul.catalog-block li a:hover::before {
  transform: scale(1.1);
  box-shadow: 0 0 15px #161616;
}

ul.catalog-block li a:hover .name-catalog{
color: #000;
    /*box-shadow: 0 0 5px #b2b1ac;*/
    text-shadow: 0 0 5px #9b9b98;
}


.msg{color:#fff;font-size: 12px;}

.error{border-bottom:1px solid red !important;}

/*added*/
.catalog-page{
   position: relative;
    z-index: 10;
    font-size: 0;
    min-height: 100vh;
    padding-top: 200px;
    background: #fff;
    box-shadow: 0 0 15px #161616;
}
@media screen and (min-width:1440px) {
  .catalog-page{
 padding-top: 300px;
}
.catalog-single-block{
  margin-left: 35%;
}
}
.cata-head.typography-headline-super{
  padding-top: 50px;
}
.heading-catalog{
    color: #1b5665;
    text-transform: uppercase;
    font-family: roboto_bold;
    font-size: 80px!important;
    position: absolute;
    top: 0px;
    /*opacity: 0.2;*/
    left: 50%;
    transform: translateX(-50%);
}
/*.heading-catalog:after {
    content: "";
    width: 150px;
    position: absolute;
    background: #c5dbdf;
    height: 5px;
    display: block;
    margin-top: 10px;
  } */
.name-catalog{
  margin:20px 0px;
  font-size: 20px;
  color: #000;
}

ul.catalog-block li img{
  border-radius: 20px;
}

  .catalog-blob-2{
      position: absolute;
      left: 0px;
      z-index: -1;
      /* height: 500px; */
      width: 100%;
      bottom: 0px;
      /* opacity: 0.3; */
  }

@media(max-width: 767px){
  .cata-head.typography-headline-super {
    padding-top: 90px;
    font-size: 31px !important;
}
ul.catalog-block li {
    list-style: none;
    width: 50% !important;
    padding: 10px !important;
        min-height: 420px;
    }
}
@media(max-width: 360px){
ul.catalog-block li {
    list-style: none;
    width: 100% !important;
    padding: 10px !important;
        min-height: auto;
    }
}

@media (max-width: 768px) and (orientation:landscape){
.catalogue_page ul.catalog-block li {
    list-style: none;
    width: 33% !important;
    padding: 10px !important;
    min-height: 525px;
}
.catalogue_page ul.catalog-block {
    padding-top: 72px;
}
}

@media (max-width: 640px) and (orientation:landscape){
.catalogue_page ul.catalog-block li {
    min-height: 405px;
}
}
     /*note css*/
    .note-block {
        margin: 12px 0px 00px;
        padding: 10px;
        background: rgb(206 166 104 / 14%)!important;
        border-radius: 16px;
        color: #fff!important;
    }
    .note-block span{
      font-size: 12px;
      line-height: 16px;
      display: block;
      letter-spacing: 0.5px;
    }
     .policy-link{
      color:#cea668;
    }
    .space-block{
      height: 30px;
    }
    .p-close{
    color: #fff;
    opacity: 1;
    background: #23504a!important;
    width: 30px;
    height: 30px;
}
    /*note css end*/

   </style>
@endsection
          <section id="Page" class="catalog-page">


              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 500" class="catalog-blob-2 absolute left-50 trans-x-50 z-0" style="
              ">
               <path d="M1260.63,111.72C1325,73.45,1387.51,66.82,1440,88.92V1636H0V75.17c114.13-57.5,354.26-92.58,509.29-66.3C675.62,37.23,756.06,141.54,920.05,173,1037.69,195.22,1174.79,162.75,1260.63,111.72Z" fill="#f6f6f6"></path>
            </svg>
              @if(isset($catalogues) && count($catalogues)>0)
               <div class="container">

                <!-- <h2 class="cata-head typography-headline-super transition-1 large-10 large-centered small-12 gradient-h2"></h2>  -->

                <h1 class="cata-head heading-catalog typography-headline-super transition-1 large-10 large-centered small-12 gradient-h2">Our <br> Catalogues</h1>
                  <ul class="catalog-block" style="@if($catalogues[0]->id == 1){{'padding: 59px;'}} @endif">
                    @foreach($catalogues as $key=>$catalog)
                         @php $dfile = '';
                          $dfile = preg_replace('|https:\/\/ik.imagekit.io/heccv5isbw\/\s*|','frontend/images/catalog/',$catalog->download_file);
                         @endphp
                    <li class="catalog-single-block">
                      <a href="{{asset($catalog->download_file)}}" id="dld{{$catalog->id}}" download></a>
                      <a href="{{asset($dfile)}}" id="d{{$catalog->id}}" download></a>

                      <a href="#" class="catalogdata" data-toggle="modal" data-id="{{$catalog->id}}" data-target="#formmodal">

                        @if($catalog->title == 'Royale Touche HD Print')<img class="hidden-xs" src="{{asset($catalog->image)}}" alt="{{$catalog->title}}" style="">
                        <img class="hidden-lg hidden-md" src="{{asset($catalog->image)}}" alt="{{$catalog->title}}" style="">
                        @elseif($catalog->title == 'Royale Touche Catalogue')
                        <img class="hidden-xs" src="{{asset($catalog->image)}}" alt="Royale Touche Catalogue" style="height: 444px;">
                        <img class="hidden-md hidden-lg" src="{{asset($catalog->image)}}" alt="Royale Touche Catalogue" style="height: 200px;">
                        @else
                           <img src="{{asset($catalog->image)}}" alt="{{$catalog->title}}">
                        @endif
                        <div class="catalog-content">
                          <h2 class="name-catalog">{{$catalog->title}}</h2>
                        </div>
                      </a>

                    </li>
                    @endforeach
                   <!--  <li class="catalog-single-block">
                      <a href="#">
                        <img src="{{asset('frontend/abt-coffee.png')}}" alt="">
                       <div class="catalog-content">
                          <h2 class="name-catalog">HD Prints</h2>
                        </div>
                      </a>
                      </li>
                    <li class="catalog-single-block">
                      <a href="#">
                        <img src="{{asset('frontend/abt-coffee.png')}}" alt="">
                      <div class="catalog-content">
                          <h2 class="name-catalog">Architect Digest</h2>
                        </div>
                      </a>

                    </li> -->

                  </ul>
               </div>
               @endif
               <div id="formmodal" class="modal fade" role="dialog">
                                  <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Please fill your details for us to send you the catalogue.</h4>
                                      </div>
                                      <div class="modal-body">
                                       <form action="javascript:void(0)" class="store_enquiry" id="store_enquiry">
                                        <input type="hidden" id="catid" name="catid" value="">
                                          <div class="">
                                             <div class="col-lg-12 col-xs-12">
                                              <div class="form-group">
                                                <input type="text" name="name" id="name" class="form-control mt-2" placeholder="Name*">
                                              </div>
                                            </div>

                                            <div class="col-lg-12 col-xs-12 form-group ">
                                               <div class="col-lg-2 col-xs-2 nopadding">
                                                  <div class="edit-num">+91</div>
                                               </div>
                                               <div class="col-lg-10 col-xs-10 nopadding">
                                                  <input type="number" class="form-control" name="contact" placeholder="Phone" data-validation="number length" data-validation-length="min10" pattern="[789][0-9]{9}" maxlength="10" onchange="checkMobileNumber(this)" class="mt-2" id="contact">
                                               </div>
                                            </div>
                                            <div class="col-lg-12 col-xs-12">
                                              <div class="form-group">
                                                <input type="email" name="femail" id="femail" class="form-control mt-2" placeholder="Email">
                                              </div>
                                            </div>
                                             <div class="form-group">
                      <label for="phoneNo">State</label>
                            <select name="state_id" class="form-control" id="state_id" onChange="getcity('/select-city?state_id='+this.value)">
                                @foreach ($states as $state_id =>$state )
                                <option  value="{{ $state_id }}">{{$state}}</option>

                                @endforeach

                                                                    </select>
                          </div>
                         <div class="form-group" id="citydiv">
                            <select name="city_id" id="city_id" class="form-control" style="pointer-events:none" >
                                     <option value="">Select city</option>
                            </select>
                          </div>
                                            <div class="col-lg-12  col-xs-12 text-center">
                                              <button class="btn btn-light" id="store_enquiry_btn" type="submit">Submit</button>
                                              <input type="hidden" name="utm_source" id="utm_source" class="utm_source" value="{{request()->query('utm_source')}}">
                                              <input type="hidden" name="utm_medium" class="utm_medium" id="utm_medium" value="{{request()->query('utm_medium')}}">
                                              <input type="hidden" name="utm_campaign" id="utm_campaign" class="utm_campaign" value="{{request()->query('utm_campaign')}}">
                                              <span id="store_enquiry_msg" style="font-size: 17px !important;"></span>
                                            </div>
                                          </div>
                                        </form>
                                        <div class="clearfix"></div>
                                       <div class="note-block">
                      <span>*By clicking Submit you agree to Royale Touche's <a href="javascript:void(0);" class="policy-link">privacy policy.</a></span>
                  </div>
                                      </div>

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
                  <button type="button" class="close p-close" data-dismiss="modal">&times;</button>
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
<script>
$(document).on("click", ".catalogdata", function () {
     var myBookId = $(this).data('id');
     $("#catid").val( myBookId );
     // As pointed out in comments,
     // it is unnecessary to have to manually call the modal.
     // $('#addBookDialog').modal('show');
});

 $(document).ready(function(){

 $('.policy-link').click(function(){
           // $(this).parents('.modal').modal('hide');
             $('#privacy-policy-popup').modal('show');
          });

  // $(".catalogdata").on('click',function(){
  //     var id = $(this).data('id');
  //     document.getElementById("d"+id).click();
  // });

$("#download3").click();
     $("#store_enquiry_btn").click(function(e) {
    var email = $('#femail').val();
    var name = $('#name').val();
    var contact = $('#contact').val();
    var catalogue_id=$('#catid').val();
    var state_id = $("#state_id").val();
    var city_id = $("#city_id").val();
    var flag = 0;
    var EmailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
    var phonePattern = /^[789][0-9]{9}$/;
    var utm_source = $(".utm_source").val();
    var utm_campaign = $(".utm_campaign").val();
    var utm_medium = $(".utm_medium").val();


    if(name != '' && name!= null)
    {
        $('#name').removeClass('error');
    }
    else
    {
        $('#name').addClass('error');
        flag++;
    }
    if(phonePattern.test(contact) && contact != '' && contact!= null)
    {
        $('#contact').removeClass('error');
    }
    else
    {
        $('#contact').addClass('error');
        flag++;
    }
    if(EmailPattern.test(email) && email != '' && email!= null)
    {
        $('#femail').removeClass('error');
    }
    else
    {
        $('#femail').addClass('error');
        flag++;
    }
    if(state_id != '' && state_id != null){
       $("#state_id").removeClass('error');
    }
    else{
       $("#state_id").addClass('error');
    }

    if(city_id != '' && city_id != null){
       $("#city_id").removeClass('error');
    }
    else{
       $("#city_id").addClass('error');
    }

    if(flag==0)
    {
              $('#store_enquiry_btn').prop('disabled',true);
              $('#store_enquiry_btn').html('Please wait..');
          var ajax_data = {
            "_token": "{{ csrf_token() }}",
               catalogue_id:catalogue_id,
               name : name,
               contact : contact,
               email : email,
               state_id:state_id,
               city_id:city_id,
               utm_source : utm_source,
               utm_medium : utm_medium,
               utm_campaign:utm_campaign,
                }

            $.ajax({
                type: "POST",
                url: '/save-catalogue-form',
                data: ajax_data,
                success: function(result) {
                    var result = JSON.parse(result);
               // alert(result);
                 if(result.statusCode == 200){
                         $('#store_enquiry_btn').html('Submit');
                        $('#store_enquiry_btn').prop('disabled',false);
                        $("#store_enquiry")[0].reset();
                         document.getElementById("d"+catalogue_id).click();

                        $("#store_enquiry_msg").html(result.msg);

                        setTimeout(function(){ $('#store_enquiry_msg').html('');$(".close").click(); }, 3000);

                    }
                    else if(result == 2){
                        $('#store_enquiry_btn').html('Submit');
                        $('#store_enquiry_btn').prop('disabled',false);
                        $("#store_enquiry")[0].reset();
                         document.getElementById("d"+catalogue_id).click();

                        $("#store_enquiry_msg").html(result.msg);

                        setTimeout(function(){ $('#store_enquiry_msg').html('');$(".close").click(); }, 3000);
                    }
                    else
                    {
                      $("#store_enquiry")[0].reset();
                        $('#store_enquiry_btn').attr('disabled',false);
                        $('#store_enquiry_btn').html('Submit');
                       $("#store_enquiry_msg").html(result.msg);
                                                setTimeout(function(){$('#store_enquiry_msg').html(''); $(".close").click(); }, 3000);

                    }

                },
                error: function() {
                  $("#store_enquiry")[0].reset();
                    $('#store_enquiry_btn').prop('disabled',false);
             $("#store_enquiry_msg").html(result.msg);
                                             setTimeout(function(){$('#store_enquiry_msg').html(''); $(".close").click(); }, 3000);

                }
            });
    }

});
});
</script>
@endsection
