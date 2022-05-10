FROM php:8-apache
COPY . /var/www/html/

# Sets env variables to override the config file
ENV DBSERVER="dbhost"
ENV DBNAME="xidb"
ENV DBUSER="xiuser"
ENV DBPASS="xipass"

RUN docker-php-ext-install pdo pdo_mysql