#!/bin/bash

docker compose --file ../docker-compose.yml exec php php ./composer.phar $*
