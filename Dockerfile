FROM php:7.3-alpine3.10

COPY . /usr/src
WORKDIR /usr/src

RUN apk add --no-cache libzip-dev && docker-php-ext-configure zip --with-libzip=/usr/include && docker-php-ext-install zip && rm -f php.tar.*
RUN curl --silent --show-error https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer
RUN composer install

CMD ["php", "-a"]
