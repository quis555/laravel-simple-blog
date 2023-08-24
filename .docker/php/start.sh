#!/usr/bin/env sh

cd /app/
composer install --no-interaction
php artisan storage:link
php artisan migrate

php artisan serve --host=0.0.0.0 --port=80
