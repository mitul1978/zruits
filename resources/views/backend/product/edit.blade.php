@extends('backend.layouts.master')

@section('main-content')
@if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif
<div class="card">
    <h5 class="card-header">Edit Product</h5>
    <div class="card-body">
      <form method="post" action="{{route('product.update',$product->id)}}" enctype="multipart/form-data">
        {{csrf_field()}}
        @method('PATCH')
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
                <label for="category_id" class="col-form-label">Select Category <span class="text-danger">*</span></label>
                <select class="form-control" name="category_id" id="">
                  <option value="">Select Category</option>
                  @foreach ($categories as $category_id => $category)
                    <option  {{(($product->category_id==$category_id) ? 'selected' : '')}}  value="{{$category_id}}">{{$category}}</option>
                  @endforeach
                </select>
                @error('category_id')
                 <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
          </div>
            
          <div class="col-md-4">
              <div class="form-group">
                  <label for="name" class="col-form-label">Name <span class="text-danger">*</span></label>
                  <input id="name" type="text" name="name" placeholder="Enter Name"   value="{{old('name') ? old('name') : $product->name}}" class="form-control">
                  @error('name')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
              </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label for="design" class="col-form-label">Design Number <span class="text-danger">*</span></label>
              <input id="design" type="text" name="design" placeholder="Enter Design Number"  value="{{old('design') ? old('design') : $product->design}}" class="form-control">
              @error('design')
                <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label for="hsn" class="col-form-label">HSN <span class="text-danger">*</span></label>
              <input id="hsn" type="text" name="hsn" placeholder="Enter HSN"  value="{{old('hsn')  ? old('hsn') : $product->hsn}}" class="form-control">
              @error('hsn')
               <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
                <label for="fabric">Fabric </label>
                <select name="fabric" id="fabric" class="form-control selectpicker">
                      <option value ="">Select Fabric</option>
                      @foreach($fabrics as $key=>$attribute)
                          <option {{(($product->fabric==$attribute->id) ? 'selected' : '')}}  value='{{$attribute->id}}'>{{$attribute->name}}</option>
                      @endforeach
                </select>
            </div>
          </div>

          <?php
             $orientationss = unserialize($product->orientation);            
          ?>

          <div class="col-md-4">
              <div class="form-group">
                  <label for="fabric">Orientation </label>
                  <select name="orientation[]" id="orientation" class="form-control multiple selectpicker" multiple>
                        <option value ="">Select Orientation</option>
                        @foreach($orientations as $key=>$attribute)                           
                              <option  {{is_array( $orientationss) && in_array($attribute->id,  $orientationss) ? 'selected' : '' }} value='{{$attribute->id}}'>{{$attribute->name}}</option>                          
                        @endforeach
                  </select>
              </div>
           </div>
        </div>

        <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                  <label for="price" class="col-form-label">Price(INR) <span class="text-danger">*</span></label>
                  <input id="price" type="number" name="price" min="0" placeholder="Enter price" value="{{old('price') ? old('price') : $product->price}}" class="form-control">
                  @error('price')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
            </div>  

            <div class="col-md-3">
              <div class="form-group">
                  <label for="discount" class="col-form-label">Discount(%) <span class="text-danger">*</span></label>
                  <input id="discount" type="number" name="discount" min="0" placeholder="Enter discount" value="{{old('discount') ? old('discount') : @$product->discount}}" class="form-control">
                    @error('discount')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>  

            <div class="col-md-3">
              <div class="form-group">
                  <label for="min_qty">Minimum Order Quantity <span class="text-danger">*</span></label>
                  <input id="min_qty" type="number" name="min_qty" min="0" placeholder="Enter Minimum Order Quantity"  value="{{ old('min_qty') ? old('min_qty') : @$product->min_qty}}" class="form-control">
                  @error('min_qty')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                  <label for="tag">Tag <span class="text-danger">*</span></label>
                  <input id="tag" type="text" name="tag" placeholder="Enter tag"  value="{{ old('tag') ? old('tag') : @$product->tag}}" class="form-control">
                  @error('tag')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
              </div>
            </div>

        </div>

        <div class="form-group">
          <label for="description" class="col-form-label">Description</label>
          <textarea class="form-control" id="description" name="description">{{old('description') ? old('description') : $product->description}}</textarea>
          @error('description')
            <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="additional_information" class="col-form-label">Additional Information</label>
          <textarea class="form-control" id="additional_information" name="additional_information">{{old('additional_information') ? old('additional_information') : $product->additional_information}}</textarea>
          @error('additional_information')
            <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="row">
          <div class="col-md-4">
                <div class="form-group">
                    <label for="meta_title" class="col-form-label">Meta Title </label>
                    <input id="meta_title" type="text" name="meta_title" placeholder="Enter Meta Title"  value="{{old('meta_title')  ? old('meta_title') : $product->meta_title}}" class="form-control">
                    @error('meta_title')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                  <label for="meta_keyword" class="col-form-label">Meta Keyword </label>
                  <input id="meta_keyword" type="text" name="meta_keyword" placeholder="Enter Meta Keyword"  value="{{old('meta_keyword')  ? old('meta_keyword') : $product->meta_keyword}}" class="form-control">
                  @error('meta_description')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
              </div>
          </div>
        </div>

        <div class="form-group">
          <label for="meta_description" class="col-form-label">Meta Description</label>
          <textarea class="form-control" id="meta_description" name="meta_description">{{old('meta_description') ? old('meta_description') : $product->meta_description}}</textarea>
          @error('meta_description')
            <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="row">
                  
          <?php
             $relatedProductss = unserialize($product->related_products);            
          ?>

          <div class="col-md-6">
            <div class="form-group">
              <label for="related_products">Related Products </label>
              <select name="related_products[]" id="related_products" class="form-control selectpicker "  data-live-search="true" data-actions-box="true" title="Choose in the following products..." multiple>
                  @foreach($related_products as $key=>$prod)
                        <option {{is_array( $relatedProductss) && in_array($prod->id,  $relatedProductss) ? 'selected' : '' }}  value='{{$prod->id}}'>{{$prod->name}}</option>
                  @endforeach
              </select>
            </div>
          </div>                
        </div>  

        <h5 class="mt-2">Upload Image Color Wise (Optional If already Images are uploaded)</h5>

        <div class="parentColorDiv">
          <div id="multipleColorImage">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                      <label for="colorsImages">Colors </label>
                      <select name="colorsImages[]" id="colorsImages" class="form-control">
                            <option value ="">Select Color</option>
                          @foreach($colors as $key=>$attribute)
                              <option value='{{$attribute->id}}'>{{$attribute->name}}</option>
                          @endforeach
                      </select>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="images" class="col-form-label">Images </label>
                    <div class="input-group">
                      <input class="form-control imageUploader" type="file" id="images" name="images[0][]" value="{{old('images')}}" multiple>
                    </div>
                  </div>
                </div> 
              </div>
          </div>
        </div> 

        
        <div class="form-group mb-3">
          <button class="btn btn-primary" id="addNewProductImages" type="button">Add New Color + Images</button>
        </div>
        <br> 

        
          @if(isset($product->images))  
             <?php
                $colId = 0; 
             ?>            
              @foreach($product->images as $key => $i) 
                  @if($key == 0)
                   <label>{{$i->productColor->name}} Images</label>
                   <div class="row">
                    <div class="d-flex">
                    <?php $colId = $i->color_id; ?>
                  @endif
                  @if($colId != $i->color_id)
                    </div>
                    </div>
                    <br>
                    <label>{{$i->productColor->name}} Images</label>
                    <div class="row">
                    <div class="d-flex">
                    <?php $colId = $i->color_id; ?>
                  @endif
                      <div class="img-prev" style="display: grid; margin:0 10px 10px 0;" id="imageDiv{{$i->id}}">
                        <img src="{{asset($i->image)}}" style="max-width:70px; margin-bottom:5px;">
                        <a class="btn btn-sm btn-danger p-1 " href="javascript:void(0);" onClick="deleteImageFunc({{$i->id}});">Delete</a>                      
                      </div>       
              @endforeach
            </div>
          </div>
          <br>
            <hr>
          @endif
       
        <h5 class="mt-5">Variation</h5>

        <div class="parentDiv">
          @if(count($product->sizesstock) > 0 )
            @foreach($product->sizesstock as $key => $stock)
                 <div id="multiple" class="multiple{{$stock->id}}">
                  <!-- <a class="btn btn-sm btn-danger p-1 " href="javascript:void(0);" onClick="deleteVariationFunc({{$stock->id}});">Delete</a> -->
                    <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                              <label for="colors">Size </label>
                              <select name="sizes[]" id="sizes" class="form-control" required>
                                    <option value ="">Select Size</option>
                                    @foreach($sizes as $key=>$attribute)
                                        <option {{(($stock->size_id==$attribute->id) ? 'selected' : '')}} value='{{$attribute->id}}'>{{$attribute->name}}</option>
                                    @endforeach
                              </select>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                              <label for="colors">Colors </label>
                              <select name="colors[]" id="colors" class="form-control" required>
                                    <option value ="">Select Color</option>
                                  @foreach($colors as $key=>$attribute)
                                      <option {{(($stock->color_id==$attribute->id) ? 'selected' : '')}} value='{{$attribute->id}}'>{{$attribute->name}}</option>
                                  @endforeach
                              </select>
                          </div>
                        </div>
                      
                        <div class="col-md-3">
                          <div class="form-group">
                              <label for="stock_quantities">Stock Quantity <span class="text-danger">*</span></label>
                              <input id="stock_quantities[]" type="number" name="stock_quantities[]" min="0" placeholder="Enter Stock quantity"  value="{{ @$stock->stock_qty}}" class="form-control" required>
                              @error('stock_quantities')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                          </div>
                        </div>

                        <div class="col-md-1">
                          <div class="form-group" style="display: grid;">
                              <label for="stock_quantities">Action</label>
                              <a class="btn btn-sm btn-danger p-1 " href="javascript:void(0);" onClick="deleteVariationFunc({{$stock->id}});">Delete</a>      
                          </div>
                        </div>
                     </div>     
                  </div>
            @endforeach 
          @else
              <div id="multiple">
                <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                          <label for="colors">Size </label>
                          <select name="sizes[]" id="sizes" class="form-control" required>
                                <option value ="">Select Size</option>
                                @foreach($sizes as $key=>$attribute)
                                    <option value='{{$attribute->id}}'>{{$attribute->name}}</option>
                                @endforeach
                          </select>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                          <label for="colors">Colors </label>
                          <select name="colors[]" id="colors" class="form-control" required>
                                <option value ="">Select Color</option>
                              @foreach($colors as $key=>$attribute)
                                  <option value='{{$attribute->id}}'>{{$attribute->name}}</option>
                              @endforeach
                          </select>
                      </div>
                    </div>
                  
                    <div class="col-md-4">
                      <div class="form-group">
                          <label for="stock_quantities">Stock Quantity <span class="text-danger">*</span></label>
                          <input id="stock_quantities[]" type="number" name="stock_quantities[]" min="0" placeholder="Enter Stock quantity"  value="{{ old('stock_quantities')}}" class="form-control" required>
                          @error('stock_quantities')
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                      </div>
                    </div>      
                </div>     
              </div>
          @endif  
        </div> 

        <div class="form-group mb-3">
          <button class="btn btn-primary" id="addNewProduct" type="button">Add New</button>
        </div>
        <br>
        
        <div class="row">
          <div class="col-md-3">
            <div class="form-group">
              <input type="checkbox" id="is_featured" name="is_featured" value="1" {{$product->is_featured ? 'checked' : ''}}>
              <label for="vehicle1">Is Featured ?</label>
            </div> 
          </div>  
          <div class="col-md-3">
            <div class="form-group">
              <input type="checkbox" id="is_new" name="is_new"  value="1" {{$product->is_new ? 'checked' : ''}}>
              <label for="vehicle2">Is New ?</label>
            </div>
          </div>   
          <div class="col-md-3">
            <div class="form-group">
              <input type="checkbox" id="is_bestsellers" name="is_bestsellers" value="1" {{$product->is_bestsellers ? 'checked' : ''}}>
              <label for="vehicle3">Is Bestsellers ?</label>
            </div>  
          </div> 
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label for="offer" class="col-form-label">Offer</label>
            <select name="offer" class="form-control">
                <option value=""> Select No Offer </option>
                <option value="1" {{$product->offer == 1 ? 'selected' : ''}}>Buy 3 flat at 6500</option>
                <option value="2" {{$product->offer == 2 ? 'selected' : ''}}>Buy 1 get 2nd at 20%</option>
                <option value="3" {{$product->offer == 3 ? 'selected' : ''}}>All</option>
            </select>
            @error('offer')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
        </div>

        <div class="form-group">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
              <option value="1" {{$product->status == 1 ? 'selected' : ''}}>Active</option>
              <option value="0" {{$product->status == 0 ? 'selected' : ''}}>Inactive</option>
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
<link rel="stylesheet" href="{{asset('backend/css/bootstrap-select.css')}}" />
@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script src="{{asset('backend/js/bootstrap-select.min.js')}}"></script>

