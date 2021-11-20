@extends('layouts.base')

@section('title')
<title>WebPincér</title>    
@endsection

@section('content')
<div class="d-flex justify-content-center">
  <h1>WebPincér</h1> 
</div>
    <div class="container mt-3 d-flex justify-content-between">
      @auth
      <a href="{{route('restaurant.create')}}" class="btn btn-light btn-outline-dark"> {{ __('Create a new restaurant')}}</a>
      <a href="{{route('food.create')}}" class="btn btn-light btn-outline-dark"> {{ __('Create a new food')}}</a>
      @endauth
    </div>
    <div class="mt-3 mb-5" style="display:grid;grid-template-columns:auto auto auto;">
    @foreach ($restaurants as $restaurant)
      <div class="card mx-2 mb-2 border-dark" >
        <div class="card-header d-flex justify-content-start align-items-center">
          <a class="btn btn-lg btn-link text-danger" href="/restaurant/{{$restaurant->id}}">{{$restaurant->name}}</a>
          <i class="fas fa-utensils h3"></i>
        </div>
        <div class="card-body d-flex justify-content-center flex-wrap justify-content-md-between">
          <div>
            <img class="flex-shrink-0 flex-grow-0 image-cover" src="{{ $restaurant->cover_image }}" width="100" height="100" alt="{{ $restaurant->name }}">
          </div>
          <div class="d-flex align-items-center flex-column justify-content-center" >
            <p>{{__('Owner\'s name:')}} {{$restaurant->ownerName}}</p>
            <p>{{__('Member since: ')}} {{$restaurant->created_at->diffForHumans()}}</p> 
          </div>        
        </div>
      </div>
    @endforeach
  </div>
  <div> {{$restaurants->links()}}</div>
   
@endsection