@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Add Product</h5>
    <div class="card-body">
      <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
        {{csrf_field()}} 
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
                <label for="category_id" class="col-form-label">Select Category <span class="text-danger">*</span></label>
                  <select class="form-control" name="category_id" id="">
                      <option value="">Select Category</option>
                      @foreach ($categories as $category_id => $category)
                        <option value="{{$category_id}}">{{$category}}</option>
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
                <input id="name" type="text" name="name" placeholder="Enter Name"  value="{{old('name')}}" class="form-control">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label for="design" class="col-form-label">Design Name <span class="text-danger">*</span></label>
              <input id="design" type="text" name="design" placeholder="Enter Design"  value="{{old('design')}}" class="form-control">
              @error('design')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label for="hsn" class="col-form-label">HSN <span class="text-danger">*</span></label>
              <input id="hsn" type="text" name="hsn" placeholder="Enter HSN"  value="{{old('hsn')}}" class="form-control">
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
                          <option value='{{$attribute->id}}'>{{$attribute->name}}</option>
                      @endforeach
                </select>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
                <label for="fabric">Orientation </label>
                <select name="orientation[]" id="orientation" class="form-control multiple selectpicker" multiple>
                      <option value ="">Select Orientation</option>
                      @foreach($orientations as $key=>$attribute)
                          <option value='{{$attribute->id}}'>{{$attribute->name}}</option>
                      @endforeach
                </select>
            </div>
          </div>

        </div>

        <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                  <label for="price" class="col-form-label">Price(INR) <span class="text-danger">*</span></label>
                  <input id="price" type="number" name="price" min="0" placeholder="Enter price" value="{{old('price')}}" class="form-control">
                  @error('price')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
            </div>  

            <div class="col-md-3">
              <div class="form-group">
                  <label for="discount" class="col-form-label">Discount(%) <span class="text-danger">*</span></label>
                  <input id="discount" type="number" name="discount" min="0" placeholder="Enter discount" value="{{old('discount')}}" class="form-control">
                    @error('discount')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>  

            <div class="col-md-3">
              <div class="form-group">
                  <label for="min_qty">Minimum Order Quantity <span class="text-danger">*</span></label>
                  <input id="min_qty" type="number" name="min_qty" min="0" placeholder="Enter Minimum Order Quantity"  value="{{ old('min_qty') }}" class="form-control">
                  @error('min_qty')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
              </div>
            </div> 

              <div class="col-md-3">
                <div class="form-group">
                    <label for="tag">Tag <span class="text-danger">*</span></label>
                    <input id="tag" type="text" name="tag" placeholder="Enter tag"  value="{{ old('tag')  }}" class="form-control">
                    @error('tag')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
              </div>       
        </div>

        

        <div class="form-group">
          <label for="description" class="col-form-label">Description</label>
          <textarea class="form-control" id="description" name="description">{{old('description')}}</textarea>
          @error('description')
            <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="additional_information" class="col-form-label">Additional Information</label>
          <textarea class="form-control" id="additional_information" name="additional_information">{{old('additional_information')}}</textarea>
          @error('additional_information')
            <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

           


            <div class="row">
                <div class="col-md-4">
                      <div class="form-group">
                          <label for="meta_title" class="col-form-label">Meta Title </label>
                          <input id="meta_title" type="text" name="meta_title" placeholder="Enter Meta Title"  value="{{old('meta_title')}}" class="form-control">
                          @error('meta_title')
                          <span class="text-danger">{{$message}}</span>
                          @enderror
                      </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="meta_keyword" class="col-form-label">Meta Keyword </label>
                        <input id="meta_keyword" type="text" name="meta_keyword" placeholder="Enter Meta Keyword"  value="{{old('meta_keyword')}}" class="form-control">
                        @error('meta_description')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>

              <div class="form-group">
                    <label for="meta_description" class="col-form-label">Meta Description</label>
                    <textarea class="form-control" id="meta_description" name="meta_description">{{old('meta_description')}}</textarea>
                    @error('meta_description')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
              </div>
              
             <div class="row">                
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="related_products">Related Products </label>
                    <select name="related_products[]" id="related_products" class="form-control selectpicker "  data-live-search="true" data-actions-box="true" title="Choose in the following products..." multiple>
                        @foreach($related_products as $key=>$product)
                            <option value='{{$product->id}}'>{{$product->name}}</option>
                        @endforeach
                    </select>
                  </div>
                </div>                
              </div>  

              <h5 class="mt-2">Upload Image Color Wise</h5>
              <div class="parentColorDiv">
                  <div id="multipleColorImage">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                              <label for="colorsImages">Colors </label>
                              <select name="colorsImages[]" id="colorsImages" class="form-control" required>
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
                <button class="btn btn-primary" id="addNewProductImages" type="button">Add New Images</button>
             </div>
             <br> 
            <div class="parentDiv">
                <div id="multiple">
                  <div class="row" >
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
                          <input id="stock_quantities[]" type="number" name="stock_quantities[]" min="0" placeholder="Enter Stock quantity"  value="{{ old('stock_quantities') }}" class="form-control" required>
                          @error('stock_quantities')
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                      </div>
                    </div>      
                  </div>     
              </div>
            </div>  

            {{-- <div id="multipleClone" class="row multipleClone"> 
            </div> --}}
            
            <div class="form-group mb-3">
               <button class="btn btn-primary" id="addNewProduct" type="button">Add New</button>
            </div>
            <br>

            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <input type="checkbox" id="is_featured" name="is_featured" value="1">
                  <label for="vehicle1">Is Featured ?</label>
                </div> 
              </div>  
              <div class="col-md-3">
                <div class="form-group">
                  <input type="checkbox" id="is_new" name="is_new"  value="1">
                  <label for="vehicle2">Is New ?</label>
                </div>
              </div>   
              <div class="col-md-3">
                <div class="form-group">
                  <input type="checkbox" id="is_bestsellers" name="is_bestsellers" value="1">
                  <label for="vehicle3">Is Bestsellers ?</label>
                </div>  
              </div> 
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="offer" class="col-form-label">Offer</label>
                <select name="offer" class="form-control">
                    <option value=""> Select Offer if any </option>
                    <option value="1">Buy 3 flat at 6500</option>
                    <option value="2">Buy 1 get 2nd at 20%</option>
                    <option value="3">All</option>
                </select>
                @error('offer')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
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
        //$('.multipleClone').append($('.multiple').html());

        // var size = $('select[id^="size"]:last');

        // // Read the Number from that DIV's ID (i.e: 3 from "klon3")
        // // And increment that number by 1
        // var num = parseInt( size.prop("id").match(/\d+/g), 10 ) +1;

        // // Clone it and assign the new ID (i.e: from num 4 to ID "klon4")
        // var $klon = $div.clone().prop('id', 'klon'+num );

        // // Finally insert $klon wherever you want
        // $div.after( $klon.text('klon'+num) );       
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

    $(document).ready(function() 
    {
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
    $('select').selectpicker();

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
