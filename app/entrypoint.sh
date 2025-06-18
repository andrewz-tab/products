#!/usr/bin/env bash

for param in "$@"
do
case $param in
    dev)
        php artisan migrate:fresh --seed
        npm run dev -- --port=${VITE_PORT} &
        php-fpm
        ;;
    *)
        echo "unknown mod - $param."
        ;;
esac
done
