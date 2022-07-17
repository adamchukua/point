<p align="center" style="font-weight: bold; font-size: 3rem">POINT</p>

## Технічне завдання

Технічне завдання доступне за [посиланням](https://drive.google.com/file/d/1Y6cBiPucx_-FmD469jM1qjghOZdHH9dM/view).

## Реалізовний функціонал

- Реєстрація з підтвердженням пошти.
- Особистий профіль:
  - редагування;
  - доступ до інформації інших профілів (ім'я, дати народження та країни, кількості бронювань та відгуків).
- Панель користувача:
  - налаштування:
    - доступ до редагування профілю;
    - інформація про верифікацію акаунту;
    - можливість видалити акаунт.
  - бронювання:
    - перегляд всіх бронювань користувачем, їхнього статусу;
    - можливість скасувати бронювання;
    - можливість додати відгук до бронювання.
  - відгуки:
    - перегляд всіх відгуків, залишених користувачем;
    - можливість змінити відгук;
    - можливість видалити відгук.
  - збережене:
    - перегляд всіх збережених помешкань;
    - можливість видалити збережене.
  - помешкання:
    - перегляд всіх помешкань, виставлених для бронювання користувачами;
    - додаткова інформація про кожне помешкання:
      - середня оцінка;
      - дата, коли помешкання було додано;
      - кількість відгуків.
    - керування номерами:
      - перегляд наявних номерів;
      - інформація про кожен номер щодо місць (вільні, зайняті, очікують на свалення та всього);
      - можливість редагування номеру;
      - можливість видалення номеру.
    - можливість переглянути всі бронювання помешкання, що передбачає:
      - перегляд кількості бронювань за критерієм статусу (всі, очікують на схвалення, схвалено, відмовлено, виконано, скасовано);
      - можливість скасувати бронювання;
      - можливість схвалити або відмовити запит на бронювання;
      - можливість позначити бронювання як виконане.
- Сповіщення:
  - перегляд всіх сповіщень;
  - можливість відмітити сповіщення як прочитано / не прочитане;
  - користувачу сповіщення надходять в таких умовах:
    - реєстрації користувача (перше повідомлення про підтвердження пошти);
    - відправлення запиту на бронювання;
    - скасування запиту;
    - схвалення запиту на бронювання;
    - відмова на запит на бронювання.
  - власнику помешкання сповіщення надходять в таких умовах:
    - новий запит на бронювання;
    - скасування запиту.
- Рейтинги та відгуки:
  - ...

## Запуск проєкту 

### Windows

1. Завантажте та встановіть [XAMPP](https://www.apachefriends.org/index.html).
2. В конфігурації php.ini (Apache -> Config -> php.ini) розкоментуйте рядок `extension=gd`, прибравши ";".
3. Завантажте та встановіть [Composer](https://getcomposer.org/download/), **обравши чекбокс "Add this PHP to your path"!**
4. Перейдіть в phpMyAdmin (скоріш за все за посиланням http://localhost/phpmyadmin/) та створіть базу даних з назвою "point" (або іншою).
5. Перейдіть у папку, в якій знаходитиметься проєкт та виконайте команду `git clone https://github.com/thegradle/point` (якщо у Вас немає встановленого git - завантажте та встановіть [його](https://git-scm.com/downloads)).
6. Перейдіть у корінь проєкту командою `cd point`.
7. Перейменуйте файл `.env.example` командою у `.env`.
8. Налаштуйте середовище на свій лад, або за замовчування: у файлі `.env` замініть наступні рядки:
`APP_NAME=Point`
`DB_DATABASE=point`
Для роботи пошти зареєструйтесь в сервісі [Mailtrap](https://mailtrap.io/) та отримайте налаштування для MAIL_HOST, MAIL_PORT, MAIL_USERNAME, MAIL_PASSWORD, MAIL_ENCRYPTION.
10. Виконайте `composer install`.
11. Виконайте `php artisan key:generate`.
12. Виконайте `php artisan migrate`.
13. Виконайте `php artisan db:seed`.
14. Виконайте `php artisan storage:link`.
15. Запустіть локальний сервер командою `php artisan serve`.
