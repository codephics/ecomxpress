#!/bin/bash

php artisan config:cache
php artisan route:cache
php artisan route:clear
php artisan view:clear
php artisan cache:clear
php artisan optimize
php artisan optimize:clear
