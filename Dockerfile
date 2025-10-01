# Stage 1: build frontend (Vite)
FROM node:20-alpine AS frontend
WORKDIR /app
COPY package*.json ./
RUN npm install --legacy-peer-deps
COPY . .
RUN npm run build

# Stage 2: Laravel with PHP 
FROM php:8.2-cli-alpine

# Install system dependencies
RUN apk add --no-cache --virtual .build-deps \
        $PHPIZE_DEPS \
        build-base \
        linux-headers \
    && \
    apk add --no-cache \
        bash \
        git \
        unzip \
        libzip-dev \
        libpng-dev \
        oniguruma-dev \
        sqlite-dev \
    && \
    docker-php-ext-install pdo pdo_sqlite mbstring zip gd opcache \
    && \
    apk del .build-deps

# Configure opcache for production
RUN { \
    echo 'opcache.memory_consumption=128'; \
    echo 'opcache.interned_strings_buffer=8'; \
    echo 'opcache.max_accelerated_files=4000'; \
    echo 'opcache.revalidate_freq=2'; \
    echo 'opcache.enable_cli=1'; \
    } > /usr/local/etc/php/conf.d/opcache-recommended.ini

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copy composer files first to leverage Docker cache
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Copy application files
COPY . .

# Copy frontend build into public
COPY --from=frontend /app/public/build ./public/build

# Set production environment
ENV APP_ENV=production
ENV APP_DEBUG=false

# Remove the key generation since it should be set in Render
# RUN php artisan key:generate --force

# Update permissions and create .env
RUN touch .env && \
    chmod 777 .env && \
    chmod -R 777 storage bootstrap/cache

# Create SQLite database directory first
RUN mkdir -p database && \
    touch database/database.sqlite && \
    chmod -R 777 database && \
    chmod 777 database/database.sqlite

# Expose Render's default port
EXPOSE 8080

# Start Laravel server
CMD php artisan serve --host=0.0.0.0 --port=${PORT:-8080}