@extends('layouts.app')

@section('title', config('app.name', 'Laravel') . ': Відгуки')

@section('content')
    <div class="container">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="/profile/settings">Налаштування</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/profile/bookings">Бронювання</a>
            </li>

            <li class="nav-item">
                <a class="nav-link active" href="/profile/reviews">Відгуки</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/profile/saved">Збережене</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/profile/apartments">Помешкання</a>
            </li>
        </ul>

        <h1 class="profile--title">Відгуки</h1>

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
                            Гарний готель для відпочинку
                        </p>

                        <p class="profile-list-item-left--subtitle">
                            Arcadia apartment & sea terrace
                        </p>

                        <p class="profile-list-item-left--subtitle">
                            Оцінка: 9/10
                        </p>
                    </div>
                </div>

                <div class="profile-list-item-right d-flex align-items-start">
                    <button class="btn profile-list-item-right--btn">
                        <img src="/img/svg/more.svg" alt="" title="Властивості">
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
