@extends('layouts.base')

@section('title')
<title>WebPincér - Food details</title>    
@endsection

@section('content')
    <div class="card mb-3 p-3 border border-dark">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                <h1>{{$food->name}}</h1>
                <h2 class="font-weight-bold text-danger">{{__('Price:')}} {{$food->price}}</h2>
                </div>
                <div>
                    <a class="text-dark" href="/food/{{$food->id}}/edit"><i class="fas fa-cog h1"></i></a>
                </div>
            </div>
            <div class="card p-3">
                <h4>{{__('Description: ')}} {{$food->description}}</h4>
            </div>
        </div>
            
    </div>
@endsection