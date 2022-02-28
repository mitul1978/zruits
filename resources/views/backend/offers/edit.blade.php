@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Edit Offer</h5>
    <div class="card-body">
      <form method="post" action="{{route('offer.update',$offer->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
          <label for="name" class="col-form-label">Name <span class="text-danger">*</span></label>
          <input id="name" type="text" name="name" placeholder="Enter title"  value="{{$offer->name}}" class="form-control" required>
          @error('name')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="offer_type">Offer Type</label>
          <select name="offer_type" ID="offer_type" class="form-control" required>
              <option value="">--Select Type--</option>
              <option value='1' {{(($offer->offer_type==1) ? 'selected' : '')}}>Fixed</option>
              <option value='2' {{(($offer->offer_type==2) ? 'selected' : '')}}>Percent</option>
          </select>
        </div>

        <div class="form-group">
          <label for="offer_value" class="col-form-label">Offer Value <span class="text-danger">*</span></label>
          <input id="offer_value" type="text" name="offer_value" placeholder="Enter Value"  value="{{$offer->offer_value}}" class="form-control" required>
          @error('offer_value')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
              <option value="1" {{(($offer->status=='1')? 'selected' : '')}}>Active</option>
              <option value="0" {{(($offer->status=='0')? 'selected' : '')}}>Inactive</option>
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
    $('#summary').summernote({
      placeholder: "Write short description.....",
        tabsize: 2,
        height: 150
    });
    });
</script>
@endpush
