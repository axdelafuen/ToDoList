FROM php:8.1-apache
RUN docker-php-ext-install pdo pdo_mysql && docker-php-ext-enable pdo_mysql

EXPOSE 3306
COPY ./ /var/www/html/
