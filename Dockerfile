FROM php:8.3.10

RUN apt-get update -y && apt-get install -y \
    openssl zip unzip git default-mysql-client netcat-openbsd && \
    ln -s /bin/nc /usr/bin/nc || true

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /app

COPY . /app

RUN composer install

CMD php artisan serve --host=0.0.0.0 --port=8000
