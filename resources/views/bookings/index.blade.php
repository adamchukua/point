@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="profile--title">
            Всі бронювання
            <a href="/hotel/{{ $hotel->id }}" class="link-unstyled">{{ $hotel->name }}</a>
        </h1>

        <ul class="nav nav-tabs d-flex justify-content-around mb-2 nav-tabs__bg">
            <li class="nav-item">
                <a class="nav-link" href="">
                    Всі <strong>{{ $bookings->count() }}</strong>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="">
                    Очікують на схвалення <strong>{{ $bookings->where('status', 0)->count() }}</strong>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="">
                    Схвалено <strong>{{ $bookings->where('status', 1)->count() }}</strong>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="">
                    Відмовлено <strong>{{ $bookings->where('status', 2)->count() }}</strong>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="">
                    Виконано <strong>{{ $bookings->where('status', 3)->count() }}</strong>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="">
                    Скасовано <strong>{{ $bookings->where('status', 4)->count() }}</strong>
                </a>
            </li>
        </ul>

        <div class="profile-list">
            @forelse($bookings as $booking)
                <div class="profile-list-item profile-list-item__mini">
                    <div class="row">
                        <a
                            class="col-2 d-flex align-items-center link-unstyled"
                            href="/profile/{{ $booking->profile->id }}">
                            <img
                                src="{{ $booking->profile->getAvatar() }}"
                                alt=""
                                class="profile-list-item-left-profile--img">

                            <p class="profile-list-item-left-profile--name">
                                {{ $booking->profile->name ?? 'Анонім' }}
                            </p>
                        </a>

                        <div class="col-3">
                            <p class="profile-list-item-left-text--subtitle">
                                Статус: {{ $booking->getStatusText() }}
                            </p>

                            <p class="profile-list-item-left-text--title">
                                {{ $booking->room->type }}
                            </p>

                            <p class="profile-list-item-left-text--subtitle">
                                {{ $booking->arrival }} – {{ $booking->departure }}
                            </p>
                        </div>

                        @if($booking->status == 0)
                            <div class="col-7 d-flex align-items-center justify-content-end">
                                <form method="post"
                                      action="/booking/{{ $booking->id }}/approve ">
                                    @csrf

                                    <button class="btn btn-second me-3">
                                        Схвалити
                                    </button>
                                </form>

                                <form method="post"
                                      action="/booking/{{ $booking->id }}/disapprove">
                                    @csrf

                                    <button class="btn btn-first">
                                        Відмовити
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                @include('layouts.empty-section')
            @endforelse
        </div>

        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{ $bookings->links() }}
            </div>
        </div>
    </div>
@endsection