# Use the official PHP 8 image with Apache
FROM php:8.2-apache

# Install dependencies for Composer and MongoDB PHP extension
RUN apt-get update && apt-get install -y \
    git unzip libssl-dev pkg-config && \
    docker-php-ext-install mysqli pdo pdo_mysql && \
    pecl install mongodb && \
    docker-php-ext-enable mongodb

# Install Composer globally
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && rm composer-setup.php

# Copy all project files into the web root
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html/

# Install PHP dependencies from composer.json (this will create vendor/autoload.php)
RUN composer install --no-dev --optimize-autoloader

# Expose the port Render uses
EXPOSE 10000

# Start Apache
CMD ["apache2-foreground"]
