#!/bin/sh

docker compose --file ../docker-compose.yml exec php vendor/bin/codecept $*