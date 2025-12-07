
Dynamic Pricing Module (Laravel)

Модуль динамического ценообразования для Laravel: обработки лидов, пересчёта коэффициентов и автоматического изменения цены на товары для разных GEO.

Модуль включает:

хранение товаров, цен, GEO и валют;

фиксирование лидов (Redis + MySQL);

динамический коэффициент (зависит от количества лидов);

пересчёт коэффициента раз в 10 мин;

кеширование финальной цены в Redis;

API для лидов и получения цены;

крон-задачи, сервисы и модели.

# 1. Остановите старые контейнеры
docker-compose down -v

# 2. Пересоберите и запустите заново
docker-compose up -d --build

# 3. Подождите 10–15 секунд, проверьте, что все 4 контейнера запущены
docker ps

# 4. Теперь всё будет внутри
docker exec -it dynamic_pricing_app ls -la
# → вы увидите artisan, app, public, composer.json и т.д.

# 5. Дальше стандартно
docker exec -it dynamic_pricing_app php artisan key:generate
docker exec -it dynamic_pricing_app php artisan migrate --force
docker exec -it dynamic_pricing_app php artisan db:seed --class=TestDataSeeder  # если есть

# 6. Запуск очереди (в отдельном терминале)
docker exec -it dynamic_pricing_app php artisan queue:work --daemon







| Функция               | Описание                                           |
| --------------------- | -------------------------------------------------- |
| Товары / GEO / Валюты | Полная структура БД                                |
| Лиды                  | Быстрая запись в Redis, асинхронная запись в MySQL |
| Коэффициенты          | Рассчитываются CRON'ом                             |
| Динамическая цена     | `base_price + shipping * coefficient`              |
| Кеш Redis             | Цена кешируется на 10 минут                        |
| API                   | `/lead`, `/price`                                  |
| Расширяемость         | Лёгкое подключение дополнительных правил           |
|                       |                                                    |
