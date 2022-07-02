@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row pt-5 pb-5">
            <div class="col-12 col-md-6 col-lg-8 d-flex align-items-center">
                <h1 class="join--title pb-4">
                    @guest
                        <a href="{{ route('register') }}" class="link-dark">Реєструйтеся</a> та почніть
                    @else
                        Почніть
                    @endif
                     зустрічати гостей вже сьогодні!</h1>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="join-info">
                    <p class="join-info--title">Зареєструйте нове помешкання</p>
                    <ul class="join-info-list list-unstyled">
                        <li class="join-info-list--item">Понад 6,4 млн зареєстрованих помешкань для відпустки</li>
                        <li class="join-info-list--item">Більше ніж 1 млрд заїздів у помешкання для відпустки</li>
                        <li class="join-info-list--item">Понад 40% щойно зареєстрованих помешкань для відпустки отримують своє перше бронювання протягом тижня</li>
                    </ul>
                    <a class="btn btn-first w-100" href="{{ route('register') }}">Почати</a>
                </div>
            </div>
        </div>
    </div>
@endsection
