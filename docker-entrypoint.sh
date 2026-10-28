#!/bin/sh
set -e

# If Coolify passes a multi-line .env content in the ENV environment variable, write it to /app/.env
if [ -n "$ENV" ] && echo "$ENV" | grep -q "APP_KEY"; then
    echo ">> Writing .env from Coolify ENV variable..."
    printf "%s\n" "$ENV" > /app/.env
fi

# Ensure critical domain and session settings are configured for multi-tenancy
if [ -f /app/.env ]; then
    if ! grep -q "^APP_DOMAIN=" /app/.env; then
        echo "APP_DOMAIN=adzkia.id" >> /app/.env
    fi
    if ! grep -q "^SESSION_DOMAIN=" /app/.env; then
        echo "SESSION_DOMAIN=.adzkia.id" >> /app/.env
    fi
    sed -i 's|APP_URL=https://cbt.domain-anda.com|APP_URL=https://adzkia.id|g' /app/.env
fi

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
