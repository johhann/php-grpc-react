ARG PHP_IMAGE=8.2-cli-alpine
ARG ROAD_RUNNER_IMAGE=2023.3.11

#Download rr binary
FROM spiralscout/roadrunner:$ROAD_RUNNER_IMAGE AS builder

FROM php:$PHP_IMAGE

# Required system packages and PHP extensions
RUN apk add --no-cache \
        git \
        curl \
        zip \
        bash \
        icu-dev \
        php-sockets \
        grpc \
        grpc-dev \
        protobuf-dev \
        libzip-dev \
        oniguruma-dev \
        libxml2-dev \
    && docker-php-ext-install sockets \
    && docker-php-ext-install bcmath pcntl \
    && rm -rf /var/cache/apk/*

COPY --from=composer:2.2.7 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY ./composer.json /var/www

RUN composer install --ignore-platform-reqs --no-autoloader --no-scripts && \
    composer clear-cache && \
    composer dump --optimize --no-scripts

COPY ./ /var/www

COPY --from=builder /usr/bin/rr /var/server/
COPY ./.rr.yaml /var/server/

CMD ["/var/server/rr", "serve", "-d"]