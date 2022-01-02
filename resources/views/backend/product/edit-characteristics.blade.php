@extends('backend.layouts.master')

@section('main-content')

<div class="card">

           <h5 class="card-header">Edit Characteristics of <b>{{$product->name}} <a href="{{route('product.edit',$product->id)}}" class="btn btn-primary btn-sm mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit product" data-placement="bottom"><i class="fas fa-edit"></i></a></b></h5>
    <div class="card-body">
      <form method="post" action="{{url('admin/product/update/characteristics/'.$product->id)}}" enctype="multipart/form-data">
        {{csrf_field()}}


        @foreach ($product->characteristics as $key =>  $characteristic)


        <div class="row">
            <div class="col-md-3">

                <div class="form-group">
                    @if($key==0)
                    <label for="name" class="col-form-label">Characteristics<span class="text-danger">*</span></label>
                    @endif
                    <input readonly value="{{$characteristic->name}}" class="form-control">
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-3">

                <div class="form-group">
                    @if($key==0)
                    <label for="characteristic_value" class="col-form-label">Value<span class="text-danger">*</span></label>
                    @endif
                    <input  type="text" name="characteristic_value[{{$characteristic->pivot->characteristic_id}}]" placeholder="Enter Name"   value="{{$characteristic->pivot->characteristic_value}}" class="form-control">

                </div>
            </div>
            <div class="col-md-3">

                <div class="form-group">
                    @if($key==0)
                    <label for="sort_order" class="col-form-label">Sort Order <span class="text-danger">*</span></label>
                    @endif
                    <input  type="text"name="sort_order[{{$characteristic->pivot->characteristic_id}}]" placeholder="Enter Sort Order" value="{{$characteristic->pivot->sort_order}}"   class="form-control">

                </div>
            </div>

        </div>
        @endforeach




        <div class="form-group mb-3">
           <button class="btn btn-success" type="submit">Update Characteristics</button>
        </div>
      </form>
    </div>
</div>

@endsection



