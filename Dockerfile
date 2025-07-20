# Use the official PHP 8.2 image
FROM php:8.2-cli-alpine

# Install system dependencies for extensions
RUN apk add --no-cache libzip-dev zip build-base linux-headers

# Install required PHP extensions
RUN docker-php-ext-install pdo_mysql zip bcmath

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set the working directory
WORKDIR /app

# Copy the rest of the application files
COPY . .

# Install project dependencies
RUN composer install --no-interaction --no-dev --optimize-autoloader

# Expose the port Laravel will run on
EXPOSE 8000