@extends('frontend.layouts.app')
@section('content')
@include('frontend.layouts.svg-icons')
@section('css')
   <link rel="stylesheet" href="{{asset('frontend/css/custom1.css')}}" />
   <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/lightgallery.css')}}">
   <style type="text/css">


   </style>
@endsection
           <section id="careerPage" class="career-page-full-block hgvh-100 ">
               <div class="custom-container">
                <div class="shape">
                  </div>
                 <div class="col-md-12">
                      <div class="col-md-6">

                          <h1 class="title-int-pages">Careers</h1>
                          <div class="career-left">

                             <!-- <h2>Our Story</h2> -->
                             <div class="content-career">
                              <p>Royale Touche luxury laminates offers some of India’s finest high pressure and compact laminates. And is a pioneer of luxury laminates in the country.</p>
                              <p>At Royale Touche our endeavour is to bring newness and positive change to everyday life. We have always encouraged individuals with out of the box ideas that carry the vision to take Royale Touche to the next level.</p>
                              <p>Join this family of experienced and talented members!</p>
                                 <!-- <p>Between bright yellows and not so subtle pastels; between radical and conservative; between geometric and floral Royale Touche was born. It was the turn of decade. It was 1978 to be precise when 5 brothers Ashwin Patel, Arvind Patel, Dinesh Patel, Bharat Patel and Jitendra Patel caught on to the entrepreneurial wind that was, at the time, blowing through Gujarat. Their enterprise of choice: Laminates that would change the way India looked at laminates.</p>

                                 <p>This technicoloured dream was first established in Wadhwan City with Royale Touche’s first manufacturing unit. And when the machine started rolling, they made the country’s first luxury laminates. Suddenly the laminate was no longer just an economical, hard-wearing background. The brothers created laminates that had texture, unparalleled designs and most importantly; character.</p> -->
                             </div>
                          </div>
                         </div>

                          <div class="col-md-6">
                              <div class="right-block-career page-form-right">
                                 <form  method="post" action="{{route('save_careers_page_form')}}" enctype="multipart/form-data" autocomplete="off" class="form" >

                                    {{csrf_field()}}

                                  <h2 class="apply-now-title">Apply Now</h2>
                                  @if(session('success'))
                              <div style="text-align: center;color:green">


                                        {!! \Session::get('success') !!}
                              </div>


                            @endif
                                   <div class="col-md-12">
                                      <div class="form-group">
                                         <input class="form-control " id="applyname" name="name" type="text" placeholder="Name*"  value="{{old('name')}}">

                                         @error('name')
                                         <span class="text-danger">{{$message}}</span>
                                         @enderror

                                        </div>
                                   </div>
                                   <div class="col-md-12">
                                      <div class="form-group">
                                         <input class="form-control" id="applycontact" name="contact"  type="text" placeholder="Contact No*" value="{{old('contact')}}">
                                         @error('contact')
                                         <span class="text-danger">{{$message}}</span>
                                         @enderror

                                        </div>
                                   </div>
                                   <div class="col-md-12">
                                      <div class="form-group">
                                         <input class="form-control" id="applyemail" name="email" type="text" placeholder="Email ID (Not Cumpulsory)" value="{{old('email')}}">
                                         @error('email')
                                         <span class="text-danger">{{$message}}</span>
                                         @enderror

                                        </div>
                                   </div>

                                   <div class="col-md-12">
                                      <div class="form-group">
                                         <select name="city" class="form-control" id="city">
                                         @foreach ($cities as $city )
                                         <option {{old('city')==$city ? 'selected' :''}} value="{{$city}}">{{$city}}</option>

                                         @endforeach
                                        </select>
                                        @error('city')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                      </div>
                                   </div>

                                   <div class="col-md-12">
                                      <div class="form-group">
                                         <select name="position" class="form-control" id="applyposition">
                                             <option {{old('position')=='Accounts' ? 'selected' :''}} value="Accounts">Accounts</option>
                                             <option {{old('position')=='Export Import' ? 'selected' :''}} value="Export Import">Export Import</option>
                                             <option {{old('position')=='Marketing' ? 'selected' :''}} value="Marketing">Marketing</option>
                                             <option {{old('position')=='Office Assistant' ? 'selected' :''}} value="Office Assistant">Office Assistant</option>
                                             <option {{old('position')=='Showroom Sales Cordinator' ? 'selected' :''}} value="Showroom Sales Cordinator">Showroom Sales Cordinator</option>
                                             <option {{old('position')=='Site Locator' ? 'selected' :''}} value="Site Locator">Site Locator</option>
                                        </select>


                                         @error('city')
                                         <span class="text-danger">{{$message}}</span>
                                         @enderror
                                        </div>
                                   </div>
                                    <input type="hidden" name="utm_source" id="utm_source" class="utm_source" value="{{request()->query('utm_source')}}">
                                              <input type="hidden" name="utm_medium" class="utm_medium" id="utm_medium" value="{{request()->query('utm_medium')}}">
                                              <input type="hidden" name="utm_campaign" id="utm_campaign" class="utm_campaign" value="{{request()->query('utm_campaign')}}">
                                   <div class="col-md-12">
                                      <div class="form-group">
                                         <input type="file" name="resume" class="custom-file-input form-control" id="career_resume" aria-describedby="inputGroupFileAddon01">

                                      </div>
                                   </div>
                                   <button class="btn black-submit-btn" type="submit" >Submit</button>
                                   <span id="career-form-submit-msg"></span>
                                 </form>


                              </div>


                          </div>


                        </div>
                      </div>
                </section>
           @endsection
 @section('scripts')

