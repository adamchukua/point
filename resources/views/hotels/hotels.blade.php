@extends('layouts.app')

@section('title', config('app.name', 'Laravel') . ': Знайдено ' . $hotels->count()  . ' помешкання')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3">
                @include('layouts.search-sidebar')

                <div class="sidebar mt-4">
                    <p class="sidebar--title">Сортувати за такими критеріями:</p>

                    <div class="sidebar-section">
                        <p class="sidebar-section--title">Ціна</p>

                        <form action="" method="get">
                            <input
                                type="text"
                                name=""
                                id=""
                                placeholder="Від"
                                class="form-control search--input sidebar--input">

                            <input
                                type="text"
                                name=""
                                id=""
                                placeholder="До"
                                class="form-control search--input sidebar--input">
                        </form>
                    </div>

                    <div class="sidebar-section">
                        <p class="sidebar-section--title">Популярні фільтри</p>

                        <form action="" method="get">
                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">Безкоштовний Wi-Fi</label>
                            </div>

                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">Готелі</label>
                            </div>

                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">Басейн</label>
                            </div>

                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">Дуже добре 8+</label>
                            </div>
                        </form>
                    </div>

                    <div class="sidebar-section">
                        <p class="sidebar-section--title">Кількість зірок</p>

                        <form action="" method="get">
                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">5</label>
                            </div>

                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">4+</label>
                            </div>

                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">3+</label>
                            </div>

                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">2+</label>
                            </div>
                        </form>
                    </div>

                    <div class="sidebar-section">
                        <p class="sidebar-section--title">Оцінка за відгуками</p>

                        <form action="" method="get">
                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">Чудово 9+</label>
                            </div>

                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">Дуже добре 8+</label>
                            </div>

                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">Добре 7+</label>
                            </div>

                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">Досить добре 6+</label>
                            </div>
                        </form>
                    </div>

                    <div class="sidebar-section">
                        <p class="sidebar-section--title">Харчування</p>

                        <form action="" method="get">
                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">З власною кухнею</label>
                            </div>

                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">Сніданок включено</label>
                            </div>

                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">Ресторан</label>
                            </div>
                        </form>
                    </div>

                    <div class="sidebar-section">
                        <p class="sidebar-section--title">Інтернет</p>

                        <form action="" method="get">
                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">Безкоштовний Wi-Fi</label>
                            </div>

                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">Фіксований Інтернет</label>
                            </div>
                        </form>
                    </div>

                    <div class="sidebar-section">
                        <p class="sidebar-section--title">Транспорт</p>

                        <form action="" method="get">
                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">Безкоштовна автостоянка</label>
                            </div>

                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">Платна автостоянка</label>
                            </div>

                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">Станція для заряджання електромобілів</label>
                            </div>
                        </form>
                    </div>

                    <div class="sidebar-section">
                        <p class="sidebar-section--title">Спорт та дозвілля</p>

                        <form action="" method="get">
                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">Фітнес-центр</label>
                            </div>

                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">Басейн</label>
                            </div>

                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">Оздоровчий спа-центр</label>
                            </div>
                        </form>
                    </div>

                    <div class="sidebar-section">
                        <p class="sidebar-section--title">Інше</p>

                        <form action="" method="get">
                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">Дозволене розміщення з домашніми тваринами</label>
                            </div>

                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">Прибирання</label>
                            </div>

                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">Зручності для осіб з обмеженими фізичними можливостями</label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="hotels">
                    <p class="hotels--title">
                        {{ $queryCity->city }}: знайдено {{ $hotels->count() }} помешкання
                    </p>

                    <ul class="nav nav-tabs d-flex justify-content-around mb-2 nav-tabs__bg">
                        <li class="nav-item">
                            <a class="nav-link" href="">Ціна (спершу найнижча)</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="">Ціна (спершу найдорожче)</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="">Ціна і якість</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="">Найпопулярніше</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="">Зірки (спершу найнижче)</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="">Зірки (спершу найбільше)</a>
                        </li>
                    </ul>

                    <div class="hotels-list">
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

                                $city = \Illuminate\Support\Facades\DB::table('cities')->where('id', $hotel->city)->first();
                            @endphp

                            <div class="hotels-list-item">
                                <div class="row">
                                    <div class="col-3">
                                        <a href="/hotel/{{ $hotel->id }}?{{ http_build_query($query)  }}">
                                            <img
                                                src="/storage/{{ $hotel->hotelPhotos->first()->image }}"
                                                alt=""
                                                class="hotels-list-item--img w-100">
                                        </a>
                                    </div>

                                    <div class="col-9 d-flex justify-content-between">
                                        <div class="hotels-list-item-left">
                                            <div class="hotels-list-item-left-title">
                                                <a class="hotels-list-item-left-title--text link-unstyled"
                                                   href="/hotel/{{ $hotel->id }}?{{ http_build_query($query) }}">
                                                    {{ $hotel->name }}
                                                </a>

                                                @for($i = 0; $i < intval($hotel->reviews->avg('stars')); $i++)
                                                    <img
                                                        src="/img/svg/star.svg"
                                                        alt=""
                                                        class="hotels-list-item-title--img">
                                                @endfor
                                            </div>

                                            <p class="hotels-list-item--subtitle">
                                                {{ $city->city }},
                                                {{ $city->area }}
                                            </p>
                                        </div>

                                        <div class="hotels-list-item-right">
                                            <div class="hotels-list-item-right-reviews">
                                                <p class="hotels-list-item-right-reviews--text">
                                                    <span>
                                                        {{ $reviewsAverageMarkText }}
                                                    </span>

                                                    {{ $hotel->reviews->count() }} відгуків
                                                </p>

                                                <p class="hotels-list-item-right-reviews--mark hotel-reviews--mark">
                                                    <span>{{ $reviewsAverageMark }}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            @include('layouts.empty-section')
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
