#!/bin/sh

# Exit immediately if a command exits with a non-zero status.
set -e

echo "==> Entrypoint script started..."

# Wait for the database to be ready
echo "==> Waiting for database to be ready (15 seconds)..."
sleep 15

echo "==> Running database migrations..."
php artisan migrate --force

echo "==> Creating storage link..."
# This command may fail if the link already exists, so we add || true
php artisan storage:link || true

echo "==> Starting Laravel server..."
exec php artisan serve --host=0.0.0.0 --port=8000