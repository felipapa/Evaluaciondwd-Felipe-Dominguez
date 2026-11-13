FROM php:8.2-apache

# Instala los drivers para MySQL (PDO y MySQLi)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copia los archivos del proyecto
COPY . /var/www/html/

# Habilita mod_rewrite
RUN a2enmod rewrite

EXPOSE 80
