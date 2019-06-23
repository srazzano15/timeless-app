@extends('layouts.app')

@section('content')
 {{--    <div class="row">
        <div class="col sm12 m6 offset-m3">
            <div class="card center-align">
                <div class="card-title">{{ __('Login') }}</div>

                <div class="card-content">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                name="email" value="{{ old('email') }}" required>

                                <label for="email" class="">{{ __('E-Mail Address') }}</label>
                                @if ($errors->has('email'))
                                    <span class="helper-text" data-error="wrong" data-success="right" role="alert">
                                        <strong class="red-text">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" 
                                name="password" required>
                                <label for="password" >{{ __('Password') }}</label>
                                @if ($errors->has('password'))
                                    <span class="helper-text" data-error="wrong" data-success="right" role="alert">
                                        <strong class="red-text">{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s6 m4">
                                
                                    <label for="remember">
                                        <input class="checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <span>{{ __('Remember Me') }}</span>
                                    </label>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 md6">
                                <div class="input-field">
                                    <button type="submit" class="btn btn--p">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn--lk" href="{{ route('password.request') }}">
                                            {{ __('Forgot Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>  
</div> --}}
<v-app>
<vue-login form-route="{{ route('login') }}">
    <template v-slot:csrf>
        @csrf
    </template>
</vue-login>
</v-app>
@endsection
