# Use a standard PHP image with a web server (Caddy)
FROM dunglas/frankenphp

# ADD THIS LINE to install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy our Laravel application code into the server
COPY . /app

# Install PHP dependencies
RUN composer install --no-interaction --no-dev --optimize-autoloader

# Set the correct permissions for storage and cache
RUN chown -R frankenphp:frankenphp /app/storage /app/bootstrap/cache

# Expose the server port
EXPOSE 80

# This command runs when the server starts
CMD ["frankenphp", "run", "--config", "/etc/caddy/Caddyfile"]