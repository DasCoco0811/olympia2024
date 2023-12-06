# Use an official PHP runtime as the base image
FROM php:7.4-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
   libfreetype6-dev \
   libjpeg62-turbo-dev \
   libpng-dev \
   zip \
   unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd

# Install composer
COPY --from=composer /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy existing application directory permissions
COPY --chown=www-data:www-data . /var/www

# Change current user to www
USER www-data

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]

# Add MySQL service
FROM mysql:5.7
EXPOSE 3306
ENV MYSQL_DATABASE symfony
ENV MYSQL_USER symfony
ENV MYSQL_PASSWORD symfony
ENV MYSQL_ROOT_PASSWORD symfony