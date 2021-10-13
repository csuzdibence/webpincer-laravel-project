@extends('layouts.base')

@section('title')
<title>WebPincér - Registration</title>    
@endsection

@section('content')
    <div class="row">
        <div class="col-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>{{ __('Register')}}</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('auth.register')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <x-form.input type="text" name="name" label="{{ __('Full name')}}"/>
                        </div>
                        <div class="mb-3">
                            <x-form.input type="email" name="email" label="{{ __('Email address')}}"/>
                        </div>
                        <div class="mb-3">
                            <x-form.input type="password" name="password" label="{{ __('Password')}}"/>
                        </div>
                        <div class="mb-3">
                            <x-form.input type="password" name="password_confirmation" label="{{ __('Password confirmation')}}"/>
                        </div> 
                        <div class="mb-3 form-check">
                            <input class="form-check-input {{ $errors->has('terms') ? 'is-invalid' : ''}}" type="checkbox" value="1" name="terms" id="terms" {{old('terms') ? 'checked' : '' }}>
                            <label class="form-check-label" for="terms">
                                {{__('Agree to terms and conditions')}}
                            </label>
                            @if ($errors->has('terms'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('terms')}}
                                </div>
                            @endif
                        </div>
                        <div class="col-3 mx-auto">
                            <button class="btn btn-primary btn-lg">
                                {{ __('Register')}}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
@endsection