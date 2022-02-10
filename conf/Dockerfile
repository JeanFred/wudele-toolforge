FROM php:7.3-apache

RUN apt-get update \
	&& apt-get install -y \
		git \
		zip \
		unzip \
		libicu-dev \
	&& apt-get clean

RUN docker-php-ext-install intl && docker-php-ext-install pdo_mysql

WORKDIR /app/

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
WORKDIR /app/
COPY composer.json composer.json
RUN composer install

WORKDIR /var/www/html/

RUN ln -s /app/vendor/framasoft/framadate/ wudele
