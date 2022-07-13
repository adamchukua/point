<template>
    <div>
        <form action="#" method="post" enctype="multipart/form-data" @submit.prevent="createHotel">
            <div class="row">
                <div class="col-6">
                    <label for="name" class="col-form-label">Назва</label>
                    <input
                        v-model="form.name"
                        type="text"
                        class="form-control"
                        :class="{ 'is-invalid': form.errors.has('name') }"
                        name="username">
                    <has-error :form="form" field="name"></has-error>

                    <label for="type" class="col-form-label">Тип помешкання</label>
                    <select
                        class="form-select"
                        name="type"
                        required>
                        <option value="">Оберіть тип помешкання</option>

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

                    <label for="city" class="col-form-label">Місто</label>
                    <select class="form-select"
                            name="city"
                            required>
                        <option value="">Оберіть місто</option>

                        <option
                            v-for="city in cities"
                            :value="city.city">
                            :key="city.id">
                        </option>
                    </select>

                    <label for="address" class="col-form-label">Адреса</label>
                    <input
                        v-model="form.address"
                        type="text"
                        class="form-control"
                        :class="{ 'is-invalid': form.errors.has('address') }"
                        name="address">
                    <has-error :form="form" field="address"></has-error>

                    <label for="description" class="col-form-label">Опис помешкання</label>
                    <textarea
                        v-model="form.description"
                        class="form-control"
                        :class="{ 'is-invalid': form.errors.has('description') }"
                        id="description"
                        required
                        name="description"
                        rows="5">
                    </textarea>
                    <has-error :form="form" field="description"></has-error>
                </div>

                <div class="col-6">
                    <div class="image-upload">
                        <p class="image-upload--title">Додайте зображення готелю</p>

                        <div class="image-upload-list">
                            <div class="row">
                                <!--
                                 <div class="col-4 mb-3" v-for="src in previews">
                                    <div class="image-upload-list-item">
                                        <img
                                            class="image-upload-list-item--img"
                                            v-if="src && src.length" :src="src"
                                            alt="">
                                        <p class="image-upload-list-item--hided">Видалити</p>
                                    </div>
                                </div>
                                 -->

                                <label for="photos">
                                    <div class="col-12">
                                        <div class="image-upload-list--add btn btn-second w-100 mt-1 py-2">
                                            Додати фото (максимум 10)
                                        </div>
                                    </div>
                                </label>

                                <input
                                    type="file"
                                    class="form-control-file d-none"
                                    id="photos"
                                    name="photos[]"
                                    multiple
                                    required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-4">
                    <p class="hotel-features--title">Харчування</p>

                    <ul class="hotel-features-list list-unstyled">
                        <li class="hotel-features-list--item hotel-features-list--item__checkbox">
                            <label for="food_with_own_kitchen">З власною кухнею</label>
                            <input type="checkbox" name="food_with_own_kitchen" value="1" id="food_with_own_kitchen" class="hotel-features-list--item__checkbox--checkbox">
                        </li>

                        <li class="hotel-features-list--item hotel-features-list--item__checkbox">
                            <label for="food_breakfast_is_included">Сніданок включено</label>
                            <input type="checkbox" name="food_breakfast_is_included" value="1" id="food_breakfast_is_included" class="hotel-features-list--item__checkbox--checkbox">
                        </li>

                        <li class="hotel-features-list--item hotel-features-list--item__checkbox">
                            <label for="food_restaurant">Ресторан</label>
                            <input type="checkbox" name="food_restaurant" value="1" id="food_restaurant" class="hotel-features-list--item__checkbox--checkbox">
                        </li>
                    </ul>
                </div>

                <div class="col-4">
                    <p class="hotel-features--title">Інтернет</p>

                    <ul class="hotel-features-list list-unstyled">
                        <li class="hotel-features-list--item hotel-features-list--item__checkbox">
                            <label for="internet_free_wifi">Безкоштовний Wi-Fi</label>
                            <input type="checkbox" name="internet_free_wifi" value="1" id="internet_free_wifi" class="hotel-features-list--item__checkbox--checkbox">
                        </li>

                        <li class="hotel-features-list--item hotel-features-list--item__checkbox">
                            <label for="internet_fixed">Фіксований Інтернет</label>
                            <input type="checkbox" name="internet_fixed" value="1" id="internet_fixed" class="hotel-features-list--item__checkbox--checkbox">
                        </li>
                    </ul>
                </div>

                <div class="col-4">
                    <p class="hotel-features--title">Транспорт</p>

                    <ul class="hotel-features-list list-unstyled">
                        <li class="hotel-features-list--item hotel-features-list--item__checkbox">
                            <label for="transport_free_parking">Безкоштовна автостоянка</label>
                            <input type="checkbox" name="transport_free_parking" value="1" id="transport_free_parking" class="hotel-features-list--item__checkbox--checkbox">
                        </li>

                        <li class="hotel-features-list--item hotel-features-list--item__checkbox">
                            <label for="transport_paid_parking">Платна автостоянка</label>
                            <input type="checkbox" name="transport_paid_parking" value="1" id="transport_paid_parking" class="hotel-features-list--item__checkbox--checkbox">
                        </li>

                        <li class="hotel-features-list--item hotel-features-list--item__checkbox">
                            <label for="transport_e_station">Станція для заряджання електромобілів</label>
                            <input type="checkbox" name="transport_e_station" value="1" id="transport_e_station" class="hotel-features-list--item__checkbox--checkbox">
                        </li>
                    </ul>
                </div>

                <div class="col-4">
                    <p class="hotel-features--title">Спорт та дозвілля</p>

                    <ul class="hotel-features-list list-unstyled">
                        <li class="hotel-features-list--item hotel-features-list--item__checkbox">
                            <label for="sports_leisure_fitness">Фітнес-центр</label>
                            <input type="checkbox" name="sports_leisure_fitness" value="1" id="sports_leisure_fitness" class="hotel-features-list--item__checkbox--checkbox">
                        </li>

                        <li class="hotel-features-list--item hotel-features-list--item__checkbox">
                            <label for="sports_leisure_basin">Басейн</label>
                            <input type="checkbox" name="sports_leisure_basin" value="1" id="sports_leisure_basin" class="hotel-features-list--item__checkbox--checkbox">
                        </li>

                        <li class="hotel-features-list--item hotel-features-list--item__checkbox">
                            <label for="sports_leisure_health_spa">Оздоровчий спа-центр</label>
                            <input type="checkbox" name="sports_leisure_health_spa" value="1" id="sports_leisure_health_spa" class="hotel-features-list--item__checkbox--checkbox">
                        </li>
                    </ul>
                </div>

                <div class="col-4">
                    <p class="hotel-features--title">Інше</p>

                    <ul class="hotel-features-list list-unstyled">
                        <li class="hotel-features-list--item hotel-features-list--item__checkbox">
                            <label for="other_pets_allowed">Дозволене розміщення з домашніми тваринами</label>
                            <input type="checkbox" name="other_pets_allowed" value="1" id="other_pets_allowed" class="hotel-features-list--item__checkbox--checkbox">
                        </li>

                        <li class="hotel-features-list--item hotel-features-list--item__checkbox">
                            <label for="other_cleaning">Прибирання</label>
                            <input type="checkbox" name="other_cleaning" value="1" id="other_cleaning" class="hotel-features-list--item__checkbox--checkbox">
                        </li>

                        <li class="hotel-features-list--item hotel-features-list--item__checkbox">
                            <label for="other_facilities_for_people_with_disabilities">Зручності для осіб з обмеженими фізичними можливостями</label>
                            <input type="checkbox" name="other_facilities_for_people_with_disabilities" value="1" id="other_facilities_for_people_with_disabilities" class="hotel-features-list--item__checkbox--checkbox">
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <p class="subtitle">Номери та їх кількість</p>

                    <div>
                        <p class="font-weight-bolder">Номер 1</p>

                        <label for="type" class="col-form-label">Назва типу номеру</label>
                        <input
                            v-model="form.type"
                            type="text"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('type') }"
                            name="type">
                        <has-error :form="form" field="type"></has-error>

                        <label for="contains" class="col-form-label">Місткість</label>
                        <input
                            v-model="form.contains"
                            type="text"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('contains') }"
                            name="contains">
                        <has-error :form="form" field="contains"></has-error>

                        <label for="price" class="col-form-label">Ціна</label>
                        <input
                            v-model="form.price"
                            type="text"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('price') }"
                            name="price">
                        <has-error :form="form" field="price"></has-error>

                        <label for="number" class="col-form-label">Кількість</label>
                        <input
                            v-model="form.number"
                            type="text"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('number') }"
                            name="number">
                        <has-error :form="form" field="number"></has-error>


                        <label for="comment" class="col-form-label">Коментар (необов'язково)</label>
                        <textarea
                            class="form-control"
                            id="comment"
                            required
                            name="comment"
                            rows="2">
                        </textarea>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-first mt-4">
                Зберегти
            </button>
        </form>
    </div>
</template>

<script>
    import Form from "vform";

    export default {
        props: ['cities'],

        data() {
            return {
                form: new Form({
                    name: '',
                    type: '',
                    address: '',
                    city: '',
                    description: '',
                    food_with_own_kitchen: '',
                    food_restaurant: '',
                    internet_free_wifi: '',
                    internet_fixed: '',
                    transport_free_parking: '',
                    transport_paid_parking: '',
                    transport_e_station: '',
                    sports_leisure_fitness: '',
                    sports_leisure_basin: '',
                    sports_leisure_health_spa: '',
                    other_pets_allowed: '',
                    other_cleaning: '',
                    other_facilities_for_people_with_disabilities: '',
                })
            }
        },

        methods: {
            createHotel() {
                this.form.post('/profile/apartments/create')
                    .then(( response ) => {
                        console.log(response.data)
                        this.form.reset();
                    })
            }
        },

        computed: {

        }
    }
</script>
