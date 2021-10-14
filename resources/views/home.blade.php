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
    @foreach ($restaurants as $restaurant)
      <div class="card mt-3 mb-3">
        <div class="card-header">
          <a class="btn btn-lg btn-link text-danger" href="/restaurant/{{$restaurant->id}}">{{$restaurant->name}}</a>
        </div>
        <div class="card-body">
            <p>{{__('Owner\'s name:')}} {{$restaurant->ownerName}}</p>
            <p>{{__('Member since: ')}} {{$restaurant->created_at->diffForHumans()}}</p>         
        </div>
      </div>
    @endforeach
    
@endsection