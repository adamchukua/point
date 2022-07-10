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
                    <p class="hotels--title">Одеська область: знайдено {{ $hotels->count() }} помешкання</p>

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

                                <div class="col-9">
                                    <a href="/hotel/{{ $hotel->id }}">
                                        <p class="hotels-list-item--title">{{ $hotel->name }}</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        There is no
                    @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
