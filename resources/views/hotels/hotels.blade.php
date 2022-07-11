@extends('layouts.app')

@section('title', config('app.name', 'Laravel') . ': Знайдено ' . $hotels->count()  . ' помешкання')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3">
                @include('layouts.search-sidebar')
            </div>
            <div class="col-9">
                <div class="hotels">
                    <p class="hotels--title">
                        {{ 'назва міста' }}: знайдено {{ $hotels->count() }} помешкання
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
                                        <a href="/hotel/{{ $hotel->id }}">
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
                                                   href="/hotel/{{ $hotel->id }}">
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