<script>
    $('#lfm').filemanager('image');

    $(document).ready(function() 
    {  
      var count = 1;
      $('#addNewProduct').on('click',function(e)
      {
        var copyContent = $("#multiple").clone();
        copyContent.find('.bootstrap-select').replaceWith(function() { return $('select', this); })    
        copyContent.find('.selectpicker').selectpicker('render'); 
        $('.parentDiv').append(copyContent);  
      });

      $('#addNewProductImages').on('click',function(e)
      {
        var copyContent = $("#multipleColorImage").clone();
        copyContent.find('.imageUploader').attr({ name: "images["+count+"][]"});
        copyContent.find('.bootstrap-select').replaceWith(function() { return $('select', this); })    
        copyContent.find('.selectpicker').selectpicker('render'); 
        $('.parentColorDiv').append(copyContent);   
        count++;   
      });

      $('#meta_description').summernote({
        placeholder: "Write meta description.....",
          tabsize: 2,
          height: 100
      });
    });

    $(document).ready(function() {

      $('#description').summernote({
        placeholder: "Write detail description.....",
          tabsize: 2,
          height: 150
      });

      $('#additional_information').summernote({
        placeholder: "Write detail information.....",
          tabsize: 2,
          height: 150
      });
    });
    // $('select').selectpicker();

