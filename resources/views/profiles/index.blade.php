@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="profile--title">Профіль</h1>

        <div class="row">
            <div class="col-3">
                <img
                    src="{{ $profile->getAvatar() }}"
                    alt=""
                    class="profile-avatar--img">
            </div>

            <div class="col-4">
                <p class="profile--subtitle">
                    <span>Ім'я прізвище:</span>
                    {{ $profile->name ?? 'Немає даних' }}
                </p>

                <p class="profile--subtitle">
                    <span>Дата народження:</span>
                    {{ $profile->birthdate ?? 'Немає даних' }}
                </p>

                <p class="profile--subtitle">
                    <span>Країна:</span>
                    {{ $profile->getCountryName() ?? 'Немає даних' }}
                </p>
            </div>

            <div class="col-4">
                <p class="profile--subtitle">
                    <span>Кількість бронювань:</span>
                    {{ $profile->bookings->where('status', 3)->count() }}
                </p>

                <p class="profile--subtitle">
                    <span>Кількість відгуків:</span>
                    {{ $profile->reviews->count() }}
                </p>
            </div>
        </div>
    </div>
@endsection
