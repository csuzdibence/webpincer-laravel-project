@extends('layouts.base')

@section('title')
<title>WebPincér - Login</title>    
@endsection

@section('content')
<div class="row">
    <div class="col-lg-6 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="display-5">
                    {{__('Log in')}}
                </h5>
            </div>
            <div class="card-body">
                @if ($errors->count())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    </div>
                @endif
                <form action="{{ route('auth.login')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email">{{__('Email')}}</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password">{{__('Password')}}</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" value="1" name="remember_me">
                            <label for="remember_me">{{ __('Remember me')}}</label>
                        </div>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary btn-lg">
                            {{__('Log in')}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
            </div>
</div>
   
@endsection