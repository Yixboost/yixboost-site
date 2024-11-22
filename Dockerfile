# Gebruik de officiële PHP 8.1 Apache-image als basis
FROM php:8.1-apache

# Zet de werkdirectory
WORKDIR /var/www/html

# Kopieer de bestanden naar de container
COPY . /var/www/html/

# Installeer benodigde PHP-extensies
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Zorg dat de Apache-gebruiker toegang heeft tot de bestanden
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Configureer Apache om toegang te geven tot de document root
RUN echo "<Directory /var/www/html/> \n\
    Options Indexes FollowSymLinks \n\
    AllowOverride All \n\
    Require all granted \n\
</Directory>" > /etc/apache2/conf-available/custom-permissions.conf \
    && a2enconf custom-permissions

# Herstart Apache om configuratiewijzigingen toe te passen
RUN service apache2 restart

# Exposeer de poort die Apache gebruikt
EXPOSE 80
