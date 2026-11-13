# Usa una imagen oficial de PHP con Apache
FROM php:8.2-apache

# Copia todos los archivos de tu proyecto al directorio del servidor web
COPY . /var/www/html/

# Habilita mod_rewrite de Apache (útil para rutas amigables o frameworks)
RUN a2enmod rewrite

# Opcional: Instala extensiones comunes de PHP (ej. para MySQL/PostgreSQL)
# RUN docker-php-ext-install mysqli pdo pdo_mysql

# Expone el puerto 80
EXPOSE 80
