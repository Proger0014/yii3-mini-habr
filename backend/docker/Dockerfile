FROM composer/composer:2-bin AS composer

FROM dunglas/frankenphp:1-php8.2-bookworm AS base

RUN apt update && apt -y install \
    unzip

RUN install-php-extensions \
    opcache \
    mbstring \
    intl \
    dom \
    ctype \
    curl \
    phar \
    openssl \
    xml \
    xmlwriter \
    simplexml \
    pdo_mysql

#
# Development
#

FROM base AS dev
ARG USER=appuser

RUN install-php-extensions \
    xdebug

COPY --from=composer /composer /usr/bin/composer

# Based on https://frankenphp.dev/docs/docker/#running-as-a-non-root-user
RUN \
    useradd ${USER}; \
	# Add additional capability to bind to port 80 and 443 \
	setcap CAP_NET_BIND_SERVICE=+eip /usr/local/bin/frankenphp; \
	# Give write access to /data/caddy and /config/caddy \
	chown -R ${USER}:${USER} /data/caddy && chown -R ${USER}:${USER} /config/caddy
USER ${USER}

#
# Production
#

FROM base AS prod-builder
COPY --from=composer /composer /usr/bin/composer
COPY .. /app
RUN --mount=type=cache,target=/tmp/cache \
    composer install --no-dev --no-progress --no-interaction --classmap-authoritative && \
    rm composer.lock composer.json

FROM base AS prod
ENV APP_ENV=prod
COPY --from=prod-builder --chown=www-data:www-data /app /app
USER www-data
