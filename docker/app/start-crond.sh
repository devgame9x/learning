#!/bin/sh

# Exit on fail
set -e
chown -R www-data:www-data /app/storage && chown -R www-data:www-data /app/bootstrap/cache
/usr/sbin/crond -f

# Finally call command issued to the docker service
exec "$@"
