# Installation
    sudo chmod +x ./init && ./init
    docker-compose up -d --build

# Docker commands
## Frontend
    docker run --rm -it -u "$(id -u):$(id -g)" -v $(pwd):/app -w /app node:16 npm

## Backend
    docker run --rm -u "$(id -u):$(id -g)" -v $(pwd):/var/www/html -w /var/www/html laravelsail/php81-composer:latest composer install --ignore-platform-reqs
    docker-compose exec -u "$(id -u):$(id -g)" backend php artisan key:generate

## Integration
    docker run --rm -u "$(id -u):$(id -g)" -v $(pwd):/var/www/html -w /var/www/html laravelsail/php81-composer:latest composer install --ignore-platform-reqs
    docker-compose exec -u "$(id -u):$(id -g)" integration php artisan key:generate