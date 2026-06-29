# ── Stage 1: Build Vite assets ──
FROM node:20-alpine AS frontend

WORKDIR /app

COPY package.json package-lock.json ./
RUN npm ci

COPY vite.config.js ./
COPY resources ./resources
COPY public ./public

RUN npm run build


# ── Stage 2: PHP application ──
FROM php:8.2-cli-alpine AS app

WORKDIR /app

RUN apk add --no-cache \
    git \
    unzip \
    libzip-dev \
    sqlite-dev \
    postgresql-dev \
    && docker-php-ext-install \
        pdo \
        pdo_sqlite \
        pdo_pgsql \
        zip \
        bcmath \
        opcache

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-scripts

COPY . .

COPY --from=frontend /app/public/build ./public/build

RUN test -f public/build/manifest.json \
    && test -f public/images/lca-logo.png \
    || (echo "FATAL: missing built assets or logo" && exit 1)

RUN composer dump-autoload --optimize \
    && mkdir -p storage/framework/{cache,sessions,views} storage/logs bootstrap/cache database \
    && chmod -R 775 storage bootstrap/cache \
    && chmod +x docker/start.sh

ENV PORT=8000
ENV HOST=0.0.0.0

EXPOSE 8000

CMD ["sh", "docker/start.sh"]
