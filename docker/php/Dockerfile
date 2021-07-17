FROM php:7.2-fpm

RUN apt-get update

RUN apt-get install -y \
    vim \
    git \
    zip \
    nano \
    curl \
    wget \
    tree \
    tmux \
    screen \
    sudo \
    unzip \
    libicu-dev \
    libxml2-dev \
    libbz2-dev \
    libpng-dev \
    libjpeg-dev \
    libmcrypt-dev \
    libreadline-dev \
    libfreetype6-dev \
    libcurl4-openssl-dev \
    pkg-config \
    libssl-dev \
    g++

RUN docker-php-ext-install \
    gd \
    bz2 \
    intl \
    json \
    exif \
    phar \
    soap \
    iconv \
    ctype \
    bcmath \
    mysqli \
    sockets \
    opcache \
    calendar \
    mbstring \
    pdo_mysql \
    tokenizer \
    zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN wget https://get.symfony.com/cli/installer -O - | bash

ARG uid
RUN useradd -G www-data,root -u $uid -d /home/timcheh timcheh
RUN mkdir -p /home/timcheh/.composer && \
    chown -R timcheh:timcheh /home/timcheh

WORKDIR /srv/www
