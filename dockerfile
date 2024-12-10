# Set the base image to PHP with FPM support
FROM php:8.1-fpm

# Install necessary dependencies for Laravel and Composer in one step
RUN apt-get update && apt-get install -y \
    npm \
    nano \
    libpng-dev libjpeg-dev libfreetype6-dev \
    libzip-dev git unzip curl && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd pdo pdo_mysql zip && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www

# Copy the rest of the project files
COPY . .

# Install Composer dependencies
RUN composer install --no-dev --optimize-autoloader --prefer-dist

# Install npm dependencies
RUN npm install

# Expose the port that Laravel will run on
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm", "php artisan key:generate", "php artisan migrate --force", "php artisan db:seed --class=SeederSQLFileSeeder --force", "php artisan storage:link", "npm run build --host"]
