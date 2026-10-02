#!/bin/bash

set -e

if [ "$IS_LARAVEL" = "true" ]; then
  # Clear any cached configurations, routes, and views created during build-time
  # so that migrations and runtime queries read the correct environment variables.
  # We avoid 'optimize:clear' because it triggers 'cache:clear', which fails if the
  # database connection is not yet established (when using a database cache store).
  echo "Clearing cached configurations, routes, and views..."
  php artisan config:clear
  php artisan route:clear
  php artisan view:clear

  if [ "$RAILPACK_SKIP_MIGRATIONS" != "true" ]; then
    echo "Running migrations..."
    php artisan migrate --force

    echo "Checking if database needs seeding..."
    if [ -f "check-seed.php" ]; then
      ASSESSMENT_COUNT=$(php check-seed.php 2>/dev/null || echo "0")
      if [ "$ASSESSMENT_COUNT" = "0" ]; then
        echo "Assessments table is empty. Running database seeders..."
        php artisan db:seed --force
      else
        echo "Assessments table already has $ASSESSMENT_COUNT records. Skipping seeding."
      fi
    else
      echo "check-seed.php not found, running database seeders..."
      php artisan db:seed --force
    fi
  fi

  php artisan storage:link
fi

# Start the FrankenPHP server
docker-php-entrypoint --config /Caddyfile --adapter caddyfile 2>&1
