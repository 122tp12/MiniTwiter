FROM php:8.1-apache
RUN a2enmod rewrite && service apache2 restart
RUN apt-get update && \
    docker-php-ext-install mysqli pdo pdo_mysql