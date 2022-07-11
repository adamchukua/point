@extends('layouts.app')

@section('title', config('app.name', 'Laravel') . ': Створення Вашого помешкання')

@section('content')
    <div class="container">

        <h1 class="profile--title">
            Редагувати відгук на бронювання
            <a href="" class="link-unstyled">{{ $review->hotel->name }}</a>
        </h1>

            <form action="/profile/reviews/{{ $review->id }}/edit" method="post">
                @csrf
                @method('PATCH')

                <div class="row">
                    <div class="col-6">
                        <label for="name" class="col-form-label">Заголовок</label>

                        <input id="name"
                               type="text"
                               class="form-control @error('title') is-invalid @enderror"
                               name="title"
                               value="{{ $review->title ?? old('title') }}" autocomplete="title">

                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <label for="description" class="col-form-label">Текст*</label>

                        <textarea
                            class="form-control @error('text') is-invalid @enderror"
                            id="text"
                            required
                            name="text"
                            rows="5">
                            {{ $review->text ?? old('text') }}
                        </textarea>

                        @error('text')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <label for="description" class="col-form-label">Переваги</label>

                        <textarea
                            class="form-control @error('pros') is-invalid @enderror"
                            id="pros"
                            name="pros"
                            rows="3">
                            {{ $review->pros ?? old('pros') }}
                        </textarea>

                        @error('pros')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <label for="description" class="col-form-label">Недоліки</label>

                        <textarea
                            class="form-control @error('cons') is-invalid @enderror"
                            id="cons"
                            name="cons"
                            rows="3">
                            {{ $review->cons ?? old('cons') }}
                        </textarea>

                        @error('cons')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <p class="profile--subtitle pt-3 font-weight-bolder">Оцінки за категоріями</p>

                <div class="row">
                    <div class="col-3">
                        <label for="personnel_mark" class="col-form-label">Персонал*</label>

                        <input id="personnel_mark"
                               type="number"
                               class="form-control @error('personnel_mark') is-invalid @enderror"
                               name="personnel_mark"
                               max="10"
                               min="0"
                               required
                               value="{{ $review->personnel_mark ?? old('personnel_mark') }}" autocomplete="personnel_mark">

                        @error('personnel_mark')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-3">
                        <label for="comfort_mark" class="col-form-label">Комфорт*</label>

                        <input id="comfort_mark"
                               type="number"
                               class="form-control @error('comfort_mark') is-invalid @enderror"
                               name="comfort_mark"
                               max="10"
                               min="0"
                               required
                               value="{{ $review->comfort_mark ?? old('comfort_mark') }}" autocomplete="comfort_mark">

                        @error('comfort_mark')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-3">
                        <label for="free_wifi_mark" class="col-form-label">Безкоштовний Wi-Fi*</label>

                        <input id="free_wifi_mark"
                               type="number"
                               class="form-control @error('free_wifi_mark') is-invalid @enderror"
                               name="free_wifi_mark"
                               max="10"
                               min="0"
                               required
                               value="{{ $review->free_wifi_mark ?? old('free_wifi_mark') }}" autocomplete="free_wifi_mark">

                        @error('free_wifi_mark')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-3">
                        <label for="amenities_mark" class="col-form-label">Зручності*</label>

                        <input id="amenities_mark"
                               type="number"
                               class="form-control @error('amenities_mark') is-invalid @enderror"
                               name="amenities_mark"
                               max="10"
                               min="0"
                               required
                               value="{{ $review->amenities_mark ?? old('amenities_mark') }}" autocomplete="amenities_mark">

                        @error('amenities_mark')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-3">
                        <label for="price_quality_mark" class="col-form-label">Співвідношення ціна/якість*</label>

                        <input id="price_quality_mark"
                               type="number"
                               class="form-control @error('price_quality_mark') is-invalid @enderror"
                               name="price_quality_mark"
                               max="10"
                               min="0"
                               required
                               value="{{ $review->amenities_mark ?? old('price_quality_mark') }}" autocomplete="price_quality_mark">

                        @error('amenities_mark')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-3">
                        <label for="purity_mark" class="col-form-label">Чистота*</label>

                        <input id="purity_mark"
                               type="number"
                               class="form-control @error('purity_mark') is-invalid @enderror"
                               name="purity_mark"
                               max="10"
                               min="0"
                               required
                               value="{{ $review->purity_mark ?? old('purity_mark') }}" autocomplete="purity_mark">

                        @error('purity_mark')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-3">
                        <label for="location_mark" class="col-form-label">Розташування*</label>

                        <input id="location_mark"
                               type="number"
                               class="form-control @error('location_mark') is-invalid @enderror"
                               name="location_mark"
                               max="10"
                               min="0"
                               required
                               value="{{ $review->location_mark ?? old('location_mark') }}" autocomplete="location_mark">

                        @error('location_mark')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="col-3">
                    <label for="stars" class="col-form-label">Кількість зірок*</label>

                    <input id="stars"
                           type="number"
                           class="form-control @error('stars') is-invalid @enderror"
                           name="stars"
                           max="5"
                           min="1"
                           required
                           value="{{ $review->stars ?? old('stars') }}" autocomplete="stars">

                    @error('stars')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <p class="py-3">* - поля, обов'язкові до заповнення</p>

                <button type="submit" class="btn btn-first mt-4">
                    Зберегти
                </button>
            </form>
        </div>
    </div>
@endsection
