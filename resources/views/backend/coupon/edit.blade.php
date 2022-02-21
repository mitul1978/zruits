@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Edit Coupon</h5>
    <div class="card-body">
      <form method="post" action="{{route('coupon.update',$coupon->id)}}">
        @csrf
        @method('PATCH')

        <div class="form-group">
          <label for="name" class="col-form-label">Name <span class="text-danger">*</span></label>
          <input id="name" type="text" name="name" placeholder="Enter Coupon Name"  value="{{$coupon->name}}"  class="form-control" required>
          @error('name')
            <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Coupon Code <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="code" placeholder="Enter Coupon Code"  value="{{$coupon->code}}" class="form-control">
          @error('code')
            <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="max_use" class="col-form-label">Max Use<span class="text-danger">*</span></label>
          <input id="max_use" type="number" name="max_use" placeholder="Enter Max Use"  value="{{$coupon->max_use}}" class="form-control" required>
          @error('max_use')
            <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
              <label for="type" class="col-form-label">Type <span class="text-danger">*</span></label>
              <select name="type" class="form-control">
                  <option value="fixed" {{(($coupon->type=='fixed') ? 'selected' : '')}}>Fixed</option>
                  <option value="percent" {{(($coupon->type=='percent') ? 'selected' : '')}}>Percent</option>
              </select>
              @error('type')
              <span class="text-danger">{{$message}}</span>
              @enderror
          </div>

          <div class="form-group">
              <label for="inputTitle" class="col-form-label">Value <span class="text-danger">*</span></label>
              <input id="inputTitle" type="number" name="value" placeholder="Enter Coupon value"  value="{{$coupon->value}}" class="form-control">
              @error('value')
              <span class="text-danger">{{$message}}</span>
              @enderror
          </div>

          <div class="form-group">
            <label for="start_date" class="col-form-label">Start Date <span class="text-danger">*</span></label>
            <input id="start_date" type="date" name="start_date"  value="{{date("Y-m-d", strtotime($coupon->start_date))}}" class="form-control" required>
            @error('start_date')
              <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
  
        <div class="form-group">
          <label for="end_date" class="col-form-label">End Date <span class="text-danger">*</span></label>
          <input id="end_date" type="date" name="end_date" value="{{date("Y-m-d", strtotime($coupon->end_date))}}" class="form-control" required>
          @error('end_date')
            <span class="text-danger">{{$message}}</span>
          @enderror
      </div>

        <div class="form-group">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
            <option value="1" {{(($coupon->status=='active') ? 'selected' : '')}}>Active</option>
            <option value="0" {{(($coupon->status=='inactive') ? 'selected' : '')}}>Inactive</option>
          </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group mb-3">
           <button class="btn btn-success" type="submit">Update</button>
        </div>
      </form>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
    $('#description').summernote({
      placeholder: "Write short description.....",
        tabsize: 2,
        height: 150
    });
    });
</script>
@endpush
