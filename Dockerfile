FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy existing application directory contents
COPY . .

# Install dependencies (no dev dependencies for production)
RUN composer install --no-dev --optimize-autoloader

# Generate application key if not exists
RUN if [ ! -f ".env" ]; then cp .env.example .env; fi
RUN php artisan key:generate

# Set permissions for storage and bootstrap/cache
RUN chown -R www-data:www-data \
    /var/www/storage \
    /var/www/bootstrap/cache

# Expose port 10000 and start the application
EXPOSE 10000
CMD php artisan serve --host=0.0.0.0 --port=10000
