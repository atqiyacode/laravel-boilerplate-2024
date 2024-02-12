#!/usr/bin/env sh

composer install --no-interaction --prefer-dist --optimize-autoloader --ignore-platform-reqs

chown -R $USER:www-data storage
chown -R $USER:www-data bootstrap/cache
chmod -R 775 .
chmod -R 775 storage
chmod -R 775 bootstrap/cache

php artisan key:generate
# sleep 5s
php artisan migrate --force
# sleep 15s

# Add the following lines to set up cron for Laravel scheduler
echo "* * * * * cd /var/www/html && php artisan schedule:run >> /dev/null 2>&1" > /etc/cron.d/laravel-scheduler
chmod 0644 /etc/cron.d/laravel-scheduler
crontab /etc/cron.d/laravel-scheduler

php artisan storage:link &
php artisan octane:start --host=0.0.0.0 &
php artisan websocket:serve --host=0.0.0.0 --port=6001 &
php artisan queue:work --tries=3 --timeout=300 --sleep=1 --daemon &
exec "$@"
