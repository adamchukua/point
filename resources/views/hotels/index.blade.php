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
                            <button class="btn btn-second">Бронювати</button>
                        </div>
                    </div>

                    <div class="row">
                        <p>{{ $hotel->address }}</p>
                    </div>

                    <div class="hotel-gallery">
                        <div class="row align-items-center">
                            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                                <img
                                    src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(73).webp"
                                    class="w-100 shadow-1-strong rounded mb-4 hotel-gallery--img"
                                    alt="Boat on Calm Water"
                                >

                                <img
                                    src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(18).webp"
                                    class="w-100 shadow-1-strong rounded hotel-gallery--img"
                                    alt="Waves at Sea"
                                >
                            </div>

                            <div class="col-lg-8">
                                <img
                                    src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(18).webp"
                                    class="w-100 shadow-1-strong rounded hotel-gallery--img"
                                    alt="Mountains in the Clouds"
                                >
                            </div>
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
                        <span>{{ $reviews->count() }}</span> відгуків
                    </p>

                    @if($reviews->count() > 0)
                        <p class="hotel-reviews--mark">
                            <span>{{ 0 }}</span>
                            {{ 'Немає даних ' }}
                        </p>

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

                            <button class="btn btn-first mb-3">Читати всі відгуки</button>
                        @endif
                    </div>
                </div>
            </section>

            <section class="hotel-section">
                <p class="hotel--title" id="features">Зручності</p>

                <div class="hotel-features">
                    <div class="row">
                        <div class="col-4">
                            <p class="hotel-features--title">Харчування</p>

                            <ul class="hotel-features-list list-unstyled">
                                <li class="hotel-features-list--item">З власною кухнею</li>
                                <li class="hotel-features-list--item">Сніданок включено</li>
                                <li class="hotel-features-list--item">Ресторан</li>
                            </ul>
                        </div>

                        <div class="col-4">
                            <p class="hotel-features--title">Інтернет</p>

                            <ul class="hotel-features-list list-unstyled">
                                <li class="hotel-features-list--item">Безкоштовний Wi-Fi</li>
                            </ul>
                        </div>

                        <div class="col-4">
                            <p class="hotel-features--title">Парковка</p>

                            <ul class="hotel-features-list list-unstyled">
                                <li class="hotel-features-list--item">З власною кухнею</li>
                                <li class="hotel-features-list--item">Сніданок включено</li>
                            </ul>
                        </div>
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

            <section class="hotel-section">
                <p class="hotel--title" id="availability">Наявність місць</p>

                <p class="hotel--description">
                    Це помешкання розташоване в 5 хв. ходьби від пляжу Апартаменти Arcadia & sea terrace розташовані в Одесі, за 450 метрів від пляжу Аркадія та за 1,2 км від пляжу Чайка. До послуг гостей сад із терасою. На території облаштовано власну парковку та надається безкоштовний Wi-Fi.
                    <br>
                    В апартаментах є кондиціонер, повністю обладнана міні-кухня, телевізор із плоским екраном і окрема ванна кімната з ванною або душем, феном і безкоштовними туалетно-косметичними засобами. Серед інших зручностей: мікрохвильова піч, холодильник, чайник і плита.
                    <br>
                    За 7 км від апартаментів розміщені Одеський археологічний музей і Одеський театр опери й балету. Відстань від апартаментів Arcadia & sea terrace до міжнародного аеропорту Одеси становить 7 км.
                    <br>
                    Це місце розташування особливо подобається парам - вони оцінили його на 9,6 для поїздки удвох.
                </p>
            </section>
        </div>
    </div>
@endsection
