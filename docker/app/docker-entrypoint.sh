#!/bin/sh

# Exit on fail
set -e
/usr/bin/supervisord
php-fpm

# Finally call command issued to the docker service
exec "$@"
