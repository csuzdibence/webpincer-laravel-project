@extends('layouts.base')

@section('title')
<title>WebPincér - Restaurant details</title>    
@endsection

@section('content')
    <div class="card mb-3"">
        <div class="card-body">
            <h1>{{$restaurant->name}}</h1>
            <p>{{__('Owner\'s name:')}} {{$restaurant->ownerName}}</p>
            <p>{{__('Member since: ')}} {{$restaurant->created_at->diffForHumans()}}</p>
            @foreach ($foods as $food)
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-danger">{{$food->name}}</h5>
                        <h5>{{__('Price: ')}}{{$food->price}} Ft</h5>
                        <p>{{$food->description}}</p>
                    </div>
                </div>
            @endforeach
            </div>
    </div>
<div class="row">
    <div class="col-md-8 col-lg-6 mx-auto" >
        @foreach ($restaurant->comments as $comment)
        <div class="card mb-3">
            <div class="card-body">
                <div class="mb-2">
                       <p > <span class="text-danger">{{ $comment->user->name }} </span> |
                        {{ $comment->created_at->diffForHumans() }} </p>
                </div>
                {{ $comment->message }}
            </div>
        </div>
        @endforeach
        @auth
        <form method="POST" action="{{route('restaurants.comment', $restaurant)}}">
                @csrf
                <div class="mb-3">
                    <textarea name="comment" class="form-control" placeholder="{{__('Comment text...')}}"></textarea>
                </div>
                <div class="d-grid">
                    <button class="btn btn-primary btn-lg" type="submit">
                        {{ __('Comment')}}
                    </button>
                </div>
            </form>
        @endauth
        
    </div>
</div>
@endsection