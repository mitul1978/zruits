@extends('backend.layouts.master')
@section('title','ROYALE TOUCHE || Thickness Edit')
@section('main-content')

<div class="card">
    <h5 class="card-header">Edit Thickness</h5>
    <div class="card-body">
      <form method="post" action="{{route('thickness.update',$thickness->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="inputTitle" class="col-form-label">Thickness <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="thickness" placeholder="Enter Thickness"  value="{{$thickness->thickness}}" class="form-control">
          @error('thickness')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>

          <div class="form-group">
              <label for="inputTitle" class="col-form-label">Title <span class="text-danger">*</span></label>
            <input id="inputTitle" type="text" name="title" placeholder="Enter Title"  value="{{$thickness->title}}" class="form-control">
            @error('title')
            <span class="text-danger">{{$message}}</span>
            @enderror
            </div>

        <div class="form-group">
            <label for="inputTitle" class="col-form-label">Sort Number <span class="text-danger">*</span></label>
          <input id="inputTitle" type="number" name="sort_order" placeholder="Enter Number"  value="{{$thickness->sort_order}}" class="form-control">
          @error('sort_order')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>


          <div class="form-group">
            <label for="inputPhoto" class="col-form-label">Photo</label>
            <div class="input-group">
                @if($thickness->icon_tag)
                <a target="_blank" href="{{ asset($thickness->icon_tag) }}">
                    <img src="{{ asset($thickness->icon_tag) }}" class="img-fluid" style="max-width:100px" alt="{{$thickness->icon_tag}}">
                </a>
                @else
                    <img src="{{asset('backend/img/thumbnail-default.jpg')}}" class="img-fluid" style="max-width:80px" alt="avatar.png">
                @endif
                {{-- <span class="input-group-btn">
                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                    <i class="fa fa-picture-o"></i> Choose
                    </a>
                </span> --}}
            <input id="thumbnail" class="form-control" type="file" name="icon_tag" value="{{old('icon_tag')}}">
          </div>
        </div>

        <div class="form-group">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
            <option value="1" {{(($thickness->status=='active') ? 'selected' : '')}}>Active</option>
            <option value="0" {{(($thickness->status=='inactive') ? 'selected' : '')}}>Inactive</option>
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
