@extends('layouts.app')

@section('content')
    <section class="login__container">
        <div class="login__container-bg__video__container">
            <video class="login__container-bg__video__container-video" autoplay muted loop>
                <source src="/vids/bgvideo.mp4" type="video/mp4">
            </video>
        </div>
        <div class="login__container-video__effect"></div>
        <div class="login__container-content">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="login__container-content-header">
                    <h1 class="login__container-content-header-title">{{ __('Login') }}</h1>
                </div>
                <div class="login__container-content-body">
                    <div class="login__container-content-body-email__field">
                        <input id="email" type="email" class="login__container-content-body-email__field-input" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Your email address">
                        <i class="login__container-content-body-email__field-icon fa-solid fa-envelope"></i>
                        <label class="login__container-content-body-email__field-label" for="email">{{ __('Email Address') }}</label>
                    </div>
                    <div class="login__container-content-body-password__field">
                        <input id="password" type="password" class="login__container-content-body-password__field-input" name="password" required autocomplete="current-password" placeholder="Your password">
                        <i class="login__container-content-body-password__field-icon fa-solid fa-lock"></i>
                        <label for="password" class="login__container-content-body-password__field-label">{{ __('Password') }}</label>
                    </div>
                    <div class="login__container-content-body-btn__field">
                        <button type="submit" class="login__container-content-body-btn__field-btn">{{ __('Login') }}</button>
                    </div>
                </div>
                <div class="login__container-content-footer">
                    <div class="login__container-content-footer-row__1">
                        <div class="login__container-content-footer-row__1-remember__field">
                            <label class="login__container-content-footer-row__1-remember__field-label__1">
                                <input class="login__container-content-footer-row__1-remember__field-label__1-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <div class="login__container-content-footer-row__1-remember__field-label__1-slider">
                                    <div class="login__container-content-footer-row__1-remember__field-label__1-slider-knob"></div>
                                </div>
                            </label>

                            <label class="login__container-content-footer-row__1-remember__field-label__2" for="remember">{{ __('Remember Me') }}</label></div>
                        <div class="login__container-content-footer-row__1-reset__password__field">
                            @if (Route::has('password.request'))
                                <a class="login__container-content-footer-row__1-reset__password__field-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Password ?') }}
                                </a>
                            @endif
                        </div>

                    </div>
                    <div class="login__container-content-footer-row__2">
                        <p class="login__container-content-footer-row__2-text">{{__("Don't have an account ?")}}</p>
                        <a class="login__container-content-footer-row__2-link" href="/register">{{ __('Create account') }}<i class="login__container-content-footer-row__2-link-icon fa-solid fa-hand-point-left"></i></a>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
