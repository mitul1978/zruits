@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Edit Color</h5>
    <div class="card-body">
      <form method="post" action="{{route('colors.update',$color->id)}}">
        @csrf
        @method('PATCH')

        <div class="form-group">
          <label for="name" class="col-form-label">Color Name <span class="text-danger">*</span></label>
          <input id="name" type="text" name="name" placeholder="Enter Color Name"  value="{{$color->name}}" class="form-control">
            @error('name')
              <span class="text-danger">{{$message}}</span>
            @enderror
        </div>  

        <div class="form-group">
          <label for="code" class="col-form-label">Color Code <span class="text-danger">*</span></label>
          <input id="code" type="text" name="code" placeholder="Enter Color Code"  value="{{$color->code}}" class="form-control">
            @error('code')
              <span class="text-danger">{{$message}}</span>
            @enderror
        </div>  

        <div class="form-group">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
              <option value="1" {{$color->status == 1 ?? 'selected'}}>Active</option>
              <option value="0" {{$color->status == 0 ?? 'selected'}}>Inactive</option>
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
