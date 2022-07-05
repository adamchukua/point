<select class="form-select" name="country">
    <option selected>Оберіть країну проживання</option>

    @foreach($countries as $country)
        <option
            value="{{ $country->code }}"
            {{ $country->code == $user->profile->country ? 'selected' : '' }}>
            {{ $country->name }}
        </option>
    @endforeach
</select>
