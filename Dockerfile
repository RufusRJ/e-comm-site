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

# ADD THIS LINE to fix execute permissions
RUN chmod +x /usr/local/bin/frankenphp

# Copy our Laravel application code into the server
COPY . /app

# Install PHP dependencies
RUN composer install --no-interaction --no-dev --optimize-autoloader

# Expose the server port
EXPOSE 80

# This command runs when the server starts
CMD ["frankenphp", "run", "--config", "/etc/caddy/Caddyfile"]