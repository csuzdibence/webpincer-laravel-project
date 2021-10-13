@extends('layouts.base')

@section('title')
<title>WebPincér</title>    
@endsection

@section('content')
<h1>WebPincér</h1> 
    <div class="container mt-3">
      @auth
      <a href="{{route('restaurant.create')}}" class="btn btn-light btn-outline-dark"> {{ __('Create a new restaurant')}}</a>
      @endauth
    </div> 
@endsection