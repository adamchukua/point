@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3">
                @include('layouts.search-sidebar')
            </div>
            <div class="col-9">
                <div class="hotels">
                    <p class="hotels--title">Одеська область: знайдено 1 100 помешкання</p>

                    <ul class="nav nav-tabs d-flex justify-content-around mb-2 nav-tabs__bg">
                        <li class="nav-item">
                            <a class="nav-link" href="">Ціна (спершу найнижча)</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="">Ціна (спершу найдорожче)</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="">Ціна і якість</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="">Найпопулярніше</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="">Зірки (спершу найнижче)</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="">Зірки (спершу найбільше)</a>
                        </li>
                    </ul>

                    <div class="hotels-list">
                        <div class="hotels-list-item">
                            <div class="row">
                                <div class="col-3">
                                    <img src="https://t-cf.bstatic.com/xdata/images/hotel/square600/264768057.webp?k=829c8a5f08236d52259307223c1bd539ec9217cf1df877d46aa0b8bb93a2901e&o=&s=1" alt="">
                                </div>

                                <div class="col-9">
                                    <p class="hotels-list-item--title">Arcadia apartment & sea terrace</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
