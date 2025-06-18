#!/usr/bin/env bash

for param in "$@"
do
case $param in
    dev)
        php artisan migrate:fresh --seed
        php-fpm
        ;;
    *)
        echo "unknown mod - $param."
        ;;
esac
done
