@extends('layouts.app')

@section('title', config('app.name', 'Laravel') . ': Помешкання')

@section('content')
    <div class="container">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="/profile/settings">Налаштування</a>
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
                <a class="nav-link active" href="/profile/apartments">Помешкання</a>
            </li>
        </ul>

        <div class="d-flex justify-content-between align-items-center">
            <h1 class="profile--title">Помешкання</h1>
            <a href="/profile/apartments/create" class="btn btn-first">Додати своє помешкання</a>
        </div>

        @if($user->hasVerifiedEmail() == null)
            @include('layouts.verification')
        @else
            @forelse($hotels as $hotel)
                <a href="/hotel/{{ $hotel->id }}" class="link-unstyled">
                    <div class="profile-list">
                        <div class="profile-list-item d-flex justify-content-between">
                            <div class="profile-list-item-left d-flex justify-content-between">
                                <img
                                    src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(73).webp"
                                    alt=""
                                    class="profile-list-item-left--img"
                                >

                                <div class="profile-list-item-left-text">
                                    <p class="profile-list-item-left-text--title">
                                        {{ $hotel->name }}
                                    </p>

                                    <p class="profile-list-item-left-text--subtitle">
                                        Додано: {{ $hotel->created }}
                                    </p>

                                    <p class="profile-list-item-left-text--subtitle">
                                        Відгуки: {{ $hotel->reviews->count() }}
                                    </p>
                                </div>
                            </div>

                            <div class="profile-list-item-right d-flex align-items-start">
                                <button class="btn profile-list-item-right--btn">
                                    <img src="/img/svg/more.svg" alt="" title="Властивості">
                                </button>
                            </div>
                        </div>
                    </div>
                </a>
            @empty
                @include('layouts.empty-section')
            @endforelse
        @endif
    </div>
@endsection
