FROM php:8.2-fpm

# Install system packages
RUN apt update && apt install -y \
    zip unzip git curl libpq-dev libzip-dev libonig-dev cron

# PHP extensions
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install zip

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Load dependencies
RUN composer install --no-interaction --prefer-dist

# Script for cron
RUN echo '* * * * * root php /var/www/html/artisan schedule:run >> /dev/null 2>&1' > /usr/local/bin/schedule-cron
RUN chmod +x /usr/local/bin/schedule-cron

CMD ["php-fpm"]
