FROM php:8.2-fpm

RUN apt-get update \
    && apt-get install -y \
        apt-utils \
    && apt-get install -y \
        libpq-dev \
        libzip-dev \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-install zip \
    && docker-php-ext-install pgsql \
    && docker-php-ext-install pdo \
    && docker-php-ext-install pdo_pgsql

WORKDIR /var/www

CMD ["php-fpm"]