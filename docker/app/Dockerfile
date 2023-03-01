FROM php:7.4.4-fpm-alpine

WORKDIR /

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive

RUN apk update && apk add \
  wget \
  libpng-dev \
  libzip-dev \
  freetype \
  freetype-dev \
  jpeg-dev \
  zip \
  unzip \
  supervisor

RUN  docker-php-ext-configure gd \
        --with-freetype=/usr/bin/ \
        --with-jpeg=/usr/lib/ \
        --enable-gd

RUN docker-php-ext-install gd && \
  docker-php-ext-install opcache && \
  docker-php-ext-configure zip && \
  docker-php-ext-install zip && \
  docker-php-ext-install pdo_mysql pcntl

ENV PHPREDIS_VERSION 3.0.0

RUN mkdir -p /usr/src/php/ext/redis \
    && curl -L https://github.com/phpredis/phpredis/archive/$PHPREDIS_VERSION.tar.gz | tar xvz -C /usr/src/php/ext/redis --strip 1 \
    && echo 'redis' >> /usr/src/php-available-exts \
    && docker-php-ext-install redis

ARG DOCKER_UID
ARG DOCKER_GID
RUN if [ ${DOCKER_UID:-0} -ne 0 ] && [ ${DOCKER_GID:-0} -ne 0 ]; then \
    deluser www-data &&\
    if getent group www-data ; then delgroup www-data; fi &&\
    addgroup -g ${DOCKER_GID} www-data &&\
    adduser -u ${DOCKER_UID} -G www-data www-data --disabled-password &&\
    install -d -m 0755 -o www-data -g www-data /home/www-data \
;fi
COPY --from=composer:2.0.8 /usr/bin/composer /usr/local/bin/composer
COPY ./docker/app/php.ini-development $PHP_INI_DIR/php.ini
COPY ./docker/app/docker-entrypoint.sh /docker-entrypoint.sh

RUN chmod +x /docker-entrypoint.sh

COPY . /app

WORKDIR /app
