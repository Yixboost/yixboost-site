FROM php:8.1-apache

WORKDIR /var/www/html

COPY . /var/www/html/

RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf \
    && echo "<Directory /var/www/html/> \n\
    Options Indexes FollowSymLinks \n\
    AllowOverride All \n\
    Require all granted \n\
</Directory>" > /etc/apache2/conf-available/custom-permissions.conf \
    && a2enconf custom-permissions

# Exposeer de poort die Apache gebruikt
EXPOSE 80

# Start Apache bij het uitvoeren van de container
CMD ["apache2-foreground"]
