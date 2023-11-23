FROM php:8.1-fpm

RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash -

RUN apt-get update  \
    && apt-get install -y libpq-dev libpng-dev libzip-dev libxml2-dev zip nodejs \
    && docker-php-ext-install zip pgsql pdo_pgsql sysvsem gd bcmath soap \
    && apt-get clean \
    && curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

RUN echo 'memory_limit = 15G' >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini;

RUN echo 'max_execution_time = 2000' >> /usr/local/etc/php/conf.d/docker-php-execution-time.ini;

WORKDIR /var/www/warehouse