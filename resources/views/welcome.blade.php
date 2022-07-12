@extends('layouts.app')

@section('title', config('app.name', 'Laravel') . ': Мандруйте Україною. Почніть з помешкання')

@section('content')
    <div class="bg-main">
        <div class="container mt-3 mb-3">
            <header>
                <h1 class="header--title py-5">Мандруйте Україною. Почніть з помешкання</h1>
            </header>
        </div>
    </div>

    <div class="container">
        <div class="search">
            <form action="/search" method="get">
                <div class="row align-items-end">
                    <div class="col-4">
                        <label for="city">Куди ви вирушаєте?</label>
                        <select class="form-select form-control search--input sidebar--input"
                                name="city"
                                id="city"
                                required>
                            <option value="">Оберіть місто</option>

                            @foreach($cities as $city)
                                <option
                                    {{ old('city') == $city->id ? 'selected' : '' }}
                                    value="{{ $city->id }}"
                                    data-subtext="{{ $city->city }}">
                                    {{ $city->city }} ({{ $city->area }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-2">
                        <label for="arrival">Заїзд</label>
                        <input
                            type="date"
                            name="arrival"
                            id="arrival"
                            class="form-control search--input sidebar--input"
                            required>
                    </div>

                    <div class="col-2">
                        <label for="departure">Виїзд</label>
                        <input
                            type="date"
                            name="departure"
                            id="departure"
                            class="form-control search--input sidebar--input"
                            required>
                    </div>

                    <div class="col-1">
                        <label for="peopleNumber">Кількість людей</label>
                        <input
                            type="number"
                            name="peopleNumber"
                            id="peopleNumber"
                            class="form-control search--input sidebar--input"
                            min="1"
                            required>
                    </div>

                    <div class="col-1">
                        <label for="roomsNumber">Кількість номерів</label>
                        <input
                            type="number"
                            name="roomsNumber"
                            id="roomsNumber"
                            class="form-control search--input sidebar--input"
                            min="1"
                            required>
                    </div>

                    <div class="col-2">
                        <button type="submit" class="btn search--input search--btn btn-first">Шукати</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="container mt-2">
        <section>
            <p class="section--title">Пошук популярними містами України</p>
            <div class="row">
                @foreach($topCities as $city)
                    @php
                        $cityNames = \Illuminate\Support\Facades\DB::table('cities')->where('id', $city['city'])->first();
                    @endphp
                    <div class="col-6 col-md-3">
                        <a class="areas-item--title" href="/search?city={{ $city['city'] }}">
                            {{ $cityNames->city . ' (' . $cityNames->area . ')' }}
                        </a>
                        <p class="areas-item--subtitle">{{ $city['count(*)'] }} помешкань</p>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection
