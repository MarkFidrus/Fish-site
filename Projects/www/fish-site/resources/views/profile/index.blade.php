@extends('layouts.app')

@section('content')
    <section class="profile__container">
        <article class="profile__container-details">
            <div class="profile__container-details-header">
                <button class="profile__container-details-header-btn"><i class="profile__container-details-header-btn-icon fa-solid fa-user"></i>Profile details</button>
                <button class="profile__container-details-header-btn" id="profileDetailsHeaderPlus"><i class="profile__container-details-header-btn-icon fa-solid fa-plus"></i></button>
            </div>
            <div class="profile__container-details-body">
                <img class="profile__container-details-body-bg__picture" src="" alt="">
                <img class="profile__container-details-body-profile__picture" src="" alt="">
                <a class="profile__container-details-body-edit__profile" href="/profile/edit/{{Auth::user()->id}}"><i class="profile__container-details-body-edit__profile-icon fa-solid fa-pen-to-square"></i></a>
            </div>
        </article>
        <article class="profile__container-friends">
            <div class="profile__container-friends-header">
                <button class="profile__container-friends-header"></button>
            </div>
            <div class="profile__container-friends-body">

            </div>
        </article>
        <article class="profile__container-friend__requests">
            <div class="profile__container-friend__requests-header">

            </div>
            <div class="profile__container-friend__requests-body">

            </div>
        </article>
        <article class="profile__container-galleries">
            <div class="profile__container-galleries-header">

            </div>
            <div class="profile__container-galleries-body">

            </div>
        </article>
    </section>
@endsection
