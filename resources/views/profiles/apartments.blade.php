@extends('layouts.app')

@section('title', config('app.name', 'Laravel') . ': Помешкання')

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
                <a class="nav-link" href="/profile/saved">Збережене</a>
            </li>

            <li class="nav-item">
                <a class="nav-link active" href="/profile/apartments">Помешкання</a>
            </li>
        </ul>

        <div class="d-flex justify-content-between align-items-center">
            <h1 class="profile--title">Помешкання</h1>
            <a href="/profile/apartments/create" class="btn btn-first">Додати своє помешкання</a>
        </div>

        @if($user->hasVerifiedEmail() == null)
            @include('layouts.verification')
        @else
            @forelse($hotels as $hotel)

                @php
                    $reviewsAverageMark = ($hotel->reviews->avg('personnel_mark') +
                        $hotel->reviews->avg('comfort_mark') +
                        $hotel->reviews->avg('free_wifi_mark') +
                        $hotel->reviews->avg('amenities_mark') +
                        $hotel->reviews->avg('price_quality_mark') +
                        $hotel->reviews->avg('purity_mark') +
                        $hotel->reviews->avg('location_mark')) / 7;
                    $reviewsAverageMark = floor($reviewsAverageMark * 10) / 10;
                    $review = new \App\Models\Review();
                    $reviewsAverageMarkText = $review->getAverageMarkText($reviewsAverageMark);
                @endphp

                <div class="profile-list">
                    <div class="profile-list-item d-flex justify-content-between">
                        <div class="profile-list-item-left d-flex justify-content-between">
                            <a href="/hotel/{{ $hotel->id }}" class="link-unstyled">
                                <img
                                    src="/storage/{{ $hotel->hotelPhotos->first()->image }}"
                                    alt=""
                                    class="profile-list-item-left--img"
                                >
                            </a>

                            <div class="profile-list-item-left-text">
                                <p class="profile-list-item-left-text--title">
                                    <a href="/hotel/{{ $hotel->id }}" class="link-unstyled">
                                        {{ $hotel->name }}
                                    </a>
                                </p>

                                <p class="profile-list-item-left-text--subtitle hotel-reviews--mark">
                                    <span>{{ $reviewsAverageMark }}</span>
                                    {{ $reviewsAverageMarkText }}
                                </p>

                                <p class="profile-list-item-left-text--subtitle">
                                    Додано: {{ date('d.m.Y о h:i', strtotime($hotel->created_at)) }}
                                </p>

                                <p class="profile-list-item-left-text--subtitle">
                                    Відгуки: {{ $hotel->reviews->count() }}
                                </p>

                                <p class="profile-list-item-left-text--subtitle">
                                    Всього бронювань: {{ 0 }}
                                </p>

                                <p class="profile-list-item-left-text--subtitle">
                                    Очікує на схвалення: {{ 0 }}
                                </p>
                            </div>
                        </div>

                        <div class="profile-list-item-right d-flex align-items-start">
                            <div class="dropdown">
                                <button class="btn profile-list-item-right--btn" type="button" id="dropdownMenu{{ $hotel->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="/img/svg/more.svg" alt="" title="Властивості">
                                </button>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu{{ $hotel->id }}">
                                    <li>
                                        <a class="dropdown-item" href="/hotel/{{ $hotel->id }}">Переглянути</a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="/profile/apartments/{{ $hotel->id }}/edit">Редагувати</a>
                                    </li>

                                    <form action="/profile/apartments/{{ $hotel->id }}/delete" method="post">
                                        @csrf

                                        <li>
                                            <button type="submit" class="dropdown-item">Видалити</button>
                                        </li>
                                    </form>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                @include('layouts.empty-section')
            @endforelse

                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        {{ $hotels->links() }}
                    </div>
                </div>
        @endif
    </div>
@endsection
