#!/bin/sh
set -x

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

if [ ! -f public/build/manifest.json ]; then
  echo "FATAL: public/build/manifest.json missing — CSS/JS will not load"
  echo "Run: npm run build  OR  fix Docker frontend build stage"
  ls -la public/build 2>/dev/null || echo "public/build/ does not exist"
  exit 1
fi

echo "Vite assets OK:"
ls -la public/build/assets/ | head -5

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

exec php artisan serve --host="$HOST" --port="$PORT" --no-reload
