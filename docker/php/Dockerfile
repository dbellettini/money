FROM php:latest

RUN apt-get update &&\
    apt-get install -y \
    git \
    zip \
    unzip \
    iputils-ping &&\
    apt-get clean &&\
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN echo "assert.exception=1" >> /usr/local/etc/php/php.ini

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename composer \
    && php -r "unlink('composer-setup.php');"

RUN mkdir -p /var/www/project
WORKDIR /var/www/project
