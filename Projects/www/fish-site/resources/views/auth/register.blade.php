@extends('layouts.app')

@section('content')
    <section class="register__container">
        <div class="register__container-bg__video__container">
            <video class="register__container-bg__video__container-video" autoplay muted loop>
                <source src="/vids/bgvideo.mp4" type="video/mp4">
            </video>
        </div>
        <div class="register__container-video__effect"></div>
        <div class="register__container-content">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="register__container-content-header">
                    <h1 class="register__container-content-header-title">{{ __('Register') }}</h1>
                </div>
                <div class="register__container-content-body">
                    <div class="register__container-content-body-username__field">
                        <input id="name" type="text" class="register__container-content-body-username__field-input" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Username">
                        <i class="register__container-content-body-username__field-icon fa-solid fa-user"></i>
                        <label for="name" class="register__container-content-body-username__field-label">{{ __('Name') }}</label>
                    </div>
                    <div class="register__container-content-body-email__field">
                        <input id="email" type="email" class="register__container-content-body-email__field-input" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email address">
                        <i class="register__container-content-body-email__field-icon fa-solid fa-envelope"></i>
                        <label for="email" class="register__container-content-body-email__field-label">{{ __('Email Address') }}</label>
                    </div>
                    <div class="register__container-content-body-password__field">
                        <input id="password" type="password" class="register__container-content-body-password__field-input" name="password" required autocomplete="new-password" placeholder="Password">
                        <i class="register__container-content-body-password__field-icon fa-solid fa-lock"></i>
                        <label for="password" class="register__container-content-body-password__field-label">{{ __('Password') }}</label>
                    </div>
                    <div class="register__container-content-body-repassword__field">
                        <input id="password-confirm" type="password" class="register__container-content-body-repassword__field-input" name="password_confirmation" required autocomplete="new-password" placeholder="Password again">
                        <i class="register__container-content-body-repassword__field-icon fa-solid fa-lock"></i>
                        <label for="password-confirm" class="register__container-content-body-repassword__field-label">{{ __('Confirm Password') }}</label>
                    </div>
                </div>
                <div class="register__container-content-footer">

                    <div class="register__container-content-footer-btn__container">
                        <button type="submit" class="register__container-content-footer-btn__container-btn">{{ __('Register') }}</button>
                    </div>
                    <div class="register__container-content-footer-login">
                        <p class="register__container-content-footer-login-text">Do you have account ? Log in!</p>
                        <a class="register__container-content-footer-login-link" href="/login">{{__('Login')}}<i class="register__container-content-footer-login-link-icon fa-solid fa-hand-point-left"></i></a>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
