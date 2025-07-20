# Use a standard PHP image with a web server (Caddy)
FROM dunglas/frankenphp

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install required PHP extensions for Laravel
RUN install-php-extensions \
    bcmath \
    pdo_mysql \
    zip \
    gd \
    exif

# Copy our Laravel application code into the server
COPY . /app

# Install PHP dependencies
RUN composer install --no-interaction --no-dev --optimize-autoloader

# Expose the server port
EXPOSE 80

# This command runs when the server starts
CMD ["frankenphp", "run", "--config", "/etc/caddy/Caddyfile"]