@extends('layouts.base')

@section('title')
<title>WebPincér - Create a food</title>    
@endsection

@section('content')
<div class="card">
    <h4 class="card-header">Create a food</h4>
    <div class="card-body">
        <form action="{{route('food.create')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="restaurant_id">{{__('Restaurant')}}</label>
                <select name="restaurant_id" class="form-select">
                    <option>{{__('Please choose a restaurant')}}</option>
                    @foreach ($restaurants as $restaurant)
                        <option value="{{$restaurant->id}}}">{{$restaurant->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <x-form.input name="name" type="text" label="{{__('Name')}}" />
            </div>
            <div class="mb-3">
                <label for="description">{{__('Description')}}</label>
                <textarea name="description" class="form-control" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <x-form.input name="price" type="text" label="{{__('Price')}}" />
            </div>
            <div>
                <button type="submit" class="btn btn-primary btn-lg">{{__('Create')}}</button>
            </div>
        </form>
    </div>
</div>
@endsection