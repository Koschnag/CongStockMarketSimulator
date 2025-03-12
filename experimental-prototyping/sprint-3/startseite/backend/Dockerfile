FROM php:7.4-apache

WORKDIR /var/www/html

# Install necessary packages
RUN apt-get update && apt-get install -y \
    libpq-dev \
    unzip \
    && docker-php-ext-install pdo pdo_pgsql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . .

# Install PHP dependencies
RUN composer install

EXPOSE 80

CMD ["apache2-foreground"]