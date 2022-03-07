@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Edit Size Chart</h5>
    <div class="card-body">
      <form method="post" action="{{route('sizecharts.update',$sizeChart->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="form-group">
          <label for="image" class="col-form-label">Upload Chart <span class="text-danger">*</span></label>
          <input id="image" type="file" name="image"  value="" class="form-control">
            @error('image')
              <span class="text-danger">{{$message}}</span>
            @enderror
        </div>  

        <div class="form-group">
          <a target="_blank" href="{{ asset($sizeChart->image) }}">
            <img src="{{ asset($sizeChart->image) }}" class="img-fluid" style="max-width:200px" alt="{{$sizeChart->image}}">
          </a>
        </div> 

        <div class="form-group">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
              <option value="1" {{$sizeChart->status == 1 ?? 'selected'}}>Active</option>
              <option value="0" {{$sizeChart->status == 0 ?? 'selected'}}>Inactive</option>
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
