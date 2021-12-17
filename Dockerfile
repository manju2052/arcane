FROM php:7.4-fpm-alpine

RUN docker-php-ext-install pdo pdo_mysql sockets
RUN curl -sS https://getcomposer.org/installer<200b> | php -- \
     --install-dir=/usr/local/bin --filename=composer


COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .
RUN composer update
CMD php artisan serve --host=0.0.0.0 --port=8181
EXPOSE 8181
