<form action="{{url('update-user-address/'.$address->id)}}" method="POST">
@csrf
<div class="form-ship-add">
    <div class="col-md-12 row-grp no-padding">
            <div class="col-md-6 pd-lt-0 m-pd-right-0">
              <input type="text" class="form-control"  name="first_name" id="first_name" placeholder="First name" value="{{$address->first_name}}">
              @error('first_name')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="col-md-6 pd-lt-0 pd-rt-0">
              <input type="text" class="form-control" name="last_name" id="last_name" Placeholder="Last name" value="{{$address->last_name}}">
              @error('last_name')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
          </div>

          <div class="col-md-12 pd-lt-0 row-grp pd-rt-0">
              <textarea type="text" class="form-control" name="address" id="address" placeholder="Enter your address" value="">{{$address->address}}</textarea>
              @error('address')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
      

          <div class="col-md-12 row-grp no-padding">
             <div class="col-md-4 pd-lt-0 m-pd-right-0">
              {{-- <input type="text" class="form-control" name="state" id="state" Placeholder="State name" value="{{old('state')}}"> --}}

             <select class="form-control select-search state_id" name="state_id" id="state" >
              @foreach ($states as  $state_id =>  $state)
              @if(old('state_id'))
              <option  {{$address->state_id==$state_id ? 'selected' : ''}} value="{{$state_id}}">{{ $state}}</option>
              @else
              <option  {{25 ==$state_id ? 'selected' : ''}} value="{{$state_id}}">{{ $state}}</option>

              @endif
             @endforeach
             @error('state_id')
             <span class="text-danger">{{$message}}</span>
             @enderror
            </select>
        </div>
           <div class="col-md-4 pd-lt-0 m-pd-right-0">
            <select class="form-control select-search city" name="city_id" id="city_id" >
                @foreach ($cities as  $city_id =>  $city)
                    <option  {{$address->city_id==$city_id ? 'selected' : ''}} value="{{$city_id}}">{{ $city}}</option>
               
               @endforeach
            </select>
        @error('city_id')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>
             <div class="col-md-4 pd-lt-0 pd-rt-0">
              <input type="text" class="form-control pincode" name="pincode" id="pinCode" placeholder="PIN Code" value="{{$address->pincode }}">
              @error('pincode')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
          </div>
          <input {{$address->dnd ? 'checked' :'' }} type="checkbox" id="dnd" name="dnd" value="1"><label for="dnd" style="margin-left:5px; ">Keep me up to date on news and exclusive offers</label>
          <button class="btn btn-success pull-right address-edit-submit-btn" type="submit">Update</button>

            <br>

        <input type="checkbox" name="is_primary" {{$address->is_primary ? 'checked' :'' }} value="1"><span style="margin-left:5px; ">Save this information for next time</span>

  </div>
</form>