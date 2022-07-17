<template>
    <div>
        <div class="row">
            <div class="col-3">
                <div class="sidebar">
                    <p class="sidebar--title">Шукати</p>

                    <form action="/search" method="get" @submit.prevent="search">
                        <div class="mb-2">
                            <label for="city">Куди ви вирушаєте?</label>
                        </div>

                        <select class="form-select form-control search--input sidebar--input"
                                name="city"
                                id="city"
                                required
                                v-model="form.city">
                            <option value="">Оберіть місто</option>

                            <option
                                v-for="city in cities"
                                v-bind:value="city.id">
                                    {{ city.city }} ({{ city.area }})
                            </option>
                        </select>

                        <div class="mb-2">
                            <label for="arrival">Заїзд</label>
                        </div>

                        <input
                            type="date"
                            name="arrival"
                            id="arrival"
                            value=""
                            v-model="form.arrival"
                            class="form-control search--input sidebar--input">

                        <div class="mb-2">
                            <label for="departure" class="mb-2">Виїзд</label>
                        </div>

                        <input
                            type="date"
                            name="departure"
                            id="departure"
                            value=""
                            v-model="form.departure"
                            class="form-control search--input sidebar--input">

                        <div class="mb-2">
                            <label for="peopleNumber">Кількість людей</label>
                        </div>

                        <input
                            type="number"
                            name="peopleNumber"
                            id="peopleNumber"
                            value=""
                            v-model="form.peopleNumber"
                            class="form-control search--input sidebar--input"
                            min="1">

                        <div class="mb-2">
                            <label for="roomsNumber">Кількість номерів</label>
                        </div>

                        <input
                            type="number"
                            name="roomsNumber"
                            id="roomsNumber"
                            v-model="form.roomsNumber"
                            value=""
                            class="form-control search--input sidebar--input"
                            min="1">

                        <button
                            type="submit"
                            class="btn search--btn sidebar--input sidebar--btn btn-first">
                            Шукати
                        </button>
                    </form>
                </div>

                <div class="sidebar mt-4">
                    <p class="sidebar--title">Сортувати за такими критеріями:</p>

                    <div class="sidebar-section">
                        <p class="sidebar-section--title">Ціна</p>

                        <form action="" method="get">
                            <input
                                type="text"
                                name=""
                                id=""
                                placeholder="Від"
                                class="form-control search--input sidebar--input">

                            <input
                                type="text"
                                name=""
                                id=""
                                placeholder="До"
                                class="form-control search--input sidebar--input">
                        </form>
                    </div>

                    <div class="sidebar-section">
                        <p class="sidebar-section--title">Популярні фільтри</p>

                        <form action="" method="get">
                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">Безкоштовний Wi-Fi</label>
                            </div>

                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">Готелі</label>
                            </div>

                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">Басейн</label>
                            </div>

                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">Дуже добре 8+</label>
                            </div>
                        </form>
                    </div>

                    <div class="sidebar-section">
                        <p class="sidebar-section--title">Кількість зірок</p>

                        <form action="" method="get">
                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">5</label>
                            </div>

                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">4+</label>
                            </div>

                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">3+</label>
                            </div>

                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">2+</label>
                            </div>
                        </form>
                    </div>

                    <div class="sidebar-section">
                        <p class="sidebar-section--title">Оцінка за відгуками</p>

                        <form action="" method="get">
                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">Чудово 9+</label>
                            </div>

                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">Дуже добре 8+</label>
                            </div>

                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">Добре 7+</label>
                            </div>

                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">Досить добре 6+</label>
                            </div>
                        </form>
                    </div>

                    <div class="sidebar-section">
                        <p class="sidebar-section--title">Харчування</p>

                        <form action="" method="get">
                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">З власною кухнею</label>
                            </div>

                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">Сніданок включено</label>
                            </div>

                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">Ресторан</label>
                            </div>
                        </form>
                    </div>

                    <div class="sidebar-section">
                        <p class="sidebar-section--title">Інтернет</p>

                        <form action="" method="get">
                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">Безкоштовний Wi-Fi</label>
                            </div>

                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">Фіксований Інтернет</label>
                            </div>
                        </form>
                    </div>

                    <div class="sidebar-section">
                        <p class="sidebar-section--title">Транспорт</p>

                        <form action="" method="get">
                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">Безкоштовна автостоянка</label>
                            </div>

                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">Платна автостоянка</label>
                            </div>

                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">Станція для заряджання електромобілів</label>
                            </div>
                        </form>
                    </div>

                    <div class="sidebar-section">
                        <p class="sidebar-section--title">Спорт та дозвілля</p>

                        <form action="" method="get">
                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">Фітнес-центр</label>
                            </div>

                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">Басейн</label>
                            </div>

                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">Оздоровчий спа-центр</label>
                            </div>
                        </form>
                    </div>

                    <div class="sidebar-section">
                        <p class="sidebar-section--title">Інше</p>

                        <form action="" method="get">
                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">Дозволене розміщення з домашніми тваринами</label>
                            </div>

                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">Прибирання</label>
                            </div>

                            <div class="d-flex">
                                <input type="checkbox" name="" id="">
                                <label for="">Зручності для осіб з обмеженими фізичними можливостями</label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="hotels">
                    <p class="hotels--title">
                        МІСТО: знайдено ЧИСЛО помешкання
                    </p>

                    <ul class="nav nav-tabs d-flex justify-content-around mb-2 nav-tabs__bg">
                        <li class="nav-item">
                            <a class="nav-link" href="">Ціна (спершу найнижча)</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="">Ціна (спершу найдорожче)</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="">Ціна і якість</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="">Найпопулярніше</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="">Зірки (спершу найнижче)</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="">Зірки (спершу найбільше)</a>
                        </li>
                    </ul>

                    <div class="hotels-list">
                        <div class="hotels-list-item">
                            <div class="row">
                                <div class="col-3">
                                    <a href="/hotel/">
                                        <img
                                            src="/storage/"
                                            alt=""
                                            class="hotels-list-item--img w-100">
                                    </a>
                                </div>

                                <div class="col-9 d-flex justify-content-between">
                                    <div class="hotels-list-item-left">
                                        <div class="hotels-list-item-left-title d-flex">
                                            <a class="hotels-list-item-left-title--text me-2 link-unstyled"
                                               href="/hotel/">
                                                НАЗВА
                                            </a>

                                            <!-- @for($i = 0; $i < intval($hotel->reviews->avg('stars')); $i++) -->
                                            <img
                                                src="/img/svg/star.svg"
                                                alt=""
                                                class="hotels-list-item-left-title--img">
                                            <!-- @endfor -->
                                        </div>

                                        <p class="hotels-list-item--subtitle">
                                            МІСТО,
                                            ОБЛАСТЬ
                                        </p>

                                        <p class="hotels-list-item--subtitle">
                                            ОПИС
                                        </p>
                                    </div>

                                    <div class="hotels-list-item-right d-flex justify-content-between" style="flex-direction: column">
                                        <div class="hotels-list-item-right-reviews d-flex">
                                            <p class="hotels-list-item-right-reviews--text">
                                                    <span>
                                                        СЕРЕДНЯ
                                                    </span>

                                                ЧИСЛО відгуків
                                            </p>

                                            <p class="hotels-list-item-right-reviews--mark hotel-reviews--mark">
                                                <span>СЕРЕДНЯ</span>
                                            </p>
                                        </div>

                                        <!--  -->
                                        <p class="mb-0 text-muted text-center">
                                            Від ЧИСЛО грн
                                        </p>

                                        <a class="btn btn-second"
                                           href="/hotel/">
                                            Наявність місць
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="row">
                            <div class="col-12 d-flex justify-content-center">
                                {{ $hotels->links() }}
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import * as axios from 'axios';
    import Form from "vform";

    export default {
        props: ['cities'],

        data() {
            return {
                searchInformation: {},
                form: new Form({
                    city: '',
                    arrival: '',
                    departure: '',
                    peopleNumber: '',
                    roomsNumber: ''
                })
            }
        },

        created() {
            //fetch("http://127.0.0.1:8000/search?q=vue")
            //    .then(response => response.json())
            //    .then(data => (console.log(data)));
        },

        methods: {
            async search() {
                const response = await this.form.get('/search');
            },

            loadHotels() {

            }
        },

        computed: {

        },

        mounted() {

        }
    }
</script>