<script type="text/javascript">



      $(document).ready(function(){


            $(document).on("click", "#career-form-submit", function (e) {


                alert(123);
              e.preventDefault();

              var name = $.trim($('#applyname').val());

              var mobile = $.trim($('#applycontact').val());
              var email = $.trim($('#applyemail').val());
              var resume = $.trim($('#career_resume').val());
              var city = $.trim($('#applycity').val());
              var position = $.trim($('#applyposition').val());
              var utm_source = $(".utm_source").val();
              var utm_campaign = $(".utm_campaign").val();
              var utm_medium = $(".utm_medium").val();

              var flag=0;
              var EmailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
              var phonePattern = /^[0-9]*$/;
              if(name=='' || name == null)
              {
                  $('#applyname').addClass('error');
                  flag++;
              }
              else
              {
                  $('#applyname').removeClass('error');
              }


              if(email == null || email == '' || !EmailPattern.test(email))
              {
                  $('#applyemail').addClass('error');
                  flag++;
              }
              else
              {
                  $('#applyemail').removeClass('error');
              }

              if(mobile == null || mobile == '' || !phonePattern.test(mobile))
              {
                  $('#applycontact').addClass('error');
                  flag++;
              }
              else
              {
                  $('#applycontact').removeClass('error');
              }

              if(flag==0)
              {
                $('#career-form-submit').prop('disabled',true);
                $('#career-form-submit').html('Please wait...');
                  var form_data = new FormData();
              form_data.append('resume', $('#career_resume')[0].files[0]);
              form_data.append('name', name);
              form_data.append('email', email);
              form_data.append('mobile', mobile);
              form_data.append('city', city);
              form_data.append('position', position);
              form_data.append('utm_source', utm_source);
              form_data.append('utm_medium', utm_medium);
              form_data.append('utm_campaign', utm_campaign);
                        $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                          $.ajax({
                          type : "POST",
                          url : '/save_careers_page_form',
                          contentType: false,
                          cache: false,
                          processData:false,
                          data : form_data,
                         success:function(response){
                         $('#career-form-submit').html('Submit');
                          $("#formLogin")[0].reset();
                           $('#career-form-submit').prop('disabled',false);
                          $('#career-form-submit-msg').html('<p class="alert alert-success">'+response+'</p>');

                      },
                          error: function() {
                            $('#career-form-submit').prop('disabled',false);
                              $('#career-form-submit-msg').html('<p class="alert alert-danger">'+response+'</p>');
                          }
                      });
              }

          });
          });
</script>
@endsection
