@extends('layouts.app')
  @section('content')
      <link rel="stylesheet" href="{{asset('backend/css/sweetalert.min.css')}}" />
      @include('layouts.svg-icons')
      @livewire('cart')
  @endsection
@section('scripts')
@endsection
