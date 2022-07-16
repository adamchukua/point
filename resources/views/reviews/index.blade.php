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

        @if($reviews->count() > 0)
            <div class="hotel-reviews-categories">
                <p class="hotel-reviews-categories--title">Оцінки за категоріями</p>

                <div class="row">
                    <div class="col-4">
                        <p class="hotel-reviews-categories--item">Персонал:
                            {{ $reviews->avg('personnel_mark') }}
                        </p>
                        <p class="hotel-reviews-categories--item">Комфорт:
                            {{ $reviews->avg('comfort_mark') }}
                        </p>
                        <p class="hotel-reviews-categories--item">Безкоштовний Wi-Fi:
                            {{ $reviews->avg('free_wifi_mark') }}
                        </p>
                    </div>

                    <div class="col-4">
                        <p class="hotel-reviews-categories--item">Зручності:
                            {{ $reviews->avg('amenities_mark') }}
                        </p>
                        <p class="hotel-reviews-categories--item">Співвідношення ціна/якість:
                            {{ $reviews->avg('price_quality_mark') }}
                        </p>
                    </div>

                    <div class="col-4">
                        <p class="hotel-reviews-categories--item">Чистота:
                            {{ $reviews->avg('purity_mark') }}
                        </p>
                        <p class="hotel-reviews-categories--item">Розташування:
                            {{ $reviews->avg('location_mark') }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="profile-list">
                @foreach($reviews as $review)
                    <div class="profile-list-item profile-list-item__mini">
                        <div class="row">
                            <div
                                class="col-2 d-flex align-items-center justify-content-center"
                                style="flex-direction: column">
                                <a class="d-flex align-items-center link-unstyled"
                                   href="/profile/{{ $review->profile->id }}">
                                    <img
                                        src="{{ $review->profile->getAvatar() }}"
                                        alt=""
                                        class="profile-list-item-left-profile--img">

                                    <p class="profile-list-item-left-profile--name">
                                        {{ $review->profile->name ?? 'Анонім' }}
                                    </p>
                                </a>

                                <p class="profile-list-item-left-text--subtitle mt-4 text-muted">
                                    {{ $review->booking->room->type }}
                                </p>
                            </div>

                            <div class="col-3">
                                <p class="profile-list-item-left-text--subtitle">
                                    {{ $review->created_at }}
                                </p>

                                <p class="profile-list-item-left-text--title hotel-reviews--mark">
                                    <span>{{ $review->getAverageMark() }}</span>
                                    {{ $review->title ?? $review->getAverageMarkText($review->getAverageMark()) }}
                                </p>

                                <p class="profile-list-item-left-text--subtitle d-flex mb-3">
                                    @for($i = 0; $i < $review->stars; $i++)
                                        <img src="/img/svg/star.svg" alt="" class="profile-list-item-left-text--img">
                                    @endfor
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
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    {{ $reviews->links() }}
                </div>
            </div>
        @else
            @include('layouts.empty-section')
        @endif
    </div>
@endsection
