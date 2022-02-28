@extends('backend.layouts.master')

@section('title','Order Detail')

@section('main-content')
<div class="card">
<h5 class="card-header">Stock Details       <a href="{{url('admin/product')}}" class=" btn btn-sm btn-primary shadow-sm float-right"><i class="fas fa-back fa-sm text-white-50"></i> Back</a>
  </h5>
  <div class="card-body">
    @if($product)
    <table class="table table-striped table-hover">
      <thead>
        <tr>
            <th>S.N.</th>
            <th>Size</th>
            <th>Color</th>
            <th>Stock</th>
        </tr>
      </thead>
      <tbody>
        @foreach($product->sizesstock as $key => $stock)
          <tr>
              <td>{{++$key}}</td>
              <td>{{$stock->productSize->name}}</td>
              <td>{{$stock->productColor->name}}</td>
              <td>{{$stock->stock_qty}}</td>          
          </tr>
        @endforeach
      </tbody>
    </table>

   
    @endif

  </div>
</div>
@endsection

@push('styles')
<style>
    .order-info,.shipping-info{
        background:#ECECEC;
        padding:20px;
    }
    .order-info h4,.shipping-info h4{
        text-decoration: underline;
    }

</style>
@endpush