# ==============================================================================
# Production Dockerfile for ADZKIA CBT Platform (Optimized for Coolify / VPS)
# Multi-stage build with Node 20, Composer 2, and FrankenPHP (Caddy + PHP 8.3)
# ==============================================================================

# ------------------------------------------------------------------------------
# Stage 1: Build Frontend Assets (Vite + Tailwind v4 + Alpine)
# ------------------------------------------------------------------------------
FROM node:20-alpine AS frontend-builder

WORKDIR /app

COPY package*.json ./
RUN npm install

COPY . .
RUN npm run build

# ------------------------------------------------------------------------------
# Stage 2: Install Production PHP Dependencies (Composer)
# ------------------------------------------------------------------------------
FROM composer:2 AS composer-builder

WORKDIR /app

COPY composer*.json ./
RUN composer install \
    --no-dev \
    --no-interaction \
    --no-scripts \
    --no-autoloader \
    --ignore-platform-reqs \
    --prefer-dist

COPY . .
RUN composer dump-autoload --no-dev --optimize --ignore-platform-reqs

# ------------------------------------------------------------------------------
# Stage 3: Production Runtime with FrankenPHP (PHP 8.3 + Caddy)
# ------------------------------------------------------------------------------
FROM dunglas/frankenphp:1-php8.3-bookworm AS runner

# Install essential PHP extensions for Laravel CBT (PostgreSQL, MySQL, Redis, Math, Zip, Media)
RUN install-php-extensions \
    pdo_pgsql \
    pgsql \
    pdo_mysql \
    redis \
    bcmath \
    pcntl \
    zip \
    intl \
    gd \
    opcache

# Production PHP settings
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini" \
    && sed -i 's/upload_max_filesize = 2M/upload_max_filesize = 64M/g' "$PHP_INI_DIR/php.ini" \
    && sed -i 's/post_max_size = 8M/post_max_size = 64M/g' "$PHP_INI_DIR/php.ini" \
    && sed -i 's/memory_limit = 128M/memory_limit = 512M/g' "$PHP_INI_DIR/php.ini"

# Environment Variables
ENV SERVER_NAME=":80"
ENV APP_ENV=production
ENV APP_DEBUG=false
ENV LOG_CHANNEL=stderr

WORKDIR /app

# Copy application code, prebuilt vendor & assets
COPY . /app
COPY --from=composer-builder /app/vendor /app/vendor
COPY --from=frontend-builder /app/public/build /app/public/build

# Copy Caddyfile & Entrypoint script
COPY Caddyfile /etc/caddy/Caddyfile
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN sed -i 's/\r$//' /usr/local/bin/docker-entrypoint.sh \
    && chmod +x /usr/local/bin/docker-entrypoint.sh

# Set directory permissions for web server
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache \
    && chmod -R 775 /app/storage /app/bootstrap/cache

EXPOSE 80

ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]
CMD ["frankenphp", "run", "--config", "/etc/caddy/Caddyfile"]
