@extends('layouts.app')

@section('content')
{{--     <div class="row">
        <div class="col sm12 m6 offset-m3">
            <div class="card center-align">
                <div class="card-title">{{ __('Register') }}</div>

                <div class="card-content">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row">
                            <div class="input-field col s12">
                                <input id="name" type="text" class="{{ $errors->has('name') ? ' is-invalid' : '' }}" 
                                name="name" value="{{ old('name') }}" required>

                                <label for="name">{{ __('Name') }}</label>
                                @if ($errors->has('name'))
                                    <span class="helper-text" data-error="wrong" data-success="right" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">                           
                            <div class="input-field col s12">
                                <input id="email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                name="email" value="{{ old('email') }}" required>

                                <label for="email">{{ __('E-Mail Address') }}</label>
                                @if ($errors->has('email'))
                                    <span class="helper-text" data-error="wrong" data-success="right" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" 
                                name="password" required>

                                <label for="password">{{ __('Password') }}</label>
                                @if ($errors->has('password'))
                                    <span class="helper-text" data-error="wrong" data-success="right" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="inviteCode" type="text" class="{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" required>

                                <label for="invite">Invite Code</label>
                                @if ($errors->has('code'))
                                    <span class="helper-text" data-error="wrong" data-success="right" role="alert">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <button type="submit" class="btn btn--p waves-effect waves-default">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
<register-form form-route="{{ route('register') }}">
    <template v-slot:csrf>
        @csrf
    </template>
</register-form>
@endsection
