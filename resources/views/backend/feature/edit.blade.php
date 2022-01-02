@extends('backend.layouts.master')
@section('title','ROYALE TOUCHE || Feature Edit')
@section('main-content')

<div class="card">
    <h5 class="card-header">Edit Feature</h5>
    <div class="card-body">
      <form method="post" action="{{route('feature.update',$feature->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="inputTitle" class="col-form-label">Name <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="name" placeholder="Enter Name"  value="{{$feature->name}}" class="form-control">
          @error('feature')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>


        <div class="form-group">
            <label for="inputDesc" class="col-form-label">Content</label>
            <textarea class="form-control" id="description" name="content">{{$feature->content}}</textarea>
            @error('description')
            <span class="text-danger">{{$message}}</span>
            @enderror
            </div>

        <div class="form-group">
            <label for="inputTitle" class="col-form-label">Sort Number <span class="text-danger">*</span></label>
          <input id="inputTitle" type="number" name="sort_order" placeholder="Enter Number"  value="{{$feature->sort_order}}" class="form-control">
          @error('sort_order')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>

          <div class="form-group">
            <label for="inputPhoto" class="col-form-label">Photo</label>
            <div class="input-group">
                @if($feature->icon)
                <a target="_blank" href="{{ asset($feature->icon) }}">
                    <img src="{{ asset($feature->icon) }}" class="img-fluid" style="max-width:100px" alt="{{$feature->icon}}">
                </a>
                @else
                    <img src="{{asset('backend/img/thumbnail-default.jpg')}}" class="img-fluid" style="max-width:80px" alt="avatar.png">
                @endif
                {{-- <span class="input-group-btn">
                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                    <i class="fa fa-picture-o"></i> Choose
                    </a>
                </span> --}}
            <input id="thumbnail" class="form-control" type="file" name="icon" value="{{old('icon')}}">
          </div>
        </div>

        <div class="form-group">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
            <option value="1" {{(($feature->status=='active') ? 'selected' : '')}}>Active</option>
            <option value="0" {{(($feature->status=='inactive') ? 'selected' : '')}}>Inactive</option>
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
