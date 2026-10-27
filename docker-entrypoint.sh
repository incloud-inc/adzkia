#!/bin/sh
set -e

# Ensure public storage link exists
if [ ! -L /app/public/storage ]; then
    echo ">> Linking storage directory..."
    php artisan storage:link --force || true
fi

# Cache configuration, routes, and views for production performance if APP_KEY is set
if [ -n "$APP_KEY" ]; then
    echo ">> Optimizing Laravel configuration, routes, and views..."
    php artisan config:cache || true
    php artisan route:cache || true
    php artisan view:cache || true
fi

# Run database migrations automatically if AUTO_MIGRATE=true or RUN_MIGRATIONS=true
if [ "$AUTO_MIGRATE" = "true" ] || [ "$RUN_MIGRATIONS" = "true" ]; then
    echo ">> Running database migrations..."
    php artisan migrate --force || true
fi

exec "$@"
