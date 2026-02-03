FROM php:8.4-fpm

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    libzip-dev \
 && docker-php-ext-install zip pdo pdo_mysql

WORKDIR /var/www/html

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer