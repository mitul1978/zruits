<style type="text/css">
         .msg{
         text-align: center;
         color: #000;
         font-size: 15px;
         }
         #formdiv .error{color: red;}
         

         /*new form css*/

         .white-modal .modal-content{
          background: #fff;
          color:#000;
         }
         .white-modal .modal-body{
            padding:0px;
         }
         .white-modal .close{
            color: #000;
            opacity: 1;
         }
         .white-modal .form-control{
          border-bottom: 1px solid #000;
          color: #000!important;
         }
         .form-control:focus{
         	box-shadow: none;
         }
         .edit-num{
              border-bottom: 1px solid #000;
         }
         .green-submit-btn{
          background: #215265!important;
          border:none!important;
         -webkit-box-shadow:0px 15px 15px -15px #000;
        -moz-box-shadow:0px 15px 15px -15px #000;
           box-shadow: 0px 15px 15px -15px #000;
         }
         .green-submit-btn:hover{
          color: #fff!important;
         }
         .w-60{
          width: 60%;
         }
         .w-55{
          width: 55%;
         }
          .w-45{
          width: 45%;
         }
         .w-50{
          width: 50%;
         }
         .white-modal .modal-title{
            width: 85%;
            margin: 0px auto;
            text-align: center;
         }
         .white-modal .form-right-block{
          padding-right: 20px;
         }
         .mg-0{
          margin:0px!important;
         }
          .mg-20-0{
          margin:20px 0px!important;
         }
         .w-full{
            width: 100%;
         }
          @media (max-width: 767px){
            .w-xs-100{
              width: 100%;
            }
            .d-xs-wrap{
              flex-wrap: wrap;
            }
            .white-modal .modal-title{
            	font-size: 12px;
    			margin-bottom: 18px;
            }
          }
         /*new form-css end*/


          @if(Request::segment(2) == 'Stores-across-India')
           .banner:after{
              background: rgb(0 0 0 / 60%);
           }
          @endif

         @media (min-width: 767px){
          

          .form-control{
            height: 34px;
          }
         }
         @media screen and (max-width: 375px){
           .form-control{
            height: 34px;
          }
         }

        /*note css*/
        .note-block {
            padding: 10px;
            margin: 12px 0px 00px;
            background: #23504a26;
            border-radius: 4px;
            color: #000000;
        }
        .note-block span{
          font-size: 12px;
            line-height: 16px;
            display: block;
            letter-spacing: 0.5px;
        }
        /*note css end*/
      </style>

        <!-- Modal -->
    
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <!-- <h4 class="modal-title">Please fill the details so our team can send you the catalogue.</h4> -->
                 

               </div>
               <div class="modal-body">
                 <h4 class="modal-title">1Share your details for us to send you the catalogue and also set up a free consultation with our expert. </h4>
                <div class="d-flex mg-0">
                  <div class="form-left-block w-45">
                  <div class="img-block-form">
                    <img src="../frontend/images/landing-collection/object-table.png">
                  </div>
                </div>

                 <div class="form-right-block w-55">
                  <div id="formdiv">
                     <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                        <span class="error" id="nameError"></span>
                     </div>
                     <input type="hidden" name="utm_source" id="utm_source" value="{{request()->get('utm_source')}}">
                     <input type="hidden" name="utm_campaign" id="utm_campaign" value="{{request()->get('utm_campaign')}}">
                     <input type="hidden" name="utm_medium" id="utm_medium" value="{{request()->get('utm_medium')}}">
                     <div class="form-group">
                        <label for="phoneNo">Mobile No</label>
                        <div class="col-xs-12 form-group nopadding">
                           <div class="col-xs-2 nopadding">
                              <div class="edit-num">+91</div>
                           </div>
                           <div class="col-xs-10 nopadding">
                              <input type="tel" name="contact" class="form-control" id="contact" required data-validation="number length" data-validation-length="min10" pattern="[789][0-9]{9}" maxlength="10" onchange="checkMobileNumber(this)">
                           </div>
                        </div>
                        <span class="col-xs-12 error" id="contactError"></span>
                     </div>
                     
                    <!--  <div class="form-group" id="citydiv">  
                            <select name="city_id" id="city_id" class="form-control chosen-select-deselect1" required="required">
                                     <option value="">Select city</option>
                                     @if(!empty($city))
                                  @foreach($city as $k=>$v)
                                <option value="{{$v->id}}">{{$v->city_name}}</option>
                                  @endforeach
                                  @endif
                            </select>
                            <span class="col-xs-12 error" id="cityError"></span>
                     </div> 
                    <div class="form-group">  
                      
                            <div id="statesid"></div>
                            <span class="col-xs-12 error" id="stateError"></span>
                     </div>  
         -->
                     <!--  <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" id="email">
                        </div> -->
                     <input type="hidden" value="{{Request::segment(2)}}" id="type" name="type">
                     <input type="submit" id="Submit-{{Request::segment(2)}}" name="" class="btn btn-all btn-rounded asdf green-submit-btn w-full mg-20-0" value="Submit">
                     <div id="msg" class="msg"></div>
                     <!-- <button type="submit" >Submit</button> -->
                  </div>
                  <div id="otpdiv" class ="hide">
                     <div class="form-group">
                        <label for="emotpail">OTP:</label>
                        <input type="otp" class="form-control" id="otp" placeholder="Enter OTP" name="otp">
                     </div>
                     <button id="otpSubmit" class="btn btn-primary">Submit</button>
                  </div>

                  <div class="note-block">  
                      <span>  *By clicking Submit you agree to Royale Touche's privacy policy and authorize Royale Touche to send you updates via Whatsapp</span>
                  </div>
                </div>
                </div>
                
               
               </div>
            </div>
         </div>
     