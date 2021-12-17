FROM php:7.4-fpm-alpine

RUN docker-php-ext-install pdo pdo_mysql sockets
RUN curl -sS https://getcomposer.org/installer<200b> | php -- \
     --install-dir=/usr/local/bin --filename=composer


COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
ENV APP_NAME=Laravel \
APP_ENV=local \
APP_KEY=base64:pIw1izYT0mjIoHipainjSCBPNGTQXQ1a2T75AphNUGk= \
APP_DEBUG=true \
APP_LOG_LEVEL=debug \
APP_URL=http://localhost \

DB_CONNECTION=mysql \
DB_HOST=arcane-db.cdktzyzb7pun.ap-south-1.rds.amazonaws.com \
DB_PORT=3306 \
DB_DATABASE=homestead \
DB_USERNAME=admin \
DB_PASSWORD=password \

BROADCAST_DRIVER=log \
CACHE_DRIVER=file \
SESSION_DRIVER=file \
QUEUE_DRIVER=sync \

REDIS_HOST=127.0.0.1 \
REDIS_PASSWORD=null \
REDIS_PORT=6379 \

MAIL_DRIVER=smtp \
MAIL_HOST=smtp.mailtrap.io \
MAIL_PORT=2525 \
MAIL_USERNAME=null \
MAIL_PASSWORD=null \
MAIL_ENCRYPTION=null \

PUSHER_APP_ID= \
PUSHER_APP_KEY= \
PUSHER_APP_SECRET= 

COPY . .
RUN composer update
CMD php artisan serve --host=0.0.0.0 --port=8181
EXPOSE 8181
