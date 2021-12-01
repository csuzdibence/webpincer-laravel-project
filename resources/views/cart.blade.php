@extends('layouts.base')

@section('title')
<title>WebPincér - cart</title>    
@endsection

@section('content')
<div class="card mb-3 border-dark bg-light">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <div>
                <h1>{{__('Full price: ')}} {{$sum}} {{__('Ft')}}</h1>
            </div>
        </div>
        
    </div>
    <div class="card-body">
        <div  style="display:grid;grid-template-columns:auto auto;">
            @foreach ($cart as $item)
                <div class="card m-3 border border-danger">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <a href="/food/{{$item['food']->id}}"><h5 class="text-danger">{{$item['food']->name}}</h5></a>
                            <a class="text-danger" href="/cart/{{$item['food']->id}}/delete"><i onMouseOver="this.style.color='#000'" onmouseout="this.style.color='inherit'" class="fas fa-trash-alt h1"></i></a>
                        </div>                        
                        <h5>{{__('Price: ')}}{{$item['food']->price}} Ft</h5>
                        <h5>{{__('Quantity: ')}}{{$item['quantity']}}</h5>
                    </div>
                </div>
            @endforeach
            </div>
    </div>
    <a class="btn btn-danger" href="{{route('order')}}">{{__('Order')}}</a>
</div>
@endsection