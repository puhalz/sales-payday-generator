FROM php:7.3 as builder

ENV APP_ENV="dev"

WORKDIR /var/www/

COPY ./.env.local.php ./.env.local.php
COPY ./composer.lock ./composer.json ./

RUN apt-get update \
     && apt-get install -y libzip-dev \
     && docker-php-ext-install zip

RUN curl -o /usr/local/bin/composer https://getcomposer.org/composer.phar \
    && chmod +x /usr/local/bin/composer

RUN composer install --no-interaction --no-dev --no-progress --profile --no-scripts --optimize-autoloader

COPY ./bin ./bin
COPY ./public ./public
COPY ./config ./config
COPY ./src ./src

RUN php bin/console cache:warmup --env=prod --no-debug

# Fix permissions for OpenShift.
RUN chgrp -R 0 /var/www && \
  chmod -R g+rX /var/www

FROM webdevops/php-nginx-dev:7.4

ENV APP_ENV="dev"

USER root

WORKDIR /var/www/

COPY ./.env.local.php ./.env.local.php
COPY ./bin ./bin
COPY ./public ./public
COPY ./config ./config
COPY ./composer.lock ./composer.json ./
COPY --from=builder /var/www/vendor ./vendor
COPY --from=builder /var/www/var ./var
COPY ./src ./src

USER 123456789