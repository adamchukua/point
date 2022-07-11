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

                @php
                    $reviewsAverageMark = ($saved->hotel->reviews->avg('personnel_mark') +
                        $saved->hotel->reviews->avg('comfort_mark') +
                        $saved->hotel->reviews->avg('free_wifi_mark') +
                        $saved->hotel->reviews->avg('amenities_mark') +
                        $saved->hotel->reviews->avg('price_quality_mark') +
                        $saved->hotel->reviews->avg('purity_mark') +
                        $saved->hotel->reviews->avg('location_mark')) / 7;
                    $reviewsAverageMark = floor($reviewsAverageMark * 10) / 10;
                    $review = new \App\Models\Review();
                    $reviewsAverageMarkText = $review->getAverageMarkText($reviewsAverageMark);
                @endphp

                <div class="profile-list-item d-flex justify-content-between">
                    <div class="profile-list-item-left d-flex justify-content-between">
                        <img
                            src="/storage/{{ $saved->hotel->hotelPhotos->first()->image }}"
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

                                <p class="profile-list-item-left-text--subtitle hotel-reviews--mark">
                                    <span>{{ $reviewsAverageMark }}</span>
                                    {{ $reviewsAverageMarkText }}
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
