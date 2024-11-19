FROM php:8.3-fpm-alpine

# RUN docker-php-ext-install pdo pdo_mysql mbstring
# RUN apk add sqlite
RUN docker-php-ext-install session mysqli