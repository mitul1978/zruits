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

            {{-- <div class="col-md-4">
              <div class="form-group">
                  <label for="product_texture" class="col-form-label">Product Texture <span class="text-danger">*</span></label>
                  <input id="product_texture" type="text" name="product_texture" placeholder="Enter Product Texture"  value="{{old('product_texture')}}" class="form-control">
                  @error('title')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
              </div>
           </div> --}}

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

        </div>

        <div class="row">
            <div class="col-md-3">
                  <div class="form-group">
                    <label for="is_featured">Is Featured</label><br>
                    <input type="checkbox" name='is_featured' id='is_featured' value='1' > Yes
                    @error('is_featured')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="is_new">Is New</label><br>
                <input type="checkbox" name='is_new' id='is_new' value='1' > Yes
                @error('is_new')
                  <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="is_bestsellers">Is Bestseller</label><br>
                <input type="checkbox" name='is_bestsellers' id='is_bestsellers' value='1' > Yes
                @error('is_bestsellers')
                  <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                  <label for="price" class="col-form-label">Price(INR) <span class="text-danger">*</span></label>
                  <input id="price" type="number" name="price" placeholder="Enter price" value="{{old('price')}}" class="form-control">
                  @error('price')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
            </div>  

            <div class="col-md-3">
              <div class="form-group">
                  <label for="discount" class="col-form-label">Discount(%) <span class="text-danger">*</span></label>
                  <input id="discount" type="number" name="discount" placeholder="Enter discount" value="{{old('discount')}}" class="form-control">
                    @error('discount')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>  

            <div class="col-md-3">
              <div class="form-group">
                  <label for="stock_quantity">Stock Quantity </label>
                  <input id="stock_quantity" type="number" name="stock_quantity" min="0" placeholder="Enter Stock quantity"  value="{{ old('stock_quantity') }}" class="form-control">
                  @error('stock_quantity')
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

              {{-- {{ Applications}} --}}

        <div class="row">
            <div class="col-md-4">
                  <div class="form-group">
                      <label for="attributes">Attributes </label>
                      <select name="attributes[]" id="attributes" class="form-control selectpicker" multiple>
                          @foreach($attributes as $key=>$attribute)
                              <option value='{{$attribute->id}}'>{{$attribute->name}}</option>
                          @endforeach
                      </select>
                  </div>
            </div>

                  {{-- <div class="col-md-3">
                      <div class="form-group">
                        <label for="applications">Applications </label>
                        <select name="applications[]" id="applications" class="form-control selectpicker" multiple>
                            @foreach($applications as $key=>$application)
                                <option value='{{$application->id}}'>{{$application->name}}</option>
                            @endforeach
                        </select>
                      </div>
                  </div> --}}

                  {{-- {{Features}} --}}
                  {{-- <div class="col-md-3">
                      <div class="form-group">
                        <label for="characteristics">Characteristics </label>
                        <select name="characteristics[]" id="characteristics" class="form-control selectpicker" multiple>
                            @foreach($characteristics as $key=>$characteristic)
                                <option value='{{$characteristic->id}}'>{{$characteristic->name}}</option>
                            @endforeach
                        </select>
                      </div>
                  </div> --}}

                  {{-- {{ Features}} --}}

            <div class="col-md-4">
                <div class="form-group">
                    <label for="features">Features </label>
                    <select name="features[]" id="features" class="form-control selectpicker" multiple>
                        @foreach($features as $key=>$feature)
                            <option value='{{$feature->id}}'>{{$feature->name}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="related_products">Related Products </label>
                <select name="related_products[]" id="related_products" class="form-control selectpicker "  data-live-search="true" data-actions-box="true" title="Choose in the following products..." multiple>
                    @foreach($related_products as $key=>$product)
                        <option value='{{$product->id}}'>{{$product->name}}</option>
                    @endforeach
                </select>
              </div>
            </div>

                    {{-- {{ Products}} --}}
                    {{-- <div class="row"> --}}
                        {{-- <div class="col-md-3">
                            <div class="form-group">
                              <label for="laminates"> Laminates </label>
                              <select name="laminates[]" id="related_products" class="form-control selectpicker" multiple>
                                  @foreach($laminates as $key=>$laminate)
                                      <option value='{{$laminate->id}}'>{{$laminate->name}}</option>
                                  @endforeach
                              </select>
                            </div>
                        </div> --}}

                        {{-- {{Textures}} --}}
                          {{-- <div class="col-md-3">
                              <div class="form-group">
                                <label for="textures"> Textures </label>
                                <select name="textures[]" id="textures" class="form-control selectpicker" multiple>
                                    @foreach($textures as $key=>$product)
                                        <option value='{{$product->id}}'>{{$product->name}}</option>
                                    @endforeach
                                </select>
                              </div>
                          </div> --}}

                              {{-- {{ Thicknesses}} --}}
                              {{-- <div class="col-md-3">
                                  <div class="form-group">
                                    <label for="thicknesses"> Thicknesses </label>
                                    <select name="thicknesses[]" id="thicknesses" class="form-control selectpicker" multiple>
                                        @foreach($thicknesses as $key=>$thickness)
                                            <option value='{{$thickness->id}}'>{{$thickness->name}}</option>
                                        @endforeach
                                    </select>
                                  </div>
                              </div> --}}

                              {{-- {{Related Products}} --}}
                            {{-- <div class="col-md-3">
                              <div class="form-group">
                                <label for="related_products">Related Products </label>
                                <select name="related_products[]" id="related_products" class="form-control selectpicker "  data-live-search="true" data-actions-box="true" title="Choose in the following products..." multiple>
                                    @foreach($related_products as $key=>$product)
                                        <option value='{{$product->id}}'>{{$product->name}}</option>
                                    @endforeach
                                </select>
                              </div>
                            </div> --}}
                    {{-- </div> --}}

            <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="image1" class="col-form-label">Image 1 <span class="text-danger">*</span></label>
                      <div class="input-group">
                      <input  class="form-control" type="file" name="image1" value="{{old('image1')}}">
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="image2" class="col-form-label">Image 2</label>
                        <div class="input-group">
                          <input class="form-control" type="file" name="image2" value="{{old('image2')}}">
                      </div>
                    </div>
                </div>

                <div class="col-md-4">
                      <div class="form-group">
                        <label for="image3" class="col-form-label">Image 3 </label>
                        <div class="input-group">
                          <input class="form-control" type="file" name="image3" value="{{old('image3')}}">
                        </div>
                    </div>
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

                {{-- <div class="col-md-4">
                  <div class="form-group">
                    <label for="meta_image" class="col-form-label">Meta Image</label>
                    <div class="input-group">
                      <input class="form-control" type="file" name="meta_image" value="{{old('meta_image')}}">
                    </div>
                  </div>
                </div> --}}
        </div>

        <div class="form-group">
              <label for="meta_description" class="col-form-label">Meta Description</label>
              <textarea class="form-control" id="meta_description" name="meta_description">{{old('meta_description')}}</textarea>
              @error('meta_description')
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

    $(document).ready(function() {
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
    });
    // $('select').selectpicker();

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
