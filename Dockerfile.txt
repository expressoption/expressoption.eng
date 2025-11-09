#Use the offical PHP 8 image with Apache
From php: 8.2-Apache

#Copy all projects files into the web root
COPY . /var/www/html/

#Expose the port Render uses
EXPOSE 10000

#Command to start Apache on Render's port
CMD ["apache2-foreground"]
