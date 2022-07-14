@extends('layouts.app')

@section('title', config('app.name', 'Laravel') . ': Бронювання')

@section('content')
    <div class="container">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="/profile/settings">Налаштування</a>
            </li>

            <li class="nav-item">
                <a class="nav-link active" href="/profile/bookings">Бронювання</a>
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

        <h1 class="profile--title">Бронювання</h1>

        <div class="profile-list">
            @forelse($bookings as $booking)
                <div class="profile-list-item d-flex justify-content-between">
                    @if($booking->status != 5)
                        <div class="profile-list-item-left d-flex justify-content-between">
                            <a href="/hotel/{{ $booking->room->hotel->id  }}">
                                <img
                                    src="/storage/{{ $booking->room->hotel->hotelPhotos()->first()->image }}"
                                    alt=""
                                    class="profile-list-item-left--img"
                                >
                            </a>

                            <a href="/hotel/{{ $booking->room->hotel->id  }}" class="link-unstyled">
                                <div
                                    class="profile-list-item-left-text
                                {{ $booking->status == 2 ? 'text-muted' : '' }}">
                                    <p class="profile-list-item-left-text--subtitle">
                                        #{{ $booking->id }}
                                    </p>

                                    <p class="profile-list-item-left-text--title">
                                        {{ $booking->room->hotel->name }}
                                    </p>

                                    <p class="profile-list-item-left-text--subtitle">
                                        {{ $booking->arrival }} – {{ $booking->departure }}
                                    </p>

                                    <p class="profile-list-item-left-text--subtitle">
                                        Статус: {{ $booking->getStatusText() }}
                                    </p>
                                </div>
                            </a>
                        </div>

                        <div class="profile-list-item-right d-flex align-items-start">
                            <div class="dropdown">
                                <button
                                    class="btn profile-list-item-right--btn"
                                    type="button" id="dropdownMenu{{ 0 }}"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <img src="/img/svg/more.svg" alt="" title="Властивості">
                                </button>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                                    <li>
                                        <a class="dropdown-item" href="/hotel/{{ $booking->room->hotel->id }}">
                                            Сторінка готелю
                                        </a>
                                    </li>

                                    <li>
                                        @if($booking->status == 3)
                                            <a
                                                class="dropdown-item"
                                                href="/profile/bookings/{{ $booking->room->hotel->id }}/review/add">
                                                Залишити відгук
                                            </a>
                                        @else
                                            <button
                                                class="dropdown-item text-muted mb-0"
                                                title="Відгук можна залишити тільки після виконаного бронювання">
                                                Залишити відгук
                                            </button>
                                        @endif
                                    </li>

                                    <li>
                                        @if($booking->status <= 1)
                                            <form
                                                action="/booking/{{ $booking->id }}/cancel"
                                                method="post">
                                                @csrf

                                                <button type="submit" class="dropdown-item">Скасувати</button>
                                            </form>
                                        @else
                                            <button
                                                class="dropdown-item text-muted mb-0"
                                                title="Це бронювання не можна скасувати">
                                                Скасувати
                                            </button>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @else

                    @endif
                </div>
            @empty
                @include('layouts.empty-section')
            @endforelse

            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    {{ $bookings->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
