FROM php:8.2

WORKDIR /var/www/html

COPY composer.lock composer.json /var/www/html/

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpq-dev \
    libzip-dev \
    libonig-dev \
    zip \
    && docker-php-ext-install pdo_pgsql zip mbstring

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . /var/www/html

RUN chmod -R 777 /var/www/html

RUN composer install --ignore-platform-reqs
