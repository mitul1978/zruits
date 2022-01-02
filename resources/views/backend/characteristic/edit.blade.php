@extends('backend.layouts.master')
@section('title','ROYALE TOUCHE || Characteristic Edit')
@section('main-content')

<div class="card">
    <h5 class="card-header">Edit Characteristic</h5>
    <div class="card-body">
      <form method="post" action="{{route('characteristic.update',$characteristic->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="inputTitle" class="col-form-label">Name <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="name" placeholder="Enter Name"  value="{{$characteristic->name}}" class="form-control">
          @error('name')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>

          <div class="form-group">
              <label for="inputTitle" class="col-form-label">Content <span class="text-danger">*</span></label>
            <input id="inputTitle" type="text" name="content" placeholder="Enter Content"  value="{{$characteristic->content}}" class="form-control">
            @error('content')
            <span class="text-danger">{{$message}}</span>
            @enderror
            </div>




          <div class="form-group">
            <label for="inputPhoto" class="col-form-label">Icon</label>
            <div class="input-group">

          @if($characteristic->icon)
          <a target="_blank" href="{{ asset($characteristic->icon) }}">
              <img src="{{ asset($characteristic->icon) }}" class="img-fluid" style="max-width:100px" alt="{{$characteristic->icon}}">
          </a>
          @else
              <img src="{{asset('backend/img/thumbnail-default.jpg')}}" class="img-fluid" style="max-width:80px" alt="avatar.png">
          @endif
            <input id="thumbnail" class="form-control" type="file" name="icon" value="{{old('icon')}}">
          </div>
        </div>

          <div class="form-group">
            <label for="inputTitle" class="col-form-label">Sort Number <span class="text-danger">*</span></label>
          <input id="inputTitle" type="number" name="sort_order" placeholder="Enter Number"  value="{{$characteristic->sort_order}}" class="form-control">
          @error('sort_order')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>
        <div class="form-group">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
            <option value="1" {{(($characteristic->status=='active') ? 'selected' : '')}}>Active</option>
            <option value="0" {{(($characteristic->status=='inactive') ? 'selected' : '')}}>Inactive</option>
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
