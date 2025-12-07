FROM php:8.2-fpm

RUN apt update && apt install -y \
    zip unzip git curl rsync libzip-dev libonig-dev cron && \
    docker-php-ext-install pdo_mysql zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# 1. Устанавливаем Laravel в /var/www/laravel
RUN composer create-project laravel/laravel laravel

# 2. Копируем твой проект в отдельную папку
COPY . /var/www/project

# 3. Сливаем проект поверх laravel, ничего лишнего не затирая
RUN rsync -av \
    --exclude='.git' \
    --exclude='docker' \
    --exclude='composer.lock' \
    --exclude='vendor' \
    --exclude='node_modules' \
    /var/www/project/ /var/www/laravel/

WORKDIR /var/www/laravel

# 4. Устанавливаем зависимости проекта
RUN composer install --no-interaction --prefer-dist || true

# 5. Создаём .env, если нет
RUN cp .env.example .env 2>/dev/null || true

# 6. Генерируем ключ приложения
RUN php artisan key:generate || true
