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
                    <div class="col-lg-4 col-sm-6 col-12">
                        @error('city')
                            {{ $message }}
                        @else
                            <label for="city">Куди ви вирушаєте?</label>
                        @enderror

                        <select class="form-select form-control search--input sidebar--input @error('city') is-invalid @enderror"
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

                    <div class="col-lg-2 col-sm-3 col-6">
                        @error('arrival')
                            {{ $message }}
                        @else
                            <label for="arrival">Заїзд</label>
                        @enderror

                        <input
                            value="{{ old('arrival') }}"
                            type="date"
                            name="arrival"
                            id="arrival"
                            class="form-control search--input sidebar--input @error('arrival') is-invalid @enderror"
                            required>
                    </div>

                    <div class="col-lg-2 col-sm-3 col-6">
                        @error('departure')
                            {{ $message }}
                        @else
                            <label for="departure">Виїзд</label>
                        @enderror

                        <input
                            value="{{ old('departure') }}"
                            type="date"
                            name="departure"
                            id="departure"
                            class="form-control search--input sidebar--input @error('departure') is-invalid @enderror"
                            required>
                    </div>

                    <div class="col-lg-1 col-sm-6 mt-sm-2 col-6">
                        @error('peopleNumber')
                            {{ $message }}
                        @else
                            <label for="peopleNumber">Кількість людей</label>
                        @enderror

                        <input
                            value="{{ old('peopleNumber') }}"
                            type="number"
                            name="peopleNumber"
                            id="peopleNumber"
                            class="form-control search--input sidebar--input @error('peopleNumber') is-invalid @enderror"
                            min="1"
                            required>
                    </div>

                    <div class="col-lg-1 col-sm-6 col-6">
                        @error('roomsNumber')
                            {{ $message }}
                        @else
                            <label for="roomsNumber">Кількість номерів</label>
                        @enderror

                        <input
                            value="{{ old('roomsNumber') }}"
                            type="number"
                            name="roomsNumber"
                            id="roomsNumber"
                            class="form-control search--input sidebar--input @error('roomsNumber') is-invalid @enderror"
                            min="1"
                            required>
                    </div>

                    <div class="col-lg-2 col-sm-12 mt-sm-4">
                        <button type="submit" class="btn search--input search--btn btn-first">Шукати</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="container mt-2">
        @if($topCities->count() > 0)
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
        @endif
    </div>
@endsection
