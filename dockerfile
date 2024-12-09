# Set the base image
FROM php:8.1-fpm

# Install dependencies
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip git

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd pdo pdo_mysql

# Set the working directory inside the container
WORKDIR /var/www

# Copy the existing application directory contents to the container
COPY . .

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install dependencies
RUN composer install

# Expose the port Laravel will run on
EXPOSE 9000

# Start the PHP-FPM server
CMD ["php-fpm"]
