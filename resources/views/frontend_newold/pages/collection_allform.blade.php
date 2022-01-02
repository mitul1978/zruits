<style type="text/css">
         .msg{
         text-align: center;
         color: #fff;
         font-size: 15px;
         }
         #formdiv span{color: red;}
         

          .form-control{
            height: 34px;
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

        
         @media screen and (max-width: 375px){
           .form-control{
            height: 34px;
          }
         }
      </style>

         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <!-- <h4 class="modal-title">Please fill the details so our team can send you the catalogue.</h4> -->
                  <h4 class="modal-title">Please fill the details for us to get in touch with you!</h4>

               </div>
               <div class="modal-body">
                  <div id="formdiv">
                     <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                        <span id="nameError"></span>
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
                        <span id="contactError"></span>
                     </div>
                    <!-- <div class="form-group" id="citydiv">  
                            <select name="city_id" id="city_id" class="form-control chosen-select-deselect1" required="required">
                                     
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
                     </div> -->
                     <!--  <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" id="email">
                        </div> -->
                     <input type="hidden" value="{{Request::segment(2)}}" id="type" name="type">
                     <input type="submit" id="Submit-{{Request::segment(2)}}" name="" class="btn btn-all btn-rounded asdf" value="Submit">
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
      
        