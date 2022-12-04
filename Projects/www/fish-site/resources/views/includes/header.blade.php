@section('header')
    <header class="header" id="header">
        <nav class="header-navigation">
            <a class="header-navigation-brand" href="/"><i class="header-navigation-brand-icon fa-solid fa-fish-fins"></i><p class="header-navigation-brand-text">Fish Site</p></a>
            <div class="header-navigation-menu" id="menuIcon">
                <i class="header-navigation-menu-icon fa-solid fa-bars"></i>
            </div>
            <div class="header-navigation-slide__menu" id="slideMenu">
                <div class="header-navigation-slide__menu-border"></div>
                <div class="header-navigation-slide__menu-content">
                    <div class="header-navigation-slide__menu-content-head">
                        <div class="header-navigation-slide__menu-content-head-close" id="closeMenu">
                            <i class="header-navigation-slide__menu-content-head-close-icon fa-solid fa-xmark"></i>
                        </div>
                        <div class="header-navigation-slide__menu-content-head-style">
                            <i class="header-navigation-slide__menu-content-head-style-icon fa-solid fa-moon"></i>
                            <label class="header-navigation-slide__menu-content-head-style-wrapper">
                                <input type="checkbox" class="header-navigation-slide__menu-content-head-style-wrapper-input" id="styleCheckBox" name="styleCheckBox">
                                <div class="header-navigation-slide__menu-content-head-style-wrapper-slider">
                                    <div class="header-navigation-slide__menu-content-head-style-wrapper-slider-knob"></div>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="header-navigation-slide__menu-content-body">
                        @if(Auth::guest())
                            <a class="header-navigation-slide__menu-content-body-link" href="/login" id="loginBtn"><i class="header-navigation-slide__menu-content-body-link-icon fa-solid fa-arrow-right-to-bracket"></i><p class="header-navigation-slide__menu-content-body-link-text">Login</p></a>
                            <a class="header-navigation-slide__menu-content-body-link" href="/register" id="registerBtn"><i class="header-navigation-slide__menu-content-body-link-icon fa-solid fa-user-plus"></i><p class="header-navigation-slide__menu-content-body-link-text">Register</p></a>
                        @else
                            <a class="header-navigation-slide__menu-content-body-link" href="/profile/{{ Auth::user()->id }}" id="profileBtn"><i class="header-navigation-slide__menu-content-body-link-icon fa-solid fa-user"></i><p class="header-navigation-slide__menu-content-body-link-text">
                                    {{ Auth::user()->name }}</p></a>
                            <a class="header-navigation-slide__menu-content-body-link" href="/admin_panel"><i class="header-navigation-slide__menu-content-body-link-icon fa-solid fa-user-shield"></i><p class="header-navigation-slide__menu-content-body-link-text">Admin panel</p></a>
                            <a class="header-navigation-slide__menu-content-body-link" href="/users"><i class="header-navigation-slide__menu-content-body-link-icon fa-solid fa-users"></i><p class="header-navigation-slide__menu-content-body-link-text">Users</p></a>
                            <a class="header-navigation-slide__menu-content-body-link" href="/logout" id="logoutBtn"><i class="header-navigation-slide__menu-content-body-link-icon fa-solid fa-arrow-right-from-bracket"></i><p class="header-navigation-slide__menu-content-body-link-text">Logout</p></a>
                        @endif
                        <a class="header-navigation-slide__menu-content-body-link" href="/galleries"><i class="header-navigation-slide__menu-content-body-link-icon fa-regular fa-images"></i><p class="header-navigation-slide__menu-content-body-link-text">Galleries</p></a>
                        <a class="header-navigation-slide__menu-content-body-link" href="/games"><i class="header-navigation-slide__menu-content-body-link-icon fa-solid fa-gamepad"></i><p class="header-navigation-slide__menu-content-body-link-text">Games</p></a>
                        <a class="header-navigation-slide__menu-content-body-link" href="/other_apps"><i class="header-navigation-slide__menu-content-body-link-icon fa-solid fa-mobile-screen-button"></i><p class="header-navigation-slide__menu-content-body-link-text">Other apps</p></a>
                        <a class="header-navigation-slide__menu-content-body-link" href="/contact_us"><i class="header-navigation-slide__menu-content-body-link-icon fa-solid fa-message"></i><p class="header-navigation-slide__menu-content-body-link-text">Contact us</p></a>
                        <a class="header-navigation-slide__menu-content-body-link" href="/about_us"><i class="header-navigation-slide__menu-content-body-link-icon fa-solid fa-question"></i><p class="header-navigation-slide__menu-content-body-link-text">About us</p></a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
@endsection
