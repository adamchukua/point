<div class="sidebar">
    <p class="sidebar--title">Шукати</p>

    <form action="/search" method="get">
        <div class="mb-2">
            @error('city')
                {{ $message }}
            @else
                <label for="city">Куди ви вирушаєте?</label>
            @enderror
        </div>

        <select class="form-select form-control search--input sidebar--input @error('city') is-invalid @enderror"
                name="city"
                id="city"
                required>
            <option value="">Оберіть місто</option>

            @foreach($cities as $city)
                <option
                    {{ $query['city'] ?? null == $city->id ? 'selected' : '' }}
                    value="{{ $city->id }}"
                    data-subtext="{{ $city->city }}">
                    {{ $city->city }} ({{ $city->area }})
                </option>
            @endforeach
        </select>

        <div class="mb-2">
            @error('arrival')
                {{ $message }}
            @else
                <label for="arrival">Заїзд</label>
            @enderror
        </div>

        <input
            type="date"
            name="arrival"
            id="arrival"
            value="{{ $query['arrival'] ?? '' }}"
            class="form-control search--input sidebar--input @error('arrival') is-invalid @enderror">

        <div class="mb-2">
            @error('departure')
                {{ $message }}
            @else
                <label for="departure" class="mb-2">Виїзд</label>
            @enderror
        </div>

        <input
            type="date"
            name="departure"
            id="departure"
            value="{{ $query['departure'] ?? '' }}"
            class="form-control search--input sidebar--input @error('departure') is-invalid @enderror">

        <div class="mb-2">
            @error('peopleNumber')
                {{ $message }}
            @else
                <label for="peopleNumber">Кількість людей</label>
            @enderror
        </div>

        <input
            type="number"
            name="peopleNumber"
            id="peopleNumber"
            value="{{ $query['peopleNumber'] ?? '' }}"
            class="form-control search--input sidebar--input @error('peopleNumber') is-invalid @enderror"
            min="1">

        <div class="mb-2">
            @error('roomsNumber')
                {{ $message }}
            @else
                <label for="roomsNumber">Кількість номерів</label>
            @enderror
        </div>

        <input
            type="number"
            name="roomsNumber"
            id="roomsNumber"
            value="{{ $query['roomsNumber'] ?? '' }}"
            class="form-control search--input sidebar--input @error('roomsNumber') is-invalid @enderror"
            min="1">

        <button
            type="submit"
            class="btn search--btn sidebar--input sidebar--btn btn-first">
            Шукати
        </button>
    </form>
</div>
