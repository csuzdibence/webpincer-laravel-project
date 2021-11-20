@extends('layouts.base')

@section('title')
<title>WebPincér - Restaurant details</title>    
@endsection

@section('content')
    <div class="card mb-3 border-dark bg-light">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h1>{{$restaurant->name}}</h1>
                    <p>{{__('Owner\'s name:')}} {{$restaurant->ownerName}}</p>
                    <p>{{__('Member since: ')}} {{$restaurant->created_at->diffForHumans()}}</p>
                </div>
                <div class="border border-dark bg-light card d-flex flex-row justify-content-center align-items-center p-3 mb-3">
                    <a class="text-danger" href="/food/{{$restaurant->id}}/delete"><i class="fas fa-trash-alt h1"></i></a>
                    <a class="text-dark" href="/restaurant/{{$restaurant->id}}/edit"><i class="fas fa-cog h1"></i></a>
                </div>
            </div>
            @foreach ($foods as $food)
                <div class="card m-3 border border-danger">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <a href="/food/{{$food->id}}"><h5 class="text-danger">{{$food->name}}</h5></a>
                            <i class="fas fa-drumstick-bite h1"></i>
                        </div>                        
                        <h5>{{__('Price: ')}}{{$food->price}} Ft</h5>
                        <p>{{$food->description}}</p>
                    </div>
                </div>
            @endforeach
            </div>
    </div>
<div class="row">
    <div class="col-md-8 col-lg-6 mx-auto bg-light p-3" >
        @foreach ($restaurant->comments as $comment)
        <div class="card mb-3 border-dark">
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