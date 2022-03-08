@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Add Size Chart</h5>
    <div class="card-body">
      <form method="post" action="{{route('sizecharts.store')}}" enctype="multipart/form-data">
         {{csrf_field()}}
        <div class="form-group">
            <label for="image" class="col-form-label">Upload Chart<span class="text-danger">*</span></label>
            <input id="image" type="file" name="image"  value="{{old('image')}}" class="form-control">
            @error('image')
              <span class="text-danger">{{$message}}</span>
            @enderror
        </div>    

        <div class="form-group">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
              <option value="1">Active</option>
              <option value="0">Inactive</option>
          </select>
          @error('status')
             <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group mb-3">
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
