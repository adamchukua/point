@extends('layouts.app')

@section('title', config('app.name', 'Laravel') . ': Створення Вашого помешкання')

@section('content')
    <div class="container">

        <h1 class="profile--title">
            Відгук на бронювання
            <a href="">{{ "назва готелю" }}</a>
        </h1>

            <form action="/profile/apartments/create" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <label for="name" class="col-form-label">Заголовок</label>
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
                            <label for="description" class="col-form-label">Текст</label>
                        </div>

                        <div>
                            <textarea
                                class="form-control @error('description') is-invalid @enderror"
                                id="description"
                                required
                                name="description"
                                rows="5">
                                {{ trim(old('description')) }}
                            </textarea>

                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-first mt-4">
                    Зберегти
                </button>
            </form>
        </div>
    </div>
@endsection
