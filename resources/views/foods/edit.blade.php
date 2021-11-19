@extends('layouts.base')

@section('content')
<form action="{{ route('food.edit', $food) }}" method="POST">
    @csrf
    <div class="d-flex mb-5">
        <h4 class="display-4">{{ __('Editing') }}: {{ $food->name }}</h4>
        <button class="ms-auto btn btn-primary btn-lg">{{ __('Update') }}</button>
    </div>
    <div class="row flex-md-row-reverse">
        <div class="col-md-4">            
            <div class="card mb-4">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="restaurant_id">{{__('Restaurant')}}</label>
                        <select name="restaurant_id" class="form-select">
                            <option>{{__('Please choose a restaurant')}}</option>
                            @foreach ($restaurants as $restaurant)
                                <option value="{{$restaurant->id}}" @if ($restaurant->id == $food->restaurant_id)
                                    selected
                                @endif>{{$restaurant->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <x-form.input name="name" label="{{ __('Food name') }}" value="{{$food->name}}" />
                    </div>
                    <div class="mb-3">
                        <x-form.input name="ownerName" type="text" label="{{ __('Price') }}" value="{{$food->price}}" />
                    </div>
                    <div class="mb-3">
                        <label for="description">{{__('Description')}}</label>
                        <textarea name="description" class="form-control" rows="3" value="{{$food->description}}">{{$food->description}}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection