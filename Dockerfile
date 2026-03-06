# syntax=docker/dockerfile:1

FROM composer:2.7 AS composer
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-scripts --no-autoloader --prefer-dist --no-interaction --ignore-platform-reqs

FROM node:20 AS node_modules
WORKDIR /app
COPY package.json package-lock.json ./
RUN npm install --no-audit --no-fund
RUN php artisan key:generate
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache
RUN php artisan storage:link
RUN php artisan migrate --force
FROM php:8.4-fpm-alpine

# Install system dependencies
RUN apk add --no-cache \
    icu-dev \
    libzip-dev \
    oniguruma-dev \
    zlib-dev \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    git \
    curl \
    bash \
    shadow \
    nodejs \
    npm \
    supervisor

# Install PHP extensions
RUN docker-php-ext-install intl pdo pdo_mysql zip mbstring exif pcntl bcmath gd

# Set working directory
WORKDIR /var/www/html

# Copy PHP source
COPY --from=composer /app /var/www/html
COPY . /var/www/html

# Copy node_modules and build assets
COPY --from=node_modules /app/node_modules /var/www/html/node_modules

# Build frontend assets
RUN npm run build || npm run prod || true
# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
