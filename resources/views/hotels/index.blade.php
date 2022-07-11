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
