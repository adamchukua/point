@extends('layouts.app')

@section('title', config('app.name', 'Laravel') . ': ' . $hotel->name)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3">
                @include('layouts.search-sidebar')
            </div>

            <div class="col-9">
                <ul class="nav nav-tabs d-flex justify-content-around mb-2 nav-tabs__bg">
                    <li class="nav-item">
                        <a class="nav-link" href="#description">Опис</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#reviews">Відгуки гостей</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#features">Зручності</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#pay">Деталі оплати</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#availability">Наявність місць</a>
                    </li>
                </ul>

                <div class="hotel">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <div class="hotel--title">
                                <span>{{ $hotel->getType() }}</span>
                                {{ $hotel->name }}
                            </div>
                        </div>

                        <div class="col-1">
                            <save-button hotel-id="{{ $hotel->id }}" status="{{ $savedStatus }}"></save-button>
                        </div>

                        <div class="col-2">
                            <a class="btn btn-second" href="#booking">Бронювати</a>
                        </div>
                    </div>

                    <div class="row">
                        <p>{{ $hotel->address }}</p>
                    </div>

                    <div class="hotel-gallery">
                        <div class="row align-items-center">
                            @foreach($hotel->hotelPhotos as $hotelPhoto)
                                <div class="col-4">
                                    <img
                                        src="/storage/{{ $hotelPhoto->image }}"
                                        class="hotel-gallery--img w-100"
                                        alt=""
                                    >
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <section class="hotel-section">
                <p class="hotel--title" id="description">Опис</p>

                <p class="hotel--description">
                    {!! nl2br(e($hotel->description)) !!}
                </p>
            </section>

            <section class="hotel-section">
                <p class="hotel--title" id="reviews">Відгуки гостей</p>

                <div class="hotel-reviews">
                    <p class="hotel-reviews--number">
                        <span>{{ $hotel->reviews->count() }}</span> відгуків
                    </p>

                    @if($hotel->reviews->count() > 0)
                        <p class="hotel-reviews--mark">
                            <span>{{ $reviewsAverageMark }}</span>
                            {{ $reviewsAverageMarkText }}
                        </p>

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

                            <a href="/hotel/{{ $hotel->id }}/reviews/add" class="btn btn-first mb-3">Додати відгук</a>
                            <a href="/hotel/{{ $hotel->id }}/reviews" class="btn btn-first mb-3">Читати всі відгуки</a>
                        @endif
                    </div>
                </div>
            </section>

            <section class="hotel-section">
                <p class="hotel--title" id="features">Зручності</p>

                <div class="hotel-features">
                    <div class="row">
                        @if($hotel->featuresFood())
                            <div class="col-4">
                                <p class="hotel-features--title">Харчування</p>

                                <ul class="hotel-features-list list-unstyled">
                                    @if($hotel->food_with_own_kitchen)
                                        <li class="hotel-features-list--item">З власною кухнею</li>
                                    @endif

                                    @if($hotel->food_breakfast_is_included)
                                        <li class="hotel-features-list--item">Сніданок включено</li>
                                    @endif

                                    @if($hotel->food_restaurant)
                                        <li class="hotel-features-list--item">Ресторан</li>
                                    @endif
                                </ul>
                            </div>
                        @endif

                        @if($hotel->featuresInternet())
                            <div class="col-4">
                                <p class="hotel-features--title">Інтернет</p>

                                <ul class="hotel-features-list list-unstyled">
                                    @if($hotel->internet_free_wifi)
                                        <li class="hotel-features-list--item">Безкоштовний Wi-Fi</li>
                                    @endif

                                    @if($hotel->internet_fixed)
                                        <li class="hotel-features-list--item">Фіксований Інтернет</li>
                                    @endif
                                </ul>
                            </div>
                        @endif

                        @if($hotel->featuresTransport())
                            <div class="col-4">
                                <p class="hotel-features--title">Транспорт</p>

                                <ul class="hotel-features-list list-unstyled">
                                    @if($hotel->transport_free_parking)
                                        <li class="hotel-features-list--item">Безкоштовна автостоянка</li>
                                    @endif

                                    @if($hotel->transport_paid_parking)
                                        <li class="hotel-features-list--item">Платна автостоянка</li>
                                    @endif

                                    @if($hotel->transport_e_station)
                                        <li class="hotel-features-list--item">Станція для заряджання електромобілів</li>
                                    @endif
                                </ul>
                            </div>
                        @endif

                        @if($hotel->featuresSportsLeisure())
                            <div class="col-4">
                                <p class="hotel-features--title">Спорт та дозвілля</p>

                                <ul class="hotel-features-list list-unstyled">
                                    @if($hotel->sports_leisure_fitness)
                                        <li class="hotel-features-list--item">Фітнес-центр</li>
                                    @endif

                                    @if($hotel->sports_leisure_basin)
                                        <li class="hotel-features-list--item">Басейн</li>
                                    @endif

                                    @if($hotel->sports_leisure_health_spa)
                                        <li class="hotel-features-list--item">Оздоровчий спа-центр</li>
                                    @endif
                                </ul>
                            </div>
                        @endif

                        @if($hotel->featuresOther())
                            <div class="col-4">
                                <p class="hotel-features--title">Інше</p>

                                <ul class="hotel-features-list list-unstyled">
                                    @if($hotel->other_pets_allowed)
                                        <li class="hotel-features-list--item">Дозволене розміщення з домашніми тваринами</li>
                                    @endif

                                    @if($hotel->other_cleaning)
                                        <li class="hotel-features-list--item">Прибирання</li>
                                    @endif

                                    @if($hotel->other_facilities_for_people_with_disabilities)
                                        <li class="hotel-features-list--item">Зручності для осіб з обмеженими фізичними можливостями</li>
                                    @endif
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </section>

            <section class="hotel-section">
                <p class="hotel--title" id="pay">Деталі оплати</p>

                <ul class="list-group list-group-flush align-items-start">
                    <li class="list-group-item">Оплата при заселенні (готівка)</li>
                    <li class="list-group-item">Оплата при заселенні (карткою Visa/MasterCard)</li>
                </ul>
            </section>

            <section class="hotel-section" id="booking">
                <p class="hotel--title" id="availability">Наявність місць</p>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Тип номеру</th>
                            <th scope="col">Вміщує в собі (осіб)</th>
                            <th scope="col">Коментар від власника</th>
                            <th scope="col">Ціна (грн)</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($hotel->rooms as $room)
                            <!-- TODO: check if number of rooms is less than number of bookings -->
                            @if(true)
                                <tr>
                                    <th scope="row">{{ $room->type }}</th>
                                    <td>{{ $room->contains }}</td>
                                    <td>{{ $room->comment }}</td>
                                    <td>{{ $room->price }}</td>
                                    <td>
                                        <form
                                            action="/booking/{{ $room->id }}/store"
                                            method="post">
                                            @csrf

                                            <div class="d-none">
                                                <input
                                                    type="date"
                                                    name="arrival"
                                                    id="arrival"
                                                    value="{{ $query['arrival'] ?? '' }}">

                                                <input
                                                    type="date"
                                                    name="departure"
                                                    id="departure"
                                                    value="{{ $query['departure'] ?? '' }}">

                                                <input
                                                    type="number"
                                                    name="peopleNumber"
                                                    id="peopleNumber"
                                                    value="{{ $query['peopleNumber'] ?? '' }}"
                                                    min="1">
                                                <input
                                                    type="number"
                                                    name="roomsNumber"
                                                    id="roomsNumber"
                                                    value="{{ $query['roomsNumber'] ?? '' }}"
                                                    class="form-control search--input sidebar--input"
                                                    min="1">
                                            </div>

                                            <button
                                                class="btn btn-first">
                                                Бронювати
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </section>
        </div>
    </div>
@endsection
