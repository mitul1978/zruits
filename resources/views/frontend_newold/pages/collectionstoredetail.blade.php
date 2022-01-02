@extends('layouts.app')
@section('content')
@section('title'){{$store->meta_title}}@stop
@section('description','{!!$store->meta_description!!}')
@include('layouts.svg-icons')
@section('css')
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" />
   <link rel="stylesheet" href="{{asset('frontend/css/aboutus.css')}}" />
   <style type="text/css">
        a{color:#000 !important;}
.gm-style-iw-d p,gm-style-iw-d p > a{color:#000 !important;}
      footer{
         bottom: 0;
         position: fixed !important;
      }
      .container{margin-top: 5% !important;}
   </style>
@endsection
          <section id="storeLocator" class="store-locator" >
                <input type="hidden" id="store_id" value="{{$store->id}}">
            <!--   <canvas height="750" id="one" width="1200" hidpi="off" class="relative" style="-webkit-user-drag: none; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas>


                <svg viewBox="0 0 1200 750" class="shape-back-store"><clipPath id="one"><path d="M-600,-375c504.28506,50 1008.57012,100 1200,150c191.42988,50 70.0046,100 33.18006,150c-36.82453,50 10.95169,100 29.25952,150c18.30782,50 7.14725,100 29.76596,150c22.61871,50 79.0167,100 103.54446,150c24.52776,50 17.18528,100 4.60952,150c-12.57575,50 -30.38478,100 -66.98189,150c-36.59711,50 -91.9823,100 -66.76034,150c25.22196,50 131.05106,100 -66.61729,150c-197.66836,50 -698.83418,100 -1200,150" fill="#000"></path></clipPath></svg> -->

              <div class="custom-container">
            
                  <div class="shape">
                    
                  </div>

                  <!--Store locator starts here-->

                  <div class="col-md-12 store-locator-outer">                  

                    <div class="col-md-6 store-locator-details">

                      <h1 class="title-int-pages">Store Details </h1>
                                <div class="store-listing" id="address_div">
                            <p>{{$store->store_name}},
                            <br>{{$store->store_address}},<br>{{$store->store_owner}},<br><a href="tel:{{$store->store_phone}}">{{$store->store_phone}},</a><br><a href="mailto:{{$store->store_email}}">{{$store->store_email}},</a><br><a href="https://www.google.com/maps?saddr=My+Location&amp;daddr={{$store->latitude}},{{$store->longitude}}" target="_blank" class="getdir_style">Get Direction</a></p>
                      </div>
                      <br>
                          <div class="store-locator-header">
                           <form action="javascript:void(0)" class="store_enquiry" id="store_enquiry">
                                              <div class="">
                    <div class="col-lg-12">
                      <div class="form-group">
                          <input type="hidden" id="store_id" class="form-control mt-2" value="{{$store->id}}">
                        <input type="text" name="name" id="name" class="form-control mt-2" placeholder="Name" required>
                      </div>
                    </div>
                   
                    <div class="col-lg-12">
                      <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control mt-2" placeholder="Email (Not Required)" >
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <input type="number" name="contact" id="contact" class="form-control mt-2" placeholder="Contact Number" required>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <textarea class="form-control" name="message" id="message" placeholder="Message" rows="3"></textarea>
                      </div>
                    </div>
                    
                    <div class="col-lg-12 text-center">
                      <button class="btn btn-light" id="store_enquiry_btn" type="submit">Submit</button>
                      <span id="store_enquiry_msg"></span>
                    </div>
                  </div>
                   <input type="hidden" name="utm_source" id="utm_source" class="utm_source" value="{{request()->query('utm_source')}}">
                                              <input type="hidden" name="utm_medium" class="utm_medium" id="utm_medium" value="{{request()->query('utm_medium')}}">
                                              <input type="hidden" name="utm_campaign" id="utm_campaign" class="utm_campaign" value="{{request()->query('utm_campaign')}}">
                </form>
            
                      </div>
                      
                    </div>

                      <div class="col-md-6">
                      <div class="store-map" id="map" style="width: 100%; height: 400px;">
                        
                      </div>
                      </div>

                 
                  </div>
                  <!--Store locator ends here-->
                  
               </div>
            </section>
@endsection            
@section('scripts')

     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDkUUrQg4APnBQaFu86zWWA1pOL7ZO77rM"  type="text/javascript"></script>
     
      <script type="text/javascript">
$( document ).ready(function() {
    var store_id=document.getElementById("store_id").value
        getLoc('/select-map-details?id='+store_id);
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

         function getLoc(strURL) {
    var req5 = getXMLHTTP();
    if (req5) {
        req5.onreadystatechange = function() {
            if (req5.readyState == 4) {
                if (req5.status == 200) {
                     
                        document.getElementById("address_div").style.display="block";
                        // document.getElementById("address_div").nextSibling.nextSibling.style.width="";
                    
                    var temp_array;
                    var locations=[];
                    var locations_temp=JSON.parse(req5.responseText);
                    for (var i=0;i<locations_temp.length;i++){
                        locations[i]=['<h2>'+locations_temp[i].store_name+'</h2><p>'+locations_temp[i].store_address+'<br>'+locations_temp[i].store_owner+'<br><a href="tel:'+locations_temp[i].store_phone+'">'+locations_temp[i].store_phone+'</a><br><a href="mailto:'+locations_temp[i].store_email+'">'+locations_temp[i].store_email+'</a><br><a href="https://www.google.com/maps?saddr=My+Location&amp;daddr='+locations_temp[i].lat+','+locations_temp[i].lon+'" target="_blank" class="getdir_style">Get Direction</a></p>',locations_temp[i].lat,locations_temp[i].lon,i];

                    }

                    var map = new google.maps.Map(document.getElementById('map'), {
                        maxZoom: 15,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    });

                    var infowindow = new google.maps.InfoWindow();
                    var bounds = new google.maps.LatLngBounds();

                    var marker, i, address_div;
                    var address_div='';

                    for (i = 0; i < locations.length; i++) {
                        marker = new google.maps.Marker({
                            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                            map: map
                        });
                        google.maps.event.addListener(marker, 'click', (function(marker, i) {
                            return function() {
                                infowindow.setContent(locations[i][0]);
                                infowindow.open(map, marker);
                            }
                        })(marker, i));
                        bounds.extend(marker.position);
                        address_div += '<div class="col-md-12">' + locations[i][0] + '</div>';

                    }
                    map.fitBounds(bounds);
                    document.getElementById('address_div').innerHTML = address_div;
                    for (i = 0; i < locations.length; i++) {
                        document.getElementById('address_div').children[i].addEventListener('mouseover', (function(marker, i) {
                            marker = new google.maps.Marker({
                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                map: map
                            });
                            return function() {
                                infowindow.setContent(locations[i][0]);
                                infowindow.open(map, marker);
                            }
                        })(marker, i));


                    }
                    for (i = 0; i < locations.length; i++) {
                        marker = new google.maps.Marker({
                            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                            map: map
                        });
                        google.maps.event.addListener(marker, 'click', (function(marker, i) {
                            return function() {
                                infowindow.setContent(locations[i][0]);
                                infowindow.open(map, marker);
                            }
                        })(marker, i));

                    }
                } else {
                    alert("There was a problem while using XMLHTTP:\n" + req5.statusText);
                }
            }
        }
        req5.open("GET", strURL, true);
        req5.send(null);
    }
}

          $("#store_enquiry_btn").click(function(e){   
              e.preventDefault();
                var store_id = $.trim($('#store_id').val());
              var name = $.trim($('#name').val());
              var email = $.trim($('#email').val());
              var contact = $.trim($('#contact').val());
              var message = $.trim($('#message').val());
              var utm_source = $(".utm_source").val();
              var utm_campaign = $(".utm_campaign").val();
              var utm_medium = $(".utm_medium").val();
            
              var flag=0;
              var EmailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
              var phonePattern = /^[0-9]{10}$/;
              if(name=='' || name == null)
              {
                  $('#name').addClass('error');
                  flag++;
              }
              else
              {
                  $('#name').removeClass('error');
              }

              

              if(email == null || email == '' || !EmailPattern.test(email))
              {
                  $('#email').addClass('error');
                  flag++;
              }
              else
              {
                  $('#email').removeClass('error');
              }

              if(contact == null || contact == '' || !phonePattern.test(contact))
              {
                  $('#contact').addClass('error');
                  flag++;
              }
              else
              {
                  $('#contact').removeClass('error');
              }

              if(flag==0)
              {
                $('#store_enquiry_btn').prop('disabled',true);
                $('#store_enquiry_btn').html('Please wait...');
                  var form_data = new FormData();
                   form_data.append('store_id', store_id);
              form_data.append('name', name);
              form_data.append('email', email);
              form_data.append('contact', contact);
              form_data.append('message', message);
              form_data.append('utm_source', utm_source);
              form_data.append('utm_medium', utm_medium);
              form_data.append('utm_campaign',utm_campaign);
                         $.ajaxSetup({
                      headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                     });
                          $.ajax({
                          type : "POST",
                          url : '/collectionstore-enquiry',
                          contentType: false,
                          cache: false,
                          processData:false,
                          data : form_data,
                         success:function(response){  
                         $('#store_enquiry_btn').html('Submit');  
                          $("#store_enquiry")[0].reset()   
                           $('#store_enquiry_btn').prop('disabled',false);         
                          $('#store_enquiry_msg').html('<p class="alert alert-success">'+response+'</p>'); 
                         
                      },
                          error: function() {
                            $('#store_enquiry_btn').prop('disabled',false);  
                              $('#store_enquiry_msg').html('<p class="alert alert-danger">'+response+'</p>'); 
                          }
                      });
              }

          });
});

  
      </script>
@endsection