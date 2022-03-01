@extends('layouts.app')

@section('content')
    <div class="introduction">
        <div class="introduction__item container">
            <h1 class="introduction__title">{{__('page.title_login')}}</h1>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('page.login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-end">{{ __('page.label_user_email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-end">{{ __('page.label_password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('page.label_check') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('buttons.button_login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('page.label_link') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="row mb-0">
                        <p>{{ __('page.title_social') }}</p>
                        <form method="POST" action="{{ route('login_social') }}">
                            @csrf
                            <input hidden type="text" name="social" value="vkontakte">
                            <button class="col-md-6 offset-md-4">{{ __('buttons.button_vk') }}</button>
                        </form>
                        <form method="POST" action="{{ route('login_social') }}">
                            @csrf
                            <input hidden type="text" name="social" value="facebook">
                            <button class="col-md-6 offset-md-4">{{ __('buttons.button_fb') }}</button>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
