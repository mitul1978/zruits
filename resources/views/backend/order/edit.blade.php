@extends('backend.layouts.master')

@section('title','Order Detail')

@section('main-content')
<div class="card">
  <h5 class="card-header">Order Edit</h5>
  <div class="card-body">
    <form action="{{route('order.update',$order->id)}}" method="POST">
      @csrf
      @method('PATCH')


      @php
      $orderstatus = App\Models\OrderStatus::all();
  
      @endphp

      <div class="form-group">
        <label for="status">Status :</label>
        <select name="status"  class="form-control">
          
          @foreach ($orderstatus as $status )
          <option value="{{$status->order_status_id}}" {{(($order->status==$status->order_status_id)? 'selected' : '')}}>{{$status->name}} ({{$status->description}})</option>
            
          @endforeach

        </select>
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
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