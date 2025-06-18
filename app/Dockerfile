FROM php:8.3-fpm as server
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libicu-dev \
    zip \
    unzip

RUN docker-php-ext-install \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    intl \
    zip \
    opcache

WORKDIR /var/www
COPY --chown=www-data:www-data . .
RUN chmod +x entrypoint.sh

COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN composer install \
    --no-dev \
    --no-interaction \
    --prefer-dist \
    --ignore-platform-reqs \
    --optimize-autoloader \
    --no-scripts \
    --apcu-autoloader \
    --ansi

RUN chmod +x entrypoint.sh
ENTRYPOINT [ "./entrypoint.sh" ]
