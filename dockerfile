# Set the base image to PHP with FPM support
FROM php:8.1-fpm

# Install necessary dependencies for Laravel
RUN apt-get update && apt-get install -y \
    npm \
    nano \
    libpng-dev libjpeg-dev libfreetype6-dev \
    libzip-dev git unzip && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd pdo pdo_mysql zip

# Set working directory
WORKDIR /var/www

# Copy the Laravel project files into the container
COPY . .

# Install Composer (PHP package manager)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install PHP dependencies using Composer
RUN composer install --no-dev --optimize-autoloader

# Install npm dependencies and run dev
RUN npm install

# Expose the port that Laravel will run on
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]
