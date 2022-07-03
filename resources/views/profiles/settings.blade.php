@extends('layouts.app')

@section('content')
    <div class="container">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="/profile/settings">Налаштування</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/profile/bookings">Бронювання</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/profile/reviews">Відгуки</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/profile/saved">Збережене</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/profile/apartments">Помешкання</a>
            </li>
        </ul>

        <form action="/profile/{{ $user->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="row">
                <label for="name" class="col-form-label">Ім'я прізвище</label>
            </div>

            <div>
                <input id="name"
                       type="text"
                       class="form-control @error('name') is-invalid @enderror"
                       name="name"
                       value="{{ old('name') }}" required autocomplete="name">

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="row">
                <label for="birthdate" class="col-form-label">Дата народження</label>
            </div>

            <div>
                <input id="birthdate"
                       type="date"
                       class="form-control @error('birthdate') is-invalid @enderror"
                       name="birthdate"
                       value="{{ old('birthdate') }}" required autocomplete="birthdate">

                @error('birthdate')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="row">
                <label for="country" class="col-form-label">Країна</label>
            </div>

            <div>
                <select class="form-select" name="country">
                    <option selected>Оберіть країну</option>
                    <option value="AFG">Афганістан</option>
                    <option value="ALA">Аландські острови</option>
                    <option value="ALB">Албанія</option>
                    <option value="DZA">Алжир</option>
                    <option value="ASM">Американське Самоа</option>
                    <option value="AND">Андорра</option>
                    <option value="AGO">Ангола</option>
                    <option value="AIA">Ангілья</option>
                    <option value="ATA">Антарктида</option>
                    <option value="ATG">Антигуа і Барбуда</option>
                    <option value="ARG">Аргентина</option>
                    <option value="ARM">Вірменія</option>
                    <option value="ABW">Аруба</option>
                    <option value="AUS">Австралія</option>
                    <option value="AUT">Австрія</option>
                    <option value="AZE">Азербайджан</option>
                    <option value="BHS">Багамські острови</option>
                    <option value="BHR">Бахрейн</option>
                    <option value="BGD">Бангладеш</option>
                    <option value="BRB">Барбадос</option>
                    <option value="BLR">Білорусь</option>
                    <option value="BEL">Бельгія</option>
                    <option value="BLZ">Беліз</option>
                    <option value="BEN">Бенін</option>
                    <option value="BMU">Бермудські острови</option>
                    <option value="BTN">Бутан</option>
                    <option value="BOL">Болівія, Багатонаціональна Держава</option>
                    <option value="BES">Бонайре, Сінт-Естатіус і Саба</option>
                    <option value="BIH">Боснія і Герцеговина</option>
                    <option value="BWA">Ботсвана</option>
                    <option value="BVT">Острів Буве</option>
                    <option value="BRA">Бразилія</option>
                    <option value="IOT">Британська територія в Індійському океані</option>
                    <option value="BRN">Бруней-Даруссалам</option>
                    <option value="BGR">Болгарія</option>
                    <option value="BFA">Буркіна-Фасо</option>
                    <option value="BDI">Бурунді</option>
                    <option value="KHM">Камбоджа</option>
                    <option value="CMR">Камерун</option>
                    <option value="CAN">Канада</option>
                    <option value="CPV">Кабо-Верде</option>
                    <option value="CYM">Кайманові острови</option>
                    <option value="CAF">Центральноафриканська Республіка</option>
                    <option value="TCD">Чад</option>
                    <option value="CHL">Чилі</option>
                    <option value="CHN">Китай</option>
                    <option value="CXR">Острів Різдва</option>
                    <option value="CCK">Кокосові (Кілінг) острови</option>
                    <option value="COL">Колумбія</option>
                    <option value="COM">Коморські острови</option>
                    <option value="COG">Конго</option>
                    <option value="COD">Конго, Демократична Республіка</option>
                    <option value="COK">Острови Кука</option>
                    <option value="CRI">Коста-Ріка</option>
                    <option value="CIV">Кот-д'Івуар</option>
                    <option value="HRV">Хорватія</option>
                    <option value="CUB">Куба</option>
                    <option value="CUW">Кюрасао</option>
                    <option value="CYP">Кіпр</option>
                    <option value="CZE">Чехія</option>
                    <option value="DNK">Данія</option>
                    <option value="DJI">Джібуті</option>
                    <option value="DMA">Домініка</option>
                    <option value="DOM">Домініканська Республіка</option>
                    <option value="ECU">Еквадор</option>
                    <option value="EGY">Єгипет</option>
                    <option value="SLV">Сальвадор</option>
                    <option value="GNQ">Екваторіальна Гвінея</option>
                    <option value="ERI">Еритрея</option>
                    <option value="EST">Естонія</option>
                    <option value="ETH">Ефіопія</option>
                    <option value="FLK">Фолклендські (Мальвінські) острови</option>
                    <option value="FRO">Фарерські острови</option>
                    <option value="FJI">Фіджі</option>
                    <option value="FIN">Фінляндія</option>
                    <option value="FRA">Франція</option>
                    <option value="GUF">Французька Гвіана</option>
                    <option value="PYF">Французька Полінезія</option>
                    <option value="ATF">Французькі південні території</option>
                    <option value="GAB">Габон</option>
                    <option value="GMB">Гамбія</option>
                    <option value="GEO">Грузія</option>
                    <option value="DEU">Німеччина</option>
                    <option value="GHA">Гана</option>
                    <option value="GIB">Гібралтар</option>
                    <option value="GRC">Греція</option>
                    <option value="GRL">Гренландія</option>
                    <option value="GRD">Гренада</option>
                    <option value="GLP">Гваделупа</option>
                    <option value="GUM">Гуам</option>
                    <option value="GTM">Гватемала</option>
                    <option value="GGY">Гернсі</option>
                    <option value="GIN">Гвінея</option>
                    <option value="GNB">Гвінея-Бісау</option>
                    <option value="GUY">Гаяна</option>
                    <option value="HTI">Гаїті</option>
                    <option value="HMD">Острови Херд і Макдональд</option>
                    <option value="VAT">Святий Престол (держава-місто Ватикан)</option>
                    <option value="HND">Гондурас</option>
                    <option value="HKG">Гонконг</option>
                    <option value="HUN">Угорщина</option>
                    <option value="ISL">Ісландія</option>
                    <option value="IND">Індія</option>
                    <option value="IDN">Індонезія</option>
                    <option value="IRN">Іран, Ісламська Республіка</option>
                    <option value="IRQ">Ірак</option>
                    <option value="IRL">Ірландія</option>
                    <option value="IMN">Острів Мен</option>
                    <option value="ISR">Ізраїль</option>
                    <option value="ITA">Італія</option>
                    <option value="JAM">Ямайка</option>
                    <option value="JPN">Японія</option>
                    <option value="JEY">Джерсі</option>
                    <option value="JOR">Йорданія</option>
                    <option value="KAZ">Казахстан</option>
                    <option value="KEN">Кенія</option>
                    <option value="KIR">Кірібаті</option>
                    <option value="PRK">Корея, Народно-Демократична Республіка</option>
                    <option value="KOR">Корея, Республіка</option>
                    <option value="KWT">Кувейт</option>
                    <option value="KGZ">Киргизстан</option>
                    <option value="LAO">Лаоська Народно-Демократична Республіка</option>
                    <option value="LVA">Латвія</option>
                    <option value="LBN">Ліван</option>
                    <option value="LSO">Лесото</option>
                    <option value="LBR">Ліберія</option>
                    <option value="LBY">Лівія</option>
                    <option value="LIE">Ліхтенштейн</option>
                    <option value="LTU">Литва</option>
                    <option value="LUX">Люксембург</option>
                    <option value="MAC">Макао</option>
                    <option value="MKD">Македонія, колишня Югославська Республіка</option>
                    <option value="MDG">Мадагаскар</option>
                    <option value="MWI">Малаві</option>
                    <option value="MYS">Малайзія</option>
                    <option value="MDV">Мальдіви</option>
                    <option value="MLI">Малі</option>
                    <option value="MLT">Мальта</option>
                    <option value="MHL">Маршаллові острови</option>
                    <option value="MTQ">Мартиніка</option>
                    <option value="MRT">Мавританія</option>
                    <option value="MUS">Маврикій</option>
                    <option value="MYT">Майотта</option>
                    <option value="MEX">Мексика</option>
                    <option value="FSM">Мікронезія, Федеративні Штати</option>
                    <option value="MDA">Республіка Молдова</option>
                    <option value="MCO">Монако</option>
                    <option value="MNG">Монголія</option>
                    <option value="MNE">Чорногорія</option>
                    <option value="MSR">Монсеррат</option>
                    <option value="MAR">Марокко</option>
                    <option value="MOZ">Мозамбік</option>
                    <option value="MMR">М'янма</option>
                    <option value="NAM">Намібія</option>
                    <option value="NRU">Науру</option>
                    <option value="NPL">Непал</option>
                    <option value="NLD">Нідерланди</option>
                    <option value="NCL">Нова Каледонія</option>
                    <option value="NZL">Нова Зеландія</option>
                    <option value="NIC">Нікарагуа</option>
                    <option value="NER">Нігер</option>
                    <option value="NGA">Нігерія</option>
                    <option value="NIU">Ніуе</option>
                    <option value="NFK">Острів Норфолк</option>
                    <option value="MNP">Північні Маріанські острови</option>
                    <option value="NOR">Норвегія</option>
                    <option value="OMN">Оман</option>
                    <option value="PAK">Пакистан</option>
                    <option value="PLW">Палау</option>
                    <option value="PSE">Палестинська територія, окупована</option>
                    <option value="PAN">Панама</option>
                    <option value="PNG">Папуа-Нова Гвінея</option>
                    <option value="PRY">Парагвай</option>
                    <option value="PER">Перу</option>
                    <option value="PHL">Філіппіни</option>
                    <option value="PCN">Піткерн</option>
                    <option value="POL">Польща</option>
                    <option value="PRT">Португалія</option>
                    <option value="PRI">Пуерто-Ріко</option>
                    <option value="QAT">Катар</option>
                    <option value="REU">Реюньйон</option>
                    <option value="ROU">Румунія</option>
                    <option value="RUS">Російська Федерація</option>
                    <option value="RWA">Руанда</option>
                    <option value="BLM">Сен-Бартельмі</option>
                    <option value="SHN">Свята Єлена, Вознесіння і Трістан-да-Кунья</option>
                    <option value="KNA">Сент-Кітс і Невіс</option>
                    <option value="LCA">Сент-Люсія</option>
                    <option value="MAF">Сен-Мартен (французька частина)</option>
                    <option value="SPM">Сен-П'єр і Мікелон</option>
                    <option value="VCT">Сент-Вінсент і Гренадини</option>
                    <option value="WSM">Самоа</option>
                    <option value="SMR">Сан-Марино</option>
                    <option value="STP">Сан-Томе і Принсіпі</option>
                    <option value="SAU">Саудівська Аравія</option>
                    <option value="SEN">Сенегал</option>
                    <option value="SRB">Сербія</option>
                    <option value="SYC">Сейшельські острови</option>
                    <option value="SLE">Сьєрра-Леоне</option>
                    <option value="SGP">Сінгапур</option>
                    <option value="SXM">Сінт-Мартен (голландська частина)</option>
                    <option value="SVK">Словаччина</option>
                    <option value="SVN">Словенія</option>
                    <option value="SLB">Соломонові Острови</option>
                    <option value="SOM">Сомалі</option>
                    <option value="ZAF">Південна Африка</option>
                    <option value="SGS">Південна Джорджія та Південні Сандвічеві острови</option>
                    <option value="SSD">Південний Судан</option>
                    <option value="ESP">Іспанія</option>
                    <option value="LKA">Шрі-Ланка</option>
                    <option value="SDN">Судан</option>
                    <option value="SUR">Суринам</option>
                    <option value="SJM">Шпіцберген і Ян-Маєн</option>
                    <option value="SWZ">Свазіленд</option>
                    <option value="SWE">Швеція</option>
                    <option value="CHE">Швейцарія</option>
                    <option value="SYR">Сирійська Арабська Республіка</option>
                    <option value="TWN">Тайвань, провінція Китаю</option>
                    <option value="TJK">Таджикистан</option>
                    <option value="TZA">Танзанія, Об’єднана Республіка</option>
                    <option value="THA">Таїланд</option>
                    <option value="TLS">Тимор-Лешті</option>
                    <option value="TGO">Того</option>
                    <option value="TKL">Токелау</option>
                    <option value="TON">Тонга</option>
                    <option value="TTO">Тринідад і Тобаго</option>
                    <option value="TUN">Туніс</option>
                    <option value="TUR">Туреччина</option>
                    <option value="TKM">Туркменістан</option>
                    <option value="TCA">Острови Теркс і Кайкос</option>
                    <option value="TUV">Тувалу</option>
                    <option value="UGA">Уганда</option>
                    <option value="UKR">Україна</option>
                    <option value="ARE">Об'єднані Арабські Емірати</option>
                    <option value="GBR">Великобританія</option>
                    <option value="USA">Сполучені Штати</option>
                    <option value="UMI">Віддалені малі острови США</option>
                    <option value="URY">Уругвай</option>
                    <option value="UZB">Узбекистан</option>
                    <option value="VUT">Вануату</option>
                    <option value="VEN">Венесуела, Боліваріанська Республіка</option>
                    <option value="VNM">В'єтнам</option>
                    <option value="VGB">Віргінські острови, Британські</option>
                    <option value="VIR">Віргінські острови, США</option>
                    <option value="WLF">Уолліс і Футуна</option>
                    <option value="ESH">Західна Сахара</option>
                    <option value="YEM">Ємен</option>
                    <option value="ZMB">Замбія</option>
                    <option value="ZWE">Зімбабве</option>
                </select>
            </div>

            <button type="submit" class="w-100 btn btn-first">
                Зберігти
            </button>
        </form>
    </div>
@endsection
