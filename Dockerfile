# Use an official PHP runtime
FROM php:8.2-apache
# doing an install of some libraries to the image
RUN apt-get update \
    && apt-get install -y --no-install-recommends git zlib1g-dev libzip-dev zip unzip
# Enable Apache modules
RUN a2enmod rewrite
# Install any extensions you need
RUN docker-php-ext-install mysqli pdo pdo_mysql zip


## XDEBUG for symfony
#RUN pecl install xdebug \
#    && docker-php-ext-enable xdebug
#
## copy xdebug file
#COPY ./php/conf.d/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini


# INSTALL COMPOSER
RUN curl -sSk https://getcomposer.org/installer | php -- --disable-tls && \
       mv composer.phar /usr/local/bin/composer
# enable the installation with the composer command
ENV COMPOSER_ALLOW_SUPERUSER=1

# IF NEEDD change to another working directory -
# set to /var/www/html, normal is this
WORKDIR /var/www/html

# load your composer and synfonie shit to the workdir
# prevent the reinstallation of vendors at every changes in the source code
COPY --link composer.* symfony.* ./
# install with composer!!!!
RUN set -eux; \
	composer install --no-cache --no-interaction --prefer-dist --no-dev --no-autoloader --no-scripts --no-progress
# IF NEED change -
# Copy the source code in /www into the container at /var/www/html which is a normal standard
# COPY ../www .
# copy sources
COPY --link . ./

# create cache folder in /var/wwww/html
RUN set -eux; \
	mkdir -p var/cache var/log; \
	composer dump-autoload --classmap-authoritative --no-dev; \
	composer dump-env prod; \
	composer run-script --no-dev post-install-cmd; \
	chmod +x bin/console; sync;

# better to use the standard www-data group and user
# RUN groupadd dev -g 999
# RUN useradd dev -g dev -d /var/www -m
# RUN chown -R dev:dev /var/www
RUN chown -R www-data:www-data /var/www
RUN chmod -R 755 /var/www/
RUN rm -rf /var/lib/apt/lists/*

COPY ./v-host/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY ./docker/php/webhost.conf /etc/apache2/sites-available/project.conf

RUN a2dissite 000-default.conf
RUN a2ensite 000-default.conf
RUN a2ensite project.conf