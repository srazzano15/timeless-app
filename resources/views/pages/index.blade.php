@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Timeless Distillery Batch Manager</h1>
        <p>Please use your provided username and password to sign in!</p>
        <div class="row justify-content-center">
            <a class="nav-link btn" href="{{ route('login') }}">{{ __('Login') }}</a>
            @if (Route::has('register'))
                <a class="nav-link btn" href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
        </div>
    </div>
@endsection


