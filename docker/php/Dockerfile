FROM php:8.4-fpm

RUN apt-get update && apt-get install -y \
    zip unzip git curl libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && rm -f /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

COPY ./docker/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

WORKDIR /var/www

COPY ./app /var/www

RUN chown -R www-data:www-data /var/www

CMD ["php-fpm"]
