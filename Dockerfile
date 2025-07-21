# Use the official PHP 8.2 image
FROM php:8.2-cli-alpine

# Install system dependencies for extensions, including fcgi
RUN apk add --no-cache libzip-dev zip build-base linux-headers fcgi

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

# Copy and make the entrypoint script executable
COPY entrypoint.sh .
RUN chmod +x entrypoint.sh

# Expose the port Laravel will run on
EXPOSE 8000

# Set the entrypoint script as the start command
CMD ["./entrypoint.sh"]