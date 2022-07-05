@if (session('resent'))
    <div class="alert alert-success" role="alert">
        Лист надіслано! Будь ласка перевірте пошту.
    </div>
@endif

<div class="alert alert-info" role="alert">
    <h4 class="alert-heading">Акаунт потребує верифікації</h4>

    <p>Після реєстрації ми відправили Вам листа, будь ласка перевірте пошту. Іноді листи можуть прийти у папку "Спам".</p>

    <hr>

    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
        @csrf

        <p class="mb-0">
            Якщо Ви не знайшли листа, ми можемо
            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">повторно відправити</button>
            його.
        </p>
    </form>
</div>
