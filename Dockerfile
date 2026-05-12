FROM php:8.2-fpm

# Install system dependencies and PHP extensions
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip libzip-dev libjpeg-dev libfreetype6-dev \
    && apt-get clean && rm -rf /var/lib/apt/lists/* \
    && install-php-extensions pdo_mysql mbstring exif pcntl bcmath gd zip intl

WORKDIR /var/www
COPY . /var/www

# Create all necessary Laravel storage directories and set permissions
RUN mkdir -p storage/framework/cache/data \
    && mkdir -p storage/framework/app/cache \
    && mkdir -p storage/framework/sessions \
    && mkdir -p storage/framework/views \
    && mkdir -p storage/logs \
    && mkdir -p bootstrap/cache \
    && mkdir -p public/build \
    && chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache /var/www/public/build \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Install dependencies
ENV COMPOSER_MEMORY_LIMIT=-1
RUN composer install --no-interaction --optimize-autoloader --no-dev --no-scripts
