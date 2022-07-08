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

                    <div>
                        <p class="profile-list-item-left--title">
                            Arcadia apartment & sea terrace
                        </p>

                        <p class="profile-list-item-left--subtitle">
                            30 груд. 2021 – 5 січ. 2022
                        </p>

                        <p class="profile-list-item-left--subtitle">
                            Виконано
                        </p>
                    </div>
                </div>

                <div class="profile-list-item-right d-flex align-items-start">
                    <p class="profile-list-item-right--text">UAH 2 000</p>

                    <button class="btn profile-list-item-right--btn">
                        <img src="/img/svg/more.svg" alt="" title="Властивості">
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
