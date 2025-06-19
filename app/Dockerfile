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
COPY --from=node /usr/local/bin /usr/local/bin
COPY --from=node /usr/local/lib/node_modules /usr/local/lib/node_modules

RUN composer install \
    --no-interaction \
    --prefer-dist \
    --ignore-platform-reqs \
    --optimize-autoloader \
    --no-scripts \
    --apcu-autoloader \
    --ansi

RUN npm install
RUN npm run build

ENTRYPOINT [ "./entrypoint.sh" ]
