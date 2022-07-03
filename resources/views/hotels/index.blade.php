@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="search-sidebar">
                    <p class="search-sidebar--title">Шукати</p>

                    <form action="" method="get">
                        <input type="text" placeholder="Куди Ви вирушаєте?" class="form-control search--input">

                        <input type="text" placeholder="Куди Ви вирушаєте?" class="form-control search--input">

                        <input type="text" placeholder="Куди Ви вирушаєте?" class="form-control search--input">

                        <button type="submit" class="btn search--input search--btn btn-first">Шукати</button>
                    </form>
                </div>
            </div>
            <div class="col-9">
                <div class="hotel">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <div class="hotel--title"><span>Апартаменти</span> Arcadia apartment & sea terrace</div>
                        </div>

                        <div class="col-1">
                            <button class="btn">
                                <img src="/img/svg/heart.svg" alt="" class="hotel--save" title="Додати в збережене">
                            </button>
                        </div>

                        <div class="col-2">
                            <button class="btn btn-second">Бронювати</button>
                        </div>
                    </div>

                    <div class="row">
                        <p>16 Kamanina Street flor 23, Одеса, 65000, Україна</p>
                    </div>

                    <div class="hotel-gallery">
                        <div class="row">
                            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                                <img
                                    src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(73).webp"
                                    class="w-100 shadow-1-strong rounded mb-4 hotel-gallery--img"
                                    alt="Boat on Calm Water"
                                >

                                <img
                                    src="https://mdbcdn.b-cdn.net/img/Photos/Vertical/mountain1.webp"
                                    class="w-100 shadow-1-strong rounded mb-4 hotel-gallery--img"
                                    alt="Wintry Mountain Landscape"
                                >
                            </div>

                            <div class="col-lg-4 mb-4 mb-lg-0">
                                <img
                                    src="https://mdbcdn.b-cdn.net/img/Photos/Vertical/mountain2.webp"
                                    class="w-100 shadow-1-strong rounded mb-4 hotel-gallery--img"
                                    alt="Mountains in the Clouds"
                                >

                                <img
                                    src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(73).webp"
                                    class="w-100 shadow-1-strong rounded mb-4 hotel-gallery--img"
                                    alt="Boat on Calm Water"
                                >
                            </div>

                            <div class="col-lg-4 mb-4 mb-lg-0">
                                <img
                                    src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(18).webp"
                                    class="w-100 shadow-1-strong rounded mb-4 hotel-gallery--img"
                                    alt="Waves at Sea"
                                >

                                <img
                                    src="https://mdbcdn.b-cdn.net/img/Photos/Vertical/mountain3.webp"
                                    class="w-100 shadow-1-strong rounded mb-4 hotel-gallery--img"
                                    alt="Yosemite National Park"
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <section class="hotel-section">
                <p class="hotel--title">Опис</p>

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

            <section class="hotel-section">
                <p class="hotel--title">Відгуки гостей</p>

                <div class="hotel-reviews">
                    <p class="hotel-reviews--number">
                        <span>297</span> відгуків
                    </p>

                    <p class="hotel-reviews--mark">
                        <span>9,6</span> Відмінно
                    </p>

                    <div class="hotel-reviews-categories">
                        <p class="hotel-reviews-categories--title">Оцінки за категоріями</p>

                        <div class="row">
                            <div class="col-4">
                                <p class="hotel-reviews-categories--item">Персонал: 9,5</p>
                                <p class="hotel-reviews-categories--item">Комфорт: 9,5</p>
                                <p class="hotel-reviews-categories--item">Безкоштовний Wi-Fi: 9,5</p>
                            </div>

                            <div class="col-4">
                                <p class="hotel-reviews-categories--item">Зручності: 9,5</p>
                                <p class="hotel-reviews-categories--item">Співвідношення ціна/якість: 9,5</p>
                            </div>

                            <div class="col-4">
                                <p class="hotel-reviews-categories--item">Чистота: 9,5</p>
                                <p class="hotel-reviews-categories--item">Розташування: 9,5</p>
                            </div>
                        </div>

                        <button class="btn btn-first mb-3">Читати всі відгуки</button>
                    </div>
                </div>
            </section>

            <section class="hotel-section">
                <p class="hotel--title">Зручності</p>

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
        </div>
    </div>
@endsection
