<div class="sidebar">
    <p class="sidebar--title">Шукати</p>

    <form action="" method="get">
        <label for="" class="mb-2">Куди ви вирушаєте?</label>
        <select class="form-select form-control search--input sidebar--input"
                name="city"
                required>
            <option value="">Оберіть місто</option>

            @foreach($cities as $city)
                <option
                    {{ old('city') == $city->id ? 'selected' : '' }}
                    value="{{ $city->id }}"
                    data-subtext="{{ $city->city }}">
                    {{ $city->city }} ({{ $city->area }})
                </option>
            @endforeach
        </select>

        <label for="" class="mb-2">Заїзд</label>
        <input type="date" class="form-control search--input sidebar--input">

        <label for="" class="mb-2">Виїзд</label>
        <input type="date" class="form-control search--input sidebar--input">

        <label for="" class="mb-2">Кількість людей</label>
        <input type="number" class="form-control search--input sidebar--input" min="1">

        <label for="" class="mb-2">Кількість номерів</label>
        <input type="number" class="form-control search--input sidebar--input" min="1">

        <button type="submit" class="btn search--btn sidebar--input sidebar--btn btn-first">Шукати</button>
    </form>
</div>
