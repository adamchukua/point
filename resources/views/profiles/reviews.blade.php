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
            @forelse($user->profile->reviews as $review)
                <div class="profile-list-item d-flex justify-content-between">
                    <div class="profile-list-item-left d-flex justify-content-between">
                        <img
                            src="/storage/{{ $review->hotel->hotelPhotos->first()->image }}"
                            alt=""
                            class="profile-list-item-left--img"
                        >

                        <a href="/hotel/{{ $review->hotel->id }}" class="link-unstyled">
                            <div class="profile-list-item-left-text">
                                <p class="profile-list-item-left-text--title">
                                    {{ $review->title }}
                                </p>

                                <p class="profile-list-item-left-text--subtitle">
                                    {{ $review->hotel->name }}
                                </p>

                                <p class="profile-list-item-left-text--subtitle d-flex">
                                    @for($i = 0; $i < $review->stars; $i++)
                                        <img src="/img/svg/star.svg" alt="" class="profile-list-item-left-text--img">
                                    @endfor
                                </p>
                            </div>
                        </a>
                    </div>

                    <div class="profile-list-item-right d-flex align-items-start">
                        <div class="dropdown">
                            <button
                                class="btn profile-list-item-right--btn"
                                type="button"
                                id="dropdownMenu{{ $review->id }}"
                                data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <img src="/img/svg/more.svg" alt="" title="Властивості">
                            </button>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu{{ $review->id }}">
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="/hotel/{{ $review->hotel->id }}">
                                        Сторінка готелю
                                    </a>
                                </li>

                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="/profile/reviews/{{ $review->id }}/edit">
                                        Змінити
                                    </a>
                                </li>

                                <form action="/profile/reviews/{{ $review->id }}/edit" method="post">
                                    @csrf

                                    <li>
                                        <button type="submit" class="dropdown-item">
                                            Видалити
                                        </button>
                                    </li>
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
