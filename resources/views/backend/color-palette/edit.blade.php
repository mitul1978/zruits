@extends('backend.layouts.master')
@section('title','ROYALE TOUCHE || Color Palette Edit')
@section('main-content')

<div class="card">
    <h5 class="card-header">Edit Color Palette</h5>
    <div class="card-body">
      <form method="post" action="{{route('color-palette.update',$color_palette->id)}}">
        @csrf
        @method('PATCH')
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Name <span class="text-danger">*</span></label>
        <input id="inputTitle" type="text" name="name" placeholder="Enter name"  value="{{$color_palette->name}}" class="form-control">
        @error('name')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="form-group">
            <label for="color_palette_design_id" class="col-form-label">Color palette design <span class="text-danger">*</span></label>
            <select name="color_palette_design_id" class="form-control">
                <option value="">Select color palette design</option>
                @foreach ($color_palette_designs as $key => $design)
                 <option  {{(($color_palette->color_palette_design_id== $key) ? 'selected' : '')}} value="{{$key}}">{{$design}}</option>
                @endforeach
            </select>
            @error('color_palette_design_id')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>


          @if($color_palette->pivot_color_palette_product->toArray())

          <div class="form-group">
            {{-- <label for="color_palette_design_id" class="col-form-label">Link with Product <span class="text-danger">*</span></label> --}}

            @foreach ( $color_palette->pivot_color_palette_product->toArray() as $product_array_key => $pivot_color_palette_product )


            <div class="remove_div-{{'remove-'. $product_array_key}}">
            <select name="products[]" class="form-control col-3 products selectSearchClass">
                <option value="">Select Product</option>
                @foreach ($products as $key => $product)
                 <option {{$pivot_color_palette_product['product_id']==$key ? 'selected' :''}} value="{{$key}}">{{$product}}</option>
                @endforeach
            </select>

            <input type="number" min="0" name="sort_order[]" placeholder="Sort Number" value="{{$pivot_color_palette_product['sort_order']}}">

            <select name="product_status[]" class="">
                <option {{$pivot_color_palette_product['status']==1 ? 'selected' :''}}  value="1" >Active</option>
                <option {{$pivot_color_palette_product['status']==0 ? 'selected' :''}}  value="0" >Inactive</option>
              </select>
              <button class="btn btn-danger btn-xs remove_btn" id="{{'remove-'. $product_array_key}}" type="button">remove</button>

              <br>
              <br>
          </div>

              @endforeach
            </div>

          @else


          <div class="form-group  " id="main">
            {{-- <label for="color_palette_design_id" class="col-form-label">Link with Product <span class="text-danger">*</span></label> --}}


            <select name="products[]" class="form-control col-3 products selectSearchClass">
                <option value="">Select Product</option>
                @foreach ($products as $key => $product)
                 <option value="{{$key}}">{{$product}}</option>
                @endforeach
            </select>

            <input type="number" min="0" name="sort_order[]" placeholder="Sort Number">

            <select name="product_status[]" class="">
                <option value="1" >Active</option>
                <option value="0" >Inactive</option>
              </select>

              <br>

          </div>

          @endif
          <div class="form-group paste-div">

          </div>

          <div class="form-group mb-6">
            <button type="button" class="btn btn-primary add_more_product_btn" >+ Add More</button>
          </div>
        <div class="form-group">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
            <option value="1" {{(($color_palette->status=='active') ? 'selected' : '')}}>Active</option>
            <option value="0" {{(($color_palette->status=='inactive') ? 'selected' : '')}}>Inactive</option>
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
 var product_select =  '<select name="products[]" class="form-control col-3 products">';


product_select += '<option value="">Select Product</option>';
@foreach ($products as $key => $product)

var product = '<?php echo $product ?>';
var id = '<?php echo $key ?>';
 product_select+="<option value='"+id+"'>"+product+"</option>";
@endforeach

product_select += '</select>';


$(document).ready(function() {
    var i = 0;
    $('.add_more_product_btn').on('click',function(){
        i++;
        var div = '<div class="remove_div-'+i+'">';

        div +=product_select;

        div +='<input style="margin-left=9px" type="number" min="0" name="sort_order[]" placeholder="Sort Number">';


        div +='<select name="product_status[]" class="">'+
            '<option value="1" >Active</option>'+
            '<option value="0" >Inactive</option>'+
          '</select>';
          div +='<button class="btn btn-danger btn-xs remove_btn" id="'+i+'" type="button">remove</button><br></div>';

        $('.paste-div').append(div)
        // console.log(div)

        $('.products').select2();
    })

    $('body').on('click','.remove_btn',function(){

       var id =  $(this).attr('id');
       $('.remove_div-'+id).remove();

    })
});

</script>
@endpush
