# Use the official PHP 8 image with Apache
FROM php:8.2-apache

# Copy all project files into the web root
COPY . /var/www/html/

# Expose the port Render uses
EXPOSE 10000

# Command to start Apache on Render's port
CMD ["apache2-foreground"]

