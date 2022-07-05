@extends('layouts.app')

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

        <h1 class="profile--title">Помешкання</h1>

        @if($user->hasVerifiedEmail() == null)
            @include('layouts.verification')
        @else
            <a href="/profile/apartments/create" class="btn btn-first">Додати своє помешкання</a>

            @forelse($hotels as $hotel)
                <div class="profile-list">
                    <div class="profile-list-item d-flex justify-content-between">
                        <div class="profile-list-item-left d-flex justify-content-between">
                            <img
                                src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(73).webp"
                                alt=""
                                class="profile-list-item-left--img"
                            >

                            <div>
                                <p class="profile-list-item-left--title">
                                    {{ $hotel->name }}
                                </p>

                                <p class="profile-list-item-left--subtitle">
                                    Додано
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
            @empty
                There is no...
            @endforelse
        @endif
    </div>
@endsection
