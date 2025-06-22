#!/usr/bin/env bash

for param in "$@"
do
case $param in
    test)
            php artisan migrate:fresh --seed
            php artisan test
            ;;
    dev)
        php artisan migrate --seed
        npm run dev -- --port=${VITE_PORT} &
        php-fpm
        ;;
    *)
        echo "unknown mod - $param."
        ;;
esac
done
