FROM php:7.1-fpm

RUN apt-get update && apt-get install -y libmcrypt-dev \
    mysql-client libmagickwand-dev --no-install-recommends \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && docker-php-ext-install mcrypt pdo_mysql

RUN mkdir -p /var/www/html
ADD . /var/www/html
WORKDIR /var/www/html
RUN chown -R www-data:www-data /var/www/html
