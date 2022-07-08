@extends('layouts.app')

@section('title', config('app.name', 'Laravel') . ': Збережене')

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
                <a class="nav-link" href="/profile/reviews">Відгуки</a>
            </li>

            <li class="nav-item">
                <a class="nav-link active" href="/profile/saved">Збережене</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/profile/apartments">Помешкання</a>
            </li>
        </ul>

        <h1 class="profile--title">Збережене</h1>

        <div class="profile-list">
            @forelse($saveds as $saved)
                <div class="profile-list-item d-flex justify-content-between">
                    <div class="profile-list-item-left d-flex justify-content-between">
                        <img
                            src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(73).webp"
                            alt=""
                            class="profile-list-item-left--img"
                        >

                        <a href="/hotel/{{ $saved->hotel->id }}" class="link-unstyled">
                            <div class="profile-list-item-left-text">
                                <p class="profile-list-item-left-text--title">
                                    {{ $saved->hotel->name }}
                                </p>

                                <p class="profile-list-item-left-text--subtitle">
                                    {{ $saved->hotel->address }}
                                </p>

                                <p class="profile-list-item-left-text--subtitle">
                                    Рейтинг: {{ 0 }}
                                </p>
                            </div>
                        </a>
                    </div>

                    <div class="profile-list-item-right d-flex align-items-start">
                        <div class="dropdown">
                            <button class="btn profile-list-item-right--btn" type="button" id="dropdownMenu{{ $saved->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="/img/svg/more.svg" alt="" title="Властивості">
                            </button>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu{{ $saved->id }}">
                                <li><a class="dropdown-item" href="/hotel/{{ $saved->hotel->id }}">Переглянути</a></li>

                                <form action="/profile/unsaveHotel/{{ $saved->id }}" method="post">
                                    @csrf

                                    <li><button type="submit" class="dropdown-item">Видалити</button></li>
                                </form>
                            </ul>
                        </div>
                    </div>
                </div>
            @empty
                @include('layouts.empty-section')
            @endforelse
        </div>
    </div>
@endsection
