# Use the official PHP image with FPM
FROM php:8-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy the application files to the container
COPY . /var/www/html

# Fix permissions here
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

RUN php artisan config:cache
RUN php artisan cache:clear

EXPOSE 9000
CMD ["php-fpm"]
