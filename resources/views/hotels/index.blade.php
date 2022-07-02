@extends('layouts.app')

@section('content')
    <div class="bg-main">
        <div class="container mt-3 mb-5">
            <header>
                <h1 class="header--title py-5">Мандруйте Україною. Почніть з помешкання</h1>
            </header>
        </div>
    </div>

    <div class="container">
        <div class="search">
            <form action="" method="get">
                <div class="row" >
                    <div class="col-5">
                        <input type="text" placeholder="Куди Ви вирушаєте?" class="form-control search--input">
                    </div>

                    <div class="col-2">
                        <button class="form-control search--input">Заїзд – виїзд</button>
                    </div>

                    <div class="col-3">
                        <button class="form-control search--input">2 людини | 1 номер</button>
                    </div>

                    <div class="col-2">
                        <button type="submit" class="btn search--input search--btn btn-first">Шукати</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="container mt-2">
        <section>
            <p class="section--title">Пошук областями України</p>
            <div class="row">
                <div class="col-6 col-md-3 col-lg-2">
                    <div class="areas-item">
                        <a class="areas-item--title">Автономна Республіка Крим</a>
                        <p class="areas-item--subtitle">1 000 помешкань</p>
                    </div>

                    <div class="areas-item">
                        <a class="areas-item--title">Вінницька область</a>
                        <p class="areas-item--subtitle">1 000 помешкань</p>
                    </div>

                    <div class="areas-item">
                        <a class="areas-item--title">Волинська область</a>
                        <p class="areas-item--subtitle">1 000 помешкань</p>
                    </div>

                    <div class="areas-item">
                        <a class="areas-item--title">Дніпропетровська область</a>
                        <p class="areas-item--subtitle">1 000 помешкань</p>
                    </div>

                    <div class="areas-item">
                        <a class="areas-item--title">Чернігівська область</a>
                        <p class="areas-item--subtitle">1 000 помешкань</p>
                    </div>
                </div>

                <div class="col-6 col-md-3 col-lg-2">
                    <div class="areas-item">
                        <a class="areas-item--title">Донецька область</a>
                        <p class="areas-item--subtitle">1 000 помешкань</p>
                    </div>

                    <div class="areas-item">
                        <a class="areas-item--title">Житомирська область</a>
                        <p class="areas-item--subtitle">1 000 помешкань</p>
                    </div>

                    <div class="areas-item">
                        <a class="areas-item--title">Закарпатська область</a>
                        <p class="areas-item--subtitle">1 000 помешкань</p>
                    </div>

                    <div class="areas-item">
                        <a class="areas-item--title">Запорізька область</a>
                        <p class="areas-item--subtitle">1 000 помешкань</p>
                    </div>

                    <div class="areas-item">
                        <a class="areas-item--title">місто Київ</a>
                        <p class="areas-item--subtitle">1 000 помешкань</p>
                    </div>
                </div>

                <div class="col-6 col-md-3 col-lg-2">
                    <div class="areas-item">
                        <a class="areas-item--title">Івано-Франківська область</a>
                        <p class="areas-item--subtitle">1 000 помешкань</p>
                    </div>

                    <div class="areas-item">
                        <a class="areas-item--title">Київська область</a>
                        <p class="areas-item--subtitle">1 000 помешкань</p>
                    </div>

                    <div class="areas-item">
                        <a class="areas-item--title">Кіровоградська область</a>
                        <p class="areas-item--subtitle">1 000 помешкань</p>
                    </div>

                    <div class="areas-item">
                        <a class="areas-item--title">Луганська область</a>
                        <p class="areas-item--subtitle">1 000 помешкань</p>
                    </div>

                    <div class="areas-item">
                        <a class="areas-item--title">місто Севастополь</a>
                        <p class="areas-item--subtitle">1 000 помешкань</p>
                    </div>
                </div>

                <div class="col-6 col-md-3 col-lg-2">
                    <div class="areas-item">
                        <a class="areas-item--title">Львівська область</a>
                        <p class="areas-item--subtitle">1 000 помешкань</p>
                    </div>

                    <div class="areas-item">
                        <a class="areas-item--title">Миколаївська область</a>
                        <p class="areas-item--subtitle">1 000 помешкань</p>
                    </div>

                    <div class="areas-item">
                        <a class="areas-item--title">Одеська область</a>
                        <p class="areas-item--subtitle">1 000 помешкань</p>
                    </div>

                    <div class="areas-item">
                        <a class="areas-item--title">Полтавська область</a>
                        <p class="areas-item--subtitle">1 000 помешкань</p>
                    </div>
                </div>

                <div class="col-6 col-md-3 col-lg-2">
                    <div class="areas-item">
                        <a class="areas-item--title">Рівненська область</a>
                        <p class="areas-item--subtitle">1 000 помешкань</p>
                    </div>

                    <div class="areas-item">
                        <a class="areas-item--title">Сумська область</a>
                        <p class="areas-item--subtitle">1 000 помешкань</p>
                    </div>

                    <div class="areas-item">
                        <a class="areas-item--title">Тернопільська область</a>
                        <p class="areas-item--subtitle">1 000 помешкань</p>
                    </div>

                    <div class="areas-item">
                        <a class="areas-item--title">Харківська область</a>
                        <p class="areas-item--subtitle">1 000 помешкань</p>
                    </div>
                </div>

                <div class="col-6 col-md-3 col-lg-2">
                    <div class="areas-item">
                        <a class="areas-item--title">Херсонська область</a>
                        <p class="areas-item--subtitle">1 000 помешкань</p>
                    </div>

                    <div class="areas-item">
                        <a class="areas-item--title">Хмельницька область</a>
                        <p class="areas-item--subtitle">1 000 помешкань</p>
                    </div>

                    <div class="areas-item">
                        <a class="areas-item--title">Черкаська область</a>
                        <p class="areas-item--subtitle">1 000 помешкань</p>
                    </div>

                    <div class="areas-item">
                        <a class="areas-item--title">Чернівецька область</a>
                        <p class="areas-item--subtitle">1 000 помешкань</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
