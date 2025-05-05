ARG PHP_IMAGE=8.1.3-cli-alpine3.15
ARG ROAD_RUNNER_IMAGE=2023.3.11

#Download rr binary
FROM spiralscout/roadrunner:$ROAD_RUNNER_IMAGE as builder

FROM php:$PHP_IMAGE

# Required system packages and PHP extensions
RUN apk add --no-cache \
        git \
        curl \
        zip \
        bash \
        icu-dev \
        libzip-dev \
        oniguruma-dev \
        libxml2-dev \
    && rm -rf /var/cache/apk/*

RUN docker-php-ext-install bcmath sockets pcntl

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