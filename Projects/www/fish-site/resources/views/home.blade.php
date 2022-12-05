@extends('layouts.app')

@section('content')
    <section class="home__container">
        <div class="home__container-text__container">
            <div class="home__container-text__container-bg">
                <h1 class="home__container-text__container-bg-title">Welcome to</h1>
                <h2 class="home__container-text__container-bg-subtitle">The Fish Site</h2>
            </div>
        </div>
        <div class="home__container-video__effect"></div>
        <div class="home__container-bg__video__container">
            <video class="home__container-bg__video__container-video" autoplay muted loop>
                <source src="/vids/bgvideo.mp4" type="video/mp4"/>
            </video>
        </div>
    </section>
@endsection


