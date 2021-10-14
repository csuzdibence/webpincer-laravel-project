@extends('layouts.base')

@section('title')
<title>WebPincér - Create a Restaurant</title>    
@endsection

@section('content')
<div class="card">
    <h4 class="card-header">Create a restaurant</h4>
    <div class="card-body">
        <form action="{{route('restaurant.create')}}" method="POST">
            @csrf
            <div class="mb-3">
                <x-form.input name="name" type="text" label="{{__('Restaurant name')}}" />
            </div>
            <div class="mb-3">
                <x-form.input name="ownerName" type="text" label="{{__('Owners name')}}" />
            </div>
            <div>
                <button type="submit" class="btn btn-primary btn-lg">{{__('Create')}}</button>
            </div>
        </form>
    </div>
</div>
@endsection