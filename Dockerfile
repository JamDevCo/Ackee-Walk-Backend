# Use the official PHP FPM image
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libicu-dev \
    libonig-dev \
    libzip-dev \
    libpq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_pgsql mbstring exif pcntl bcmath gd intl zip

 
# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy the application code
COPY . /var/www

# Set permissions for www-data user
# RUN chown -R www-data:www-data /var/www

# Switch to www-data user
# USER www-data

# Install composer dependencies
RUN composer install

# Expose port 9000
EXPOSE 9000
CMD ["php-fpm"]



