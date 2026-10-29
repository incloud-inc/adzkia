#!/bin/sh
set -e

# Handle Coolify multiline ENV wrapper or variable
if [ -f /app/.env ] && grep -q '^ENV="' /app/.env 2>/dev/null; then
    echo ">> Extracting .env from Coolify ENV wrapper in /app/.env..."
    sed -n '/^ENV="/,$ p' /app/.env | sed '1s/^ENV="//; $s/"$//' > /app/.env.extracted
    if grep -q "APP_KEY" /app/.env.extracted 2>/dev/null; then
        mv /app/.env.extracted /app/.env
        echo ">> Successfully extracted .env (APP_KEY found)"
    else
        rm -f /app/.env.extracted
    fi
elif [ -n "$ENV" ] && echo "$ENV" | grep -q "APP_KEY"; then
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

# Ensure public storage link and tenant asset directories exist
mkdir -p /app/storage/app/public/tenants/favicons \
         /app/storage/app/public/tenants/logos \
         /app/storage/app/public/tenants/covers

if [ ! -L /app/public/storage ]; then
    echo ">> Linking storage directory..."
    php artisan storage:link --force || true
fi

# Pre-populate tenant branding assets if not present
R2_BASE="${CLOUDFLARE_R2_URL:-https://image.adzkia.id}"
if [ ! -f /app/storage/app/public/tenants/favicons/hjE5BUGWTsISNriNAynRSxRNcLn9QasZ0tPE1EoT.png ]; then
    curl -fsSL -o /app/storage/app/public/tenants/favicons/hjE5BUGWTsISNriNAynRSxRNcLn9QasZ0tPE1EoT.png "${R2_BASE}/tenants/favicons/hjE5BUGWTsISNriNAynRSxRNcLn9QasZ0tPE1EoT.png" 2>/dev/null || true
fi
if [ ! -f /app/storage/app/public/tenants/favicons/BV7zOaRiDLfKzygWOhpc2cH0fPMXvcugHSWZUFcj.png ]; then
    curl -fsSL -o /app/storage/app/public/tenants/favicons/BV7zOaRiDLfKzygWOhpc2cH0fPMXvcugHSWZUFcj.png "${R2_BASE}/tenants/favicons/BV7zOaRiDLfKzygWOhpc2cH0fPMXvcugHSWZUFcj.png" 2>/dev/null || true
fi
if [ ! -f /app/storage/app/public/tenants/favicons/tJ29IbrZu6t16f9F0hJ9L3bhPn4CFjMnrgnnAXg0.ico ] && [ -f /app/public/images/icon-adzkia.png ]; then
    cp /app/public/images/icon-adzkia.png /app/storage/app/public/tenants/favicons/tJ29IbrZu6t16f9F0hJ9L3bhPn4CFjMnrgnnAXg0.ico || true
fi
if [ ! -f /app/storage/app/public/tenants/favicons/cUfKAWFW3lbCaAOe50pfAqvHlOn87NYtIhPB3hRU.png ] && [ -f /app/public/images/icon-adzkia.png ]; then
    cp /app/public/images/icon-adzkia.png /app/storage/app/public/tenants/favicons/cUfKAWFW3lbCaAOe50pfAqvHlOn87NYtIhPB3hRU.png || true
fi

chown -R www-data:www-data /app/storage /app/bootstrap/cache || true

# Cache configuration, routes, and views for production performance if APP_KEY is set in .env or environment
if grep -q "^APP_KEY=base64:" /app/.env 2>/dev/null || [ -n "$APP_KEY" ]; then
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

# Start background Laravel Queue Worker for asynchronous jobs (auto-grading, notifications, exports)
if [ "$QUEUE_CONNECTION" != "sync" ] && [ "$QUEUE_CONNECTION" != "null" ]; then
    echo ">> Starting background Laravel Queue Worker (${QUEUE_CONNECTION:-redis})..."
    (
        while true; do
            php artisan queue:work "${QUEUE_CONNECTION:-redis}" --sleep=3 --tries=3 --timeout=120 --max-jobs=500 --memory=256
            sleep 2
        done
    ) > /app/storage/logs/queue-worker.log 2>&1 &
fi

exec "$@"
