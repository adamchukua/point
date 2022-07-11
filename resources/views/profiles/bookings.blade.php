@extends('layouts.app')

@section('title', config('app.name', 'Laravel') . ': Бронювання')

@section('content')
    <div class="container">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="/profile/settings">Налаштування</a>
            </li>

            <li class="nav-item">
                <a class="nav-link active" href="/profile/bookings">Бронювання</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/profile/reviews">Відгуки</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/profile/saved">Збережене</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/profile/apartments">Помешкання</a>
            </li>
        </ul>

        <h1 class="profile--title">Бронювання</h1>

        <div class="profile-list">
            <div class="profile-list-item d-flex justify-content-between">
                <div class="profile-list-item-left d-flex justify-content-between">
                    <img
                        src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(73).webp"
                        alt=""
                        class="profile-list-item-left--img"
                    >

                    <a href="/hotel/" class="link-unstyled">
                        <div class="profile-list-item-left-text">
                            <p class="profile-list-item-left-text--title">
                                Arcadia apartment & sea terrace
                            </p>

                            <p class="profile-list-item-left-text--subtitle">
                                30 груд. 2021 – 5 січ. 2022
                            </p>

                            <p class="profile-list-item-left-text--subtitle">
                                Виконано
                            </p>
                        </div>
                    </a>
                </div>

                <div class="profile-list-item-right d-flex align-items-start">
                    <div class="dropdown">
                        <button
                            class="btn profile-list-item-right--btn"
                            type="button" id="dropdownMenu{{ 0 }}"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img src="/img/svg/more.svg" alt="" title="Властивості">
                        </button>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                            <li>
                                <a class="dropdown-item" href="/hotel/">Сторінка готелю</a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="/profile/bookings/14/review/add">Залишити відгук</a>
                            </li>

                            <form action="/profile/unsaveHotel/" method="post">
                                @csrf

                                <li><button type="submit" class="dropdown-item">Видалити</button></li>
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
