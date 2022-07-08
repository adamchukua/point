@extends('layouts.app')

@section('title', config('app.name', 'Laravel') . ': Налаштування')

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

        <h1 class="profile--title">Налаштування</h1>

        <div class="row">
            <div class="col-3">
                <label for="avatar" class="profile-avatar">
                    <img
                        src="{{ $user->profile->getAvatar() }}"
                        alt=""
                        class="profile-avatar--img">

                    <p class="profile-avatar--hided">Змінити аватар</p>
                </label>
            </div>

            <div class="col-6">
                <form action="/profile/settings" method="post" enctype="multipart/form-data">
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
                               value="{{ old('name') ?? $user->profile->name }}" autocomplete="name">

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
                               value="{{ old('birthdate') ?? $user->profile->birthdate }}" autocomplete="birthdate">

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
                        <select class="form-select" name="country">
                            <option value="">Оберіть країну проживання</option>

                            @foreach($countries as $country)
                                <option
                                    value="{{ $country->code }}"
                                    {{ $country->code == $user->profile->country ? 'selected' : '' }}>
                                    {{ $country->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-none">
                        <div class="row">
                            <label for="avatar" class="col-form-label">Аватар</label>
                        </div>

                        <input type="file" class="form-control-file" id="avatar" name="avatar">
                    </div>

                    @error('avatar')
                        <strong>{{ $message }}</strong>
                    @enderror

                    <button type="submit" class="btn btn-first mt-4">
                        Зберегти
                    </button>
                </form>
            </div>

            <div class="col-3">
                @if($user->hasVerifiedEmail() == null)
                    @include('layouts.verification')
                @else
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Акаунт верифіковано!</h4>

                        <p>Тепер Ви можете бронювати і залишати відгуки на сайті.</p>
                    </div>
                @endif

                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Видалити акаунт</h4>

                    <form class="d-inline" method="get" action="/profile/delete">
                        @csrf

                        <p class="mb-0">
                            Якщо Ви забажали видалити свій акаунт натисніть
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline alert-link">сюди</button>. Пам'ятайте, що ця дія незворотня!
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
