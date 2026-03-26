FROM php:8.4-fpm

# Устанавливаем зависимости
RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    libzip-dev \
    zip \
    && docker-php-ext-install pdo pdo_mysql zip

# Устанавливаем Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Рабочая директория
WORKDIR /var/www

# Права (важно для Laravel)
RUN chown -R www-data:www-data /var/www

CMD ["php-fpm"]