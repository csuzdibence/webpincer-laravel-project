@extends('layouts.base')

@section('title')
<title>WebPincér - Restaurant details</title>    
@endsection

@section('content')
    <div class="card">
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
@endsection