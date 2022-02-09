@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Add Coupon</h5>
    <div class="card-body">
      <form method="post" action="{{route('coupon.store')}}">
        {{csrf_field()}}

        <div class="form-group">
          <label for="name" class="col-form-label">Name <span class="text-danger">*</span></label>
          <input id="name" type="text" name="name" placeholder="Enter Coupon Name"  value="{{old('name')}}" class="form-control" required>
          @error('name')
            <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Coupon Code <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="code" placeholder="Enter Coupon Code"  value="{{old('code')}}" class="form-control" required>
          @error('code')
            <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="max_use" class="col-form-label">Max Use<span class="text-danger">*</span></label>
          <input id="max_use" type="number" name="max_use" placeholder="Enter Max Use"  value="{{old('max_use')}}" class="form-control" required>
          @error('max_use')
            <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
            <label for="type" class="col-form-label">Type <span class="text-danger">*</span></label>
            <select name="type" class="form-control" required>
                <option value="fixed">Fixed</option>
                <option value="percent">Percent</option>
            </select>
            @error('type')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="value" class="col-form-label">Value <span class="text-danger">*</span></label>
            <input id="value" type="number" name="value" placeholder="Enter Coupon value"  value="{{old('value')}}" class="form-control" required>
            @error('value')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group">
          <label for="start_date" class="col-form-label">Start Date <span class="text-danger">*</span></label>
          <input id="start_date" type="date" name="start_date"  value="{{old('start_date')}}" class="form-control" required>
          @error('start_date')
            <span class="text-danger">{{$message}}</span>
          @enderror
      </div>

      <div class="form-group">
        <label for="end_date" class="col-form-label">End Date <span class="text-danger">*</span></label>
        <input id="end_date" type="date" name="end_date" value="{{old('end_date')}}" class="form-control" required>
        @error('end_date')
          <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

        <div class="form-group">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control" required>
              <option value="1">Active</option>
              <option value="0">Inactive</option>
          </select>
          @error('status')
            <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group mb-3">
          <button type="reset" class="btn btn-warning">Reset</button>
           <button class="btn btn-success" type="submit">Submit</button>
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
