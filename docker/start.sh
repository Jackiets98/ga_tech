#!/bin/sh
set -x

# Railway injects PORT — must listen on 0.0.0.0, not 127.0.0.1
PORT="${PORT:-8000}"
HOST="0.0.0.0"

echo "=========================================="
echo " LCA Express — Railway startup"
echo " PORT=${PORT}  HOST=${HOST}"
echo "=========================================="

mkdir -p storage/framework/cache storage/framework/sessions storage/framework/views storage/logs bootstrap/cache database
chmod -R 775 storage bootstrap/cache 2>/dev/null || true

if [ "${DB_CONNECTION:-sqlite}" = "sqlite" ]; then
  touch database/database.sqlite
fi

if [ -z "$APP_KEY" ]; then
  echo "FATAL: APP_KEY is not set in Railway Variables"
  exit 1
fi

php artisan config:clear 2>/dev/null || true
php artisan config:cache  || { echo "FATAL: config:cache failed"; exit 1; }
php artisan route:cache   || true
php artisan view:cache    || true
php artisan migrate --force || echo "WARN: migrate failed"
php artisan db:seed --force 2>/dev/null || echo "WARN: seed skipped"

echo "=========================================="
echo " Listening on http://${HOST}:${PORT}"
echo "=========================================="

# Use PHP built-in server — binds correctly for Railway
exec php -S "${HOST}:${PORT}" -t public public/index.php
