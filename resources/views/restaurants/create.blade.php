@extends('layouts.base')

@section('title')
<title>WebPincér - Create a Restaurant</title>    
@endsection

@section('content')
<form action="{{route('restaurant.create')}}" method="POST">
    @csrf
<div class="d-flex justify-content-between mb-3">    
    <h4 class="card-header">Create a restaurant</h4>
    <button type="submit" class="ms-auto btn btn-primary btn-lg">{{__('Create')}}</button>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                    <div class="mb-3">
                        <x-form.input name="name" type="text" label="{{__('Restaurant name')}}" />
                    </div>
                    <div class="mb-3">
                        <x-form.input name="ownerName" type="text" label="{{__('Owners name')}}" />
                    </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="alert alert-info">
                    {{ __('Save restaurant to be able to add images')}}
                </div>
            </div>
        </div>
    </div>
</div>
</form>
@endsection