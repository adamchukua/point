@extends('layouts.app')

@section('title', config('app.name', 'Laravel') . ': Відгуки')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="profile--title">Сповіщення</h1>

            <form action="/notifications/all-read" method="post">
                @csrf

                <button class="btn">
                    <img src="/img/svg/yes.svg" alt="" title="Позначити все як прочитане" class="profile-title--img">
                </button>
            </form>
        </div>

        <div class="profile-list">
            @foreach($notifications as $notification)
                <div class="profile-list-item profile-list-item__mini d-flex justify-content-between {{ $notification->checked ? 'text-muted' : '' }}">
                    <div class="profile-list-item-left d-flex justify-content-between">
                        <div class="profile-list-item-left-text">
                            <p class="profile-list-item-left-text--title">
                                {{ $notification->title }}
                            </p>

                            <p class="profile-list-item-left-text--subtitle">
                                {{ $notification->text }}
                            </p>
                        </div>
                    </div>

                    <div class="profile-list-item-right d-flex align-items-start">
                        <div class="dropdown">
                            <button class="btn profile-list-item-right--btn" type="button" id="dropdownMenu{{ $notification->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="/img/svg/more.svg" alt="" title="Властивості">
                            </button>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu{{ $notification->id }}">
                                <form action="/notifications/{{ $notification->id }}/read" method="post">
                                    @csrf

                                    <li>
                                        <button type="submit" class="dropdown-item">
                                            Позначити як {{ $notification->checked ? 'не' : '' }} прочитане
                                        </button>
                                    </li>
                                </form>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
