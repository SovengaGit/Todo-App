#Build Image - specify php version
FROM php:7.4-apache
#install dependencies - depending on the App
#You may have additional dependencies
RUN apt-get update && \ 
    apt-get install -y \
    libzip-dev \
    zip
#Enable mod_rewrite
RUN a2enmod rewrite

#install php extentions
RUN docker-php-ext-install pdo_mysql zip

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g'  /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

#copy the verification code
COPY . /var/www/html

#set working directory
WORKDIR /var/www/html

#install composer

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#install project dependencies
RUN composer install

#set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
