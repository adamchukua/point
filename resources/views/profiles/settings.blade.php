@extends('layouts.app')

@section('content')
    <div class="container">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="/profile/settings">Налаштування</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/profile/bookings">Бронювання</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/profile/reviews">Відгуки</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/profile/saved">Збережене</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/profile/apartments">Помешкання</a>
            </li>
        </ul>

        <form action="/profile/{{ $user->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="row">
                <label for="name" class="col-form-label">Ім'я прізвище</label>
            </div>

            <div>
                <input id="name"
                       type="text"
                       class="form-control @error('name') is-invalid @enderror"
                       name="name"
                       value="{{ old('name') }}" required autocomplete="name">

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="row">
                <label for="birthdate" class="col-form-label">Дата народження</label>
            </div>

            <div>
                <input id="birthdate"
                       type="date"
                       class="form-control @error('birthdate') is-invalid @enderror"
                       name="birthdate"
                       value="{{ old('birthdate') }}" required autocomplete="birthdate">

                @error('birthdate')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="row">
                <label for="country" class="col-form-label">Країна</label>
            </div>

            <div>
                @include('layouts.countries')
            </div>

            <button type="submit" class="w-100 btn btn-first">
                Зберігти
            </button>
        </form>
    </div>
@endsection