</script>
<script type="text/javascript">
      function deleteImageFunc(id)
     {
        let text = "Are you sure ?";
        if (confirm(text) == true) 
        {
          $.ajax({
                  url:"/admin/product/deleteImage",
                  data:{
                    _token:"{{csrf_token()}}",
                    id:id
                  },
                  type:"POST",
                  success:function(response)
                  {
                      if(response == 1)
                      {
                        alert('Image Deleted from product');
                        $('#imageDiv'+id).remove();
                      }
                      else
                      {
                        alert('something went wrong !!!');
                      }
                  }
               });
        } 
      }

      function deleteVariationFunc(id)
       {
         let text = "Are you sure ?";
         if (confirm(text) == true) 
         {
            $.ajax({
                  url:"/admin/product/deleteVariation",
                  data:{
                    _token:"{{csrf_token()}}",
                    id:id
                  },
                  type:"POST",
                  success:function(response)
                  {
                      if(response == 1)
                      {
                        alert('Variation Deleted from product');
                        $('.multiple'+id).remove();
                      }
                      else
                      {
                        alert('something went wrong !!!');
                      }
                  }
               });
         }  
       }
</script>

<script>
  $('#cat_id').change(function(){
    var cat_id=$(this).val();
    // alert(cat_id);
    if(cat_id !=null){
      // Ajax call
      $.ajax({
        url:"/admin/category/"+cat_id+"/child",
        data:{
          _token:"{{csrf_token()}}",
          id:cat_id
        },
        type:"POST",
        success:function(response){
          if(typeof(response) !='object'){
            response=$.parseJSON(response)
          }
          // console.log(response);
          var html_option="<option value=''>----Select sub category----</option>"
          if(response.status){
            var data=response.data;
            // alert(data);
            if(response.data){
              $('#child_cat_div').removeClass('d-none');
              $.each(data,function(id,title){
                html_option +="<option value='"+id+"'>"+title+"</option>"
              });
            }
            else{
            }
          }
          else{
            $('#child_cat_div').addClass('d-none');
          }
          $('#child_cat_id').html(html_option);
        }
      });
    }
    else{
    }
  })
</script>
@endpush
