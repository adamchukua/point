@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="profile--title">Створення Вашого помешкання</h1>

        <div class="row">
            <div class="col-6">
                <form action="/profile/apartments/create" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <label for="name" class="col-form-label">Назва</label>
                    </div>

                    <div>
                        <input id="name"
                               type="text"
                               class="form-control @error('name') is-invalid @enderror"
                               name="name"
                               required
                               value="{{ old('name') }}" autocomplete="name">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="row">
                        <label for="type" class="col-form-label">Тип помешкання</label>
                    </div>

                    <select class="form-select" name="type">
                        <option selected>Оберіть тип помешкання</option>

                        <option value="apartment">Апаратаменти</option>
                        <option value="hotel">Готель</option>
                        <option value="holiday_homes">Будинок для відпочинку</option>
                        <option value="guest_house">Гостьовий будинок</option>
                        <option value="hostel">Хостел</option>
                        <option value="villa">Вілла</option>
                        <option value="in_a_family">Розміщення в сім'ї</option>
                        <option value="bed_and_breakfast">Готель типу "ліжко і сніданок"</option>
                        <option value="camping">Кемпінг</option>
                        <option value="country_house">Заміський будинок</option>
                        <option value="resort_hotel">Курортний готель</option>
                        <option value="park_hotel">Парк-готель</option>
                    </select>

                    <div class="row">
                        <label for="address" class="col-form-label">Адреса</label>
                    </div>

                    <div>
                        <input id="address"
                               type="text"
                               required
                               class="form-control @error('address') is-invalid @enderror"
                               name="address"
                               value="{{ old('address') }}" autocomplete="name">

                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="row">
                        <label for="description" class="col-form-label">Опис помешкання</label>
                    </div>

                    <div>
                        <textarea
                            class="form-control @error('description') is-invalid @enderror"
                            id="description"
                            required
                            name="description"
                            rows="5">
                            {{ old('description') }}
                        </textarea>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-first mt-4">
                        Зберегти
                    </button>
                </form>
            </div>

            <div class="col-6">
                Додайте зображення готелю
            </div>
        </div>
    </div>
@endsection
