# Use the official PHP 8.2 image with Apache
FROM php:8.2-apache

# Install required system packages, MongoDB extension, and Composer
RUN apt-get update && apt-get install -y \
    git unzip libssl-dev pkg-config && \
    pecl install mongodb && \
    docker-php-ext-enable mongodb && \
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
    rm composer-setup.php

# Copy your app files into the container
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html/

# Install PHP dependencies
RUN composer require mongodb/mongodb --no-interaction --no-progress

# Expose Render port
EXPOSE 10000

# Start Apache
CMD ["apache2-foreground"]
