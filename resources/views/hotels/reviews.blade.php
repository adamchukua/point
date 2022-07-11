@extends('layouts.app')

@section('title', config('app.name', 'Laravel') . ': Відгуки гостей про ' . $hotel->name)

@section('content')
    <div class="container">
        <h1 class="profile--title">
            Відгуки гостей
            <a href="/hotel/{{ $hotel->id }}" class="link-unstyled">
                {{ $hotel->name }}
            </a>
        </h1>

        <div class="hotel-reviews-categories">
            <p class="hotel-reviews-categories--title">Оцінки за категоріями</p>

            <div class="row">
                <div class="col-4">
                    <p class="hotel-reviews-categories--item">Персонал:
                        {{ $hotel->reviews->avg('personnel_mark') }}
                    </p>
                    <p class="hotel-reviews-categories--item">Комфорт:
                        {{ $hotel->reviews->avg('comfort_mark') }}
                    </p>
                    <p class="hotel-reviews-categories--item">Безкоштовний Wi-Fi:
                        {{ $hotel->reviews->avg('free_wifi_mark') }}
                    </p>
                </div>

                <div class="col-4">
                    <p class="hotel-reviews-categories--item">Зручності:
                        {{ $hotel->reviews->avg('amenities_mark') }}
                    </p>
                    <p class="hotel-reviews-categories--item">Співвідношення ціна/якість:
                        {{ $hotel->reviews->avg('price_quality_mark') }}
                    </p>
                </div>

                <div class="col-4">
                    <p class="hotel-reviews-categories--item">Чистота:
                        {{ $hotel->reviews->avg('purity_mark') }}
                    </p>
                    <p class="hotel-reviews-categories--item">Розташування:
                        {{ $hotel->reviews->avg('location_mark') }}
                    </p>
                </div>
            </div>
        </div>

        <div class="profile-list">
            @foreach($hotel->reviews as $review)
                <div class="profile-list-item profile-list-item__mini">
                    <div class="row">
                        <a
                            class="col-2 d-flex align-items-center link-unstyled"
                            href="/profile/{{ $review->profile->id }}">
                            <img
                                src="{{ $review->profile->getAvatar() }}"
                                alt=""
                                class="profile-list-item-left-profile--img">

                            <p class="profile-list-item-left-profile--name">
                                {{ $review->profile->name ?? 'Анонім' }}
                            </p>
                        </a>

                        <div class="col-3">
                            <p class="profile-list-item-left-text--subtitle">
                                {{ $review->created_at }}
                            </p>

                            <p class="profile-list-item-left-text--title hotel-reviews--mark">
                                <span>{{ $review->getAverageMark() }}</span>
                                {{ $review->title ?? $review->getAverageMarkText($review->getAverageMark()) }}
                            </p>

                            @if($review->pros)
                                <p class="profile-list-item-left-text--subtitle">
                                    Переваги: {{ $review->pros }}
                                </p>
                            @endif

                            @if($review->cons)
                                <p class="profile-list-item-left-text--subtitle">
                                    Недоліки: {{ $review->cons }}
                                </p>
                            @endif

                            <p class="profile-list-item-left-text--subtitle">
                                {{ $review->text }}
                            </p>

                            <p class="profile-list-item-left-text--subtitle d-flex">
                                @for($i = 0; $i < $review->stars; $i++)
                                    <img src="/img/svg/star.svg" alt="" class="profile-list-item-left-text--img">
                                @endfor
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
