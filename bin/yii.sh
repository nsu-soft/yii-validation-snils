#!/bin/bash

docker compose --file ../docker-compose.yml exec php php vendor/bin/yii $*
