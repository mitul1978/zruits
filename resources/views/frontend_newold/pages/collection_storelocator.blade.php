@extends('layouts.app')
@section('content')

<style type="text/css">
             /*body{font-family: "Roboto",sans-serif !important;}*/
             .error{border-bottom: 1px red solid !important;}
              .gm-style-iw-d p{color: #000 !important;} 
              .gm-style-iw-d p a{color: #000 !important;}
              p:hover > a{color:#00626E !important; }
              a{color: #fff;}
              

              .store-listing ul li a:hover, .store-listing ul li a:active, .store-listing ul li a:focus,.store-listing ul li a:active{
                        background: #fff !important;
                        color: #00626E !important;
              }

              .store-listing ul li a:hover{color:#00626E !important;}

              .store-listing ul li p:hover{color:#00626E !important;}
                 

             .store-locator .form-control {
                  color: #a1a1a1;
                  border: 1px solid #fff;
                  border-radius: 20px;
                  width: 100%;
              }   
              #state_id option,#city_id option{color: #000 !important;}                 
              .form-inline .form-control:focus{
                outline:none;
              }


      </style>
   

  <div class="sidebar-contact">
    <div class="toggle">Enquire Now</div>
    <p>Please fill in the details. We will get back to you!</p>
    <form action="javascript:void(0)" class="store_enquiry" id="store_enquiry">
        <div class="">
          <div class="col-lg-12 p-lr-0">
            <div class="form-group">
               
              <input type="text" name="name" id="name" class="form-control mt-2" placeholder="Name" required="">
            </div>
          </div>
         
          <div class="col-lg-12 p-lr-0">
            <div class="form-group">
              <input type="email" name="email" id="email" class="form-control mt-2" placeholder="Email" >
            </div>
          </div>
          <div class="col-lg-12 p-lr-0">
            <div class="form-group">
              <input type="number" name="contact" maxlength="10" id="contact" class="form-control mt-2" placeholder="Contact Number" required="">
            </div>
          </div>
          <div class="col-lg-12 p-lr-0">
            <div class="form-group">
              <textarea class="form-control" name="message" id="message" placeholder="Message" rows="3"></textarea>
            </div>
          </div>
          
          <div class="col-lg-12 text-center">
            <button class="btn btn-light" id="store_enquiry_btn" type="submit">Submit</button>
            <span id="store_enquiry_msg"></span>
             <input type="hidden" class="utm_source" name="utm_source" id="utm_source" value="{{request()->query('utm_source')}}">
                                              <input type="hidden" name="utm_medium" class="utm_medium" id="utm_medium" value="{{request()->query('utm_medium')}}">
                                              <input type="hidden" name="utm_campaign" class="utm_campaign" id="utm_campaign" value="{{request()->query('utm_campaign')}}">
          </div>
        </div>
      </form>
     
  </div>
      
    <p id="demo" style="display:none;" onLoad="">Your coordinates:Latitude: 19.252334599999998<br>Longitude: 72.9796154</p>
       
            <section id="storeLocator" class="store-locator">
               

              <div class="custom-container">            
                  <div class="shape">                    
                  </div>               

                  <div class="col-md-12 store-locator-outer">                  

                    <div class="col-md-5 store-locator-details">

                      <h1 class="title-int-pages">Reach Us </h1>

                      <div class="store-locator-header form-inline">
                      

                    
                          <div class="form-group">  
                            <select name="state_id" class="form-control"  id="state_id" onChange="getcity('/select-city?state_id='+this.value)">
                                 <option value="">Select State</option>
                                 @foreach($states as $state)
                                    <option value="{{$state->id}}" @if(Request::get('state') == $state->state_name){{'selected'}}@endif>{{$state->state_name}}</option>
                                    @endforeach
                                </select>
                          </div>
                          <div class="form-group" id="citydiv">  
                            <select name="city_id" id="city_id" class="form-control" style="pointer-events:none" >
                                     <option value="">Select city</option>
                            </select>
                          </div>                       
                          <!-- <button type="submit" class="btn btn-default btn-set store-enq-btn" data-toggle="modal" data-target="#formmodal">Enquire Now</button> -->
                        <!-- Modal -->
                                <div id="formmodal" class="modal fade" role="dialog">
                                  <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Please fill in the details. We will get back to you!</h4>
                                      </div>
                                      <div class="modal-body">
                                       <div class="store_enquiry" id="store_enquiry">
                                          <div class="">
                                            <div class="col-lg-12">
                                              <div class="form-group">
                                                 
                                                <input type="text" name="name" id="name" class="form-control mt-2" placeholder="Name" required>
                                              </div>
                                            </div>
                                           
                                            <div class="col-lg-12">
                                              <div class="form-group">
                                                <input type="email" name="email" id="email" class="form-control mt-2" placeholder="Email (Not Required)" required>
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
                                               <input type="hidden" name="utm_source" id="utm_source" value="{{request()->get('utm_source')}}">
       <input type="hidden" name="utm_campaign" id="utm_campaign" value="{{request()->get('utm_campaign')}}">
       <input type="hidden" name="utm_medium" id="utm_medium" value="{{request()->get('utm_medium')}}">
                                            </div>
                                            
                                            <div class="col-lg-12 text-center">
                                              <button class="btn btn-light" id="store_enquiry_btn" type="submit">Submit</button>
                                              <span id="store_enquiry_msg"></span>
                                            </div>
                                          </div>
                                           
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                                      </div>
                                    </div>

                                  </div>
                                </div>
    
                      </div>
                      <div class="store-listing">
                      
                        <ul id="address_div" class="" style="display:none">
                         
                                
                             
                            
                         
                      
                        
                        </ul>
                      </div>
                    </div>

                      <div class="col-md-7">
                      <div class="store-map" id="map" style="width: 100%; height: 400px;">
                       
                      </div>
                      </div>

                 
                  </div>
                        
               </div>

            </section>
        
    


     
@endsection            
@section('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVU15AiAPE0CIXZZaqwN3EeMdHOOm5Kzw"  type="text/javascript"></script>
  <script type="text/javascript">
    $(document).ready(function(){
    
    
    var loc = window.location;
    var baseURL = 'https://www.royaletouche.com/collection/{{Request::segment(2)}}';
    
    //$("#state_id").change();
    $("#state_id").val('6');
    $("#state_id").change();

    var state = $("#state_id option:selected").text();
    
    $('body').on('change','#city_id', function() {
       var cityval = '';
       var city1 = '';
        var city = $("#city_id option:selected").text();
        var cityval = $("#city_id option:selected").val();
         var state = $("#state_id option:selected").text();
        getLoc('/select-map?city_id='+this.value);

        if(cityval >= 0){
          var city1 = '&city='+city;
        }
        //window.location.href = baseURL+"/reach-us?state="+state+'&city='+city;  
         var new_URl=baseURL+'/reach-us?state='+state+city1;
        window.history.pushState('page2', "", new_URl);
    });

    $("#state_id").on('change',function(){
       var state = $("#state_id option:selected").text();
       // window.location.href = baseURL+"/reach-us?state="+state;
       var new_URl=baseURL+'/reach-us?state='+state;
        window.history.pushState('page2', "", new_URl);
       getcity('/select-city?state_id='+this.value);
    });
   
     
      
      //$("#city_id").change();
});
      var toggle_temp=false;
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
                    toggle_temp= true;
                    getLoc('/select-map?city_id=-'+strURL.replace('/select-city?state_id=',''))
                } else {
                    alert("There was a problem while using XMLHTTP:\n" + req4.statusText);
                }
            }
        }
        req4.open("GET", strURL, true);
        req4.send(null);
    }
}

function getLoc(strURL) {
    var req5 = getXMLHTTP();
    if (req5) {
        req5.onreadystatechange = function() {
            if (req5.readyState == 4) {
                if (req5.status == 200) {
                    if (toggle_temp){
                        document.getElementById("address_div").style.display="block";
                        // document.getElementById("address_div").nextSibling.nextSibling.style.width="";
                    }
                    var temp_array;
                    var locations=[];
                    var locations_temp=JSON.parse(req5.responseText);

                    for (var i=0;i<locations_temp.length;i++){
                        locations[i]=['<h2>'+locations_temp[i].store_name+'</h2><p>'+locations_temp[i].store_address+'<br>'+locations_temp[i].store_owner+'<br><a href="tel:'+locations_temp[i].store_phone+'">'+locations_temp[i].store_phone[0]+'</a><br><a href="mailto:'+locations_temp[i].store_email+'">'+locations_temp[i].store_email+'</a><br><a href="https://www.google.com/maps?saddr=My+Location&amp;daddr='+locations_temp[i].lat+','+locations_temp[i].lon+'" target="_blank" class="getdir_style">Get Direction</a></p>',locations_temp[i].lat,locations_temp[i].lon,i];

                    }

                    var map = new google.maps.Map(document.getElementById('map'), {
                        maxZoom: 15,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    });

                    var infowindow = new google.maps.InfoWindow();
                    var bounds = new google.maps.LatLngBounds();

                    var marker, i, address_div;
                    var address_div='';
                    if(locations.length >0 ){


                    for (i = 0; i < locations.length; i++) {
                     var image = '{{asset("frontend/images/pin.png")}}';

                        marker = new google.maps.Marker({
                            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                            map: map,
                            icon:image
                        });
                        google.maps.event.addListener(marker, 'click', (function(marker, i) {
                            return function() {
                                infowindow.setContent(locations[i][0]);
                                infowindow.open(map, marker);
                            }
                        })(marker, i));
                        bounds.extend(marker.position);


                        address_div += '<li><div class="flex-info-store"><div class="info">' + locations[i][0] + '</div><a href="https://royaletouche.com/collection-store-detail/'+locations_temp[i].id+'" title="Click here for the details"><div class="show-map-icon"><i class="fa fa-info-circle" aria-hidden="true"></i></div></a></div></li>';

                    }
                     }else{
                        address_div +="<div class='addr'>No Store Available !</div>";
                     }
                    map.fitBounds(bounds);
                    document.getElementById('address_div').innerHTML = address_div;
                    for (i = 0; i < locations.length; i++) {
                        document.getElementById('address_div').children[i].addEventListener('mouseover', (function(marker, i) {
                            var image = '{{asset("frontend/images/pin.png")}}';
                            marker = new google.maps.Marker({
                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                map: map,
                                icon:image
                            });
                            return function() {
                                infowindow.setContent(locations[i][0]);
                                infowindow.open(map, marker);
                            }
                        })(marker, i));


                    }
                    for (i = 0; i < locations.length; i++) {
                      var image = '{{asset("frontend/images/pin.png")}}';
                            
                        marker = new google.maps.Marker({
                            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                            map: map,
                            icon:image
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


  getLoc('/select-map?city_id=*');

var geocoder;
  var map;
 

  function codeAddress() {
    var address = document.getElementById('address').value;
    geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == 'OK') {
        map.setCenter(results[0].geometry.location);
        var image = '{{asset("frontend/images/pin.png")}}'; 
        var marker = new google.maps.Marker({
            map: map,
            icon:image,
            position: results[0].geometry.location
        });
      } else {
        alert('Geocode was not successful for the following reason: ' + status);
      }
    });
  }

  var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};
</script>
<script>
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
                        console.log(state,city);
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

 $("#store_enquiry_btn").click(function(e){   
              e.preventDefault();
               
              var name = $.trim($('#name').val());
              var email = $.trim($('#email').val());
              var contact = $.trim($('#contact').val());
              var message = $.trim($('#message').val());
              var utm_source = $("#utm_source").val();
              var utm_campaign = $("#utm_campaign").val();
              var utm_medium = $("#utm_medium").val();
            
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
                          url : '/collection-store-enquiry',
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

    //  setTimeout(function() {
    //     $('#formmodal').modal('show');
    // }, 5000);
       

       $(document).ready(function(){
        $('.toggle').click(function() {
          $('.sidebar-contact').toggleClass('active');
          $('.toggle').toggleClass('active');
          
        })
        
      });
      </script>
@endsection
