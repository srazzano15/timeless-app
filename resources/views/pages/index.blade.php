@extends('layouts.app')

@section('content')
    {{-- <div class="center-align">
        <h2 style="font-size: 3rem;">Timeless Distillery Batch Manager</h2>
        <p>Please use your provided username and password to sign in!</p>
        <div>
            <a class="btn--p btn waves-effect waves-default" href="{{ route('login') }}">{{ __('Login') }}</a>
            @if (Route::has('register'))
                <a class="btn--p btn waves-effect waves-default" href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
        </div>
    </div> --}}
    <home-index></home-index>
@endsection


