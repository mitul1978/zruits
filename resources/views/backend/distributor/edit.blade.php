@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Edit Dealer</h5>
    <div class="card-body">
      <form method="post" action="{{route('distributor.update',$user->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-md-4">

        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Distributor Name</label>
        <input id="inputTitle" type="text" name="name" placeholder="Enter name"  value="{{old('name') ? old('name') : $user->name}}" class="form-control">
        @error('name')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>
        </div>
        <div class="col-md-4">

        <div class="form-group">
            <label for="inputEmail" class="col-form-label">Email</label>
          <input id="inputEmail" type="email" name="email" placeholder="Enter email"  value="{{old('email') ? old('email') : $user->email}}" class="form-control">
          @error('email')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
    </div>
        <div class="col-md-4">

        <div class="form-group">
            <label for="mobile" class="col-form-label">Mobile</label>
          <input id="mobile" type="number" min="0" name="mobile" placeholder="Enter Mobile Number"  value="{{old('mobile') ? old('mobile') : $user->mobile}}" class="form-control">
          @error('mobile')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>
        </div>
    </div>

          <div class="form-group">
            <label for="address" class="col-form-label">Address</label>
          <textarea id="address" name="address" placeholder="Enter address"  class="form-control">{{old('address') ? old('address') : $user->address}}</textarea>
          @error('address')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>

          <div class="row">
            <div class="col-md-6">
        <div class="form-group">
            <label for="state_id" class="col-form-label">State</label>

            <select name="state_id" class="form-control" id="state_id" required>
            <option value="">Select State</option>

                @foreach ($states as $state_id => $state)
                <option  {{(($user->state_id==$state_id) ? 'selected' : '')}} value="{{$state_id}}">{{$state}}</option>

                @endforeach
            </select>
          @error('state_id')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>
        </div>

          <div class="col-md-6">

          <div class="form-group">
            <label for="city_id" class="col-form-label">City</label>
            <select name="city_id" class="form-control" id="city_id">

                @foreach ($cities as $city_id => $city)
                <option  {{(($user->city_id==$city_id) ? 'selected' : '')}} value="{{$city_id}}">{{$city}}</option>

                @endforeach

            </select>
          @error('city_id')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>
          </div>
        </div>


        <div class="row">
            <div class="col-md-4">
          <div class="form-group">
            <label for="pincode" class="col-form-label">Pincode</label>
          <input id="pincode" type="text" name="pincode" placeholder="Enter pincode"  value="{{old('pincode') ? old('pincode') : $user->pincode}}" class="form-control">
          @error('pincode')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>
        </div>

          <div class="col-md-4">

          <div class="form-group">
            <label for="gst_no" class="col-form-label">GST Number</label>
          <input id="gst_no" type="text" name="gst_no" placeholder="Enter GST Number"  value="{{old('gst_no') ? old('gst_no') : $user->gst_no}}" class="form-control">
          @error('gst_no')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>
        </div>


          <div class="col-md-4">

          <div class="form-group">
            <label for="pancard_no" class="col-form-label">Pancard Number</label>
          <input id="pancard_no" type="text" name="pancard_no" placeholder="Enter Pancard Number"  value="{{old('pancard_no') ? old('pancard_no') : $user->pancard_no}}" class="form-control">
          @error('pancard_no')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>
        </div>

          {{-- <div class="col-md-3">

        <div class="form-group">
            <label for="inputPassword" class="col-form-label">Password</label>
          <input id="inputPassword" type="password" name="password" placeholder="Enter password"  value="{{old('password') ? old('password') : $user->password}}" class="form-control">
          @error('password')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
    </div> --}}
</div>

<div class="row">

    <div class="form-group col-md-1">
    @if($user->photo)
    <img src="{{asset('images/distributors/'.$user->photo)}}" class="img-fluid rounded-circle" style="max-width:100px" alt="{{$user->photo}}">
@else
    <img src="{{asset('backend/img/avatar.png')}}" class="img-fluid rounded-circle" style="max-width:100px" alt="avatar.png">
@endif
    </div>
        <div class="form-group col-md-3">
        <label for="inputPhoto" class="col-form-label">Photo</label>
        <div class="input-group">


            <input id="thumbnail" class="form-control" type="file" name="photo" >
        </div>
        <img id="holder" style="margin-top:15px;max-height:100px;">
          @error('photo')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>



          <div class="col-md-4">

            <div class="form-group">
                <label for="authorised_person_name" class="col-form-label">Authorised Person Name</label>
              <input id="authorised_person_name" type="text" name="authorised_person_name" placeholder="Enter Authorised Person Name"  value="{{old('authorised_person_name') ? old('authorised_person_name') : $user->authorised_person_name}}" class="form-control">
              @error('authorised_person_name')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
        </div>


        <div class="form-group col-md-4">
            <label for="status" class="col-form-label">Status</label>
            <select name="status" class="form-control">
                <option {{(($user->status=='1') ? 'selected' : '')}} value="1">Active</option>
                <option {{(($user->status=='0') ? 'selected' : '')}} value="0">Inactive</option>
            </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>
        </div>





        <div class="form-group mb-3">
           <button class="btn btn-success" type="submit">Update</button>
        </div>
      </form>
    </div>
</div>

@endsection


@push('scripts')
<script>

    $('#state_id').on('change',function(){
        var state_id = $(this).val();
        alert(123)
        if(state_id){
            $.ajax({
            url:"/get_cities_by_state_id",
            data:{_token:"{{csrf_token()}}",state_id},
            type:"POST",
            success:function(response){
                    var html_option=""
                    var data=response;
                    $.each(data,function(id,title){
                        html_option +="<option value='"+id+"'>"+title+"</option>"
                    });
                    $('#city_id').html(html_option);
                }
            });
        }else{
            $('#city_id').html('');
        }
    })
</script>
@endpush
