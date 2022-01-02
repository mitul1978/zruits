@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Edit Setting</h5>
    <div class="card-body">
    <form method="post" action="{{route('settings.update')}}">
        @csrf
        {{-- @method('PATCH') --}}
        {{-- {{dd($data)}} --}}
        @foreach ($settings as $data)

        <div class="form-group">
          <label for="{{$data->name}}" class="col-form-label">{{str_replace('_', ' ', strtoupper($data->name))}} <span class="text-danger">*</span></label>
          
          @if($data->type=='string')
            <input type="{{$data->name}}" class="form-control" name="{{$data->name}}" required value="{{$data->value}}">
          @elseif($data->type=='file')         
            <input id="{{$data->name}}" class="form-control" type="file" name="{{$data->name}}" value="{{$data->value}}">
          @elseif($data->type=='number')         
            <input id="{{$data->name}}" min="0" class="form-control" type="number" name="{{$data->name}}" value="{{$data->value}}">
          @else
            <textarea class="form-control" id="{{$data->name}}" name="{{$data->name}}">{{$data->value}}</textarea>
          @endif

          @error($data->name)
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        @endforeach

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
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>

<script>
    $(document).ready(function() {
    $('#summary').summernote({
      placeholder: "Write short description.....",
        tabsize: 2,
        height: 150
    });
    });

    $(document).ready(function() {
      $('textarea').summernote({
        placeholder: "Write short Quote.....",
          tabsize: 2,
          height: 100
      });
    });


</script>
@endpush
