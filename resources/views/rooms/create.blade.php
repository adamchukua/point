@extends('layouts.app')

@section('title', config('app.name', 'Laravel') . ': Додавання номеру до ' . $hotel->name)

@section('content')
    <div class="container">

        <h1 class="profile--title">
            Додавання номеру до готелю
            <a href="/hotel/{{ $hotel->id }}" class="link-unstyled">{{ $hotel->name }}</a>
        </h1>

            <form action="/profile/apartments/{{ $hotel->id }}/room/create" method="post">
                @csrf

                <div class="row">
                    <div class="col-6">
                        <label for="type" class="col-form-label">Назва типу номеру</label>

                        <input id="type"
                               type="text"
                               required
                               class="form-control @error('type') is-invalid @enderror"
                               name="type"
                               value="{{ old('type') }}" autocomplete="type">

                        @error('type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <label for="type" class="col-form-label">Місткість</label>

                        <input id="contains"
                               type="number"
                               min="1"
                               required
                               class="form-control @error('contains') is-invalid @enderror"
                               name="contains"
                               value="{{ old('contains') }}" autocomplete="type">

                        @error('contains')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <label for="type" class="col-form-label">Ціна</label>

                        <input id="price"
                               type="number"
                               min="1"
                               required
                               class="form-control @error('price') is-invalid @enderror"
                               name="price"
                               value="{{ old('price') }}" autocomplete="type">

                        @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <label for="type" class="col-form-label">Кількість</label>

                        <input id="number"
                               type="number"
                               min="1"
                               required
                               class="form-control @error('number') is-invalid @enderror"
                               name="number"
                               value="{{ old('number') }}" autocomplete="type">

                        @error('number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <label for="comment" class="col-form-label">Коментар (необов'язково)</label>

                        <textarea
                            class="form-control @error('comment') is-invalid @enderror"
                            id="comment"
                            name="comment"
                            rows="2">
                            {{ trim(old('comment')) }}
                        </textarea>

                        @error('comment')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-first mt-4">
                    Зберегти
                </button>
            </form>
        </div>
    </div>
@endsection
