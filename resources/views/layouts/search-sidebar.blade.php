<div class="sidebar">
    <p class="sidebar--title">Шукати</p>

    <form action="/search" method="get">
        <label for="city" class="mb-2">Куди ви вирушаєте?</label>
        <select class="form-select form-control search--input sidebar--input"
                name="city"
                id="city"
                required>
            <option value="">Оберіть місто</option>

            @foreach($cities as $city)
                <option
                    {{ $query['city'] == $city->id ? 'selected' : '' }}
                    value="{{ $city->id }}"
                    data-subtext="{{ $city->city }}">
                    {{ $city->city }} ({{ $city->area }})
                </option>
            @endforeach
        </select>

        <label for="arrival" class="mb-2">Заїзд</label>
        <input
            type="date"
            name="arrival"
            id="arrival"
            value="{{ $query['arrival'] ?? '' }}"
            class="form-control search--input sidebar--input">

        <label for="departure" class="mb-2">Виїзд</label>
        <input
            type="date"
            name="departure"
            id="departure"
            value="{{ $query['departure'] ?? '' }}"
            class="form-control search--input sidebar--input">

        <label for="peopleNumber" class="mb-2">Кількість людей</label>
        <input
            type="number"
            name="peopleNumber"
            id="peopleNumber"
            value="{{ $query['peopleNumber'] ?? '' }}"
            class="form-control search--input sidebar--input"
            min="1">

        <label for="roomsNumber" class="mb-2">Кількість номерів</label>
        <input
            type="number"
            name="roomsNumber"
            id="roomsNumber"
            value="{{ $query['roomsNumber'] ?? '' }}"
            class="form-control search--input sidebar--input"
            min="1">

        <button type="submit" class="btn search--btn sidebar--input sidebar--btn btn-first">Шукати</button>
    </form>
</div>
