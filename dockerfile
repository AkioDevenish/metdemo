FROM php:7.4-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    zip \
    unzip \
    git

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mysqli gd zip

# Enable Apache modules
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Configure Apache
COPY apache.conf /etc/apache2/sites-available/000-default.conf
RUN a2ensite 000-default.conf

# Add custom PHP configuration
RUN { \
    echo 'memory_limit = 256M'; \
    echo 'max_execution_time = 300'; \
    echo 'upload_max_filesize = 64M'; \
    echo 'post_max_size = 64M'; \
    echo 'max_input_vars = 3000'; \
    echo 'mysqli.default_socket = /var/run/mysqld/mysqld.sock'; \
    } > /usr/local/etc/php/conf.d/custom.ini

# Configure PHP for BigTree
RUN { \
    echo 'always_populate_raw_post_data = -1'; \
    echo 'max_execution_time = 300'; \
    echo 'max_input_time = 300'; \
    } >> /usr/local/etc/php/conf.d/bigTree.ini

# Set proper permissions for BigTree
RUN chown -R www-data:www-data /var/www/html \
    && find /var/www/html -type d -exec chmod 755 {} \; \
    && find /var/www/html -type f -exec chmod 644 {} \;