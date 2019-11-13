FROM php:7.3.6-fpm-alpine

WORKDIR /usr/src/api

RUN apk add --no-cache openssl bash mysql-client
RUN docker-php-ext-install pdo pdo_mysql
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . /usr/src/api

EXPOSE 8000
