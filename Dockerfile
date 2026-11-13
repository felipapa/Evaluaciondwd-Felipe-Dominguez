FROM php:8.2-apache

# 1. Variables de entorno con los datos de conexión
ENV DB_HOST=127.0.0.1
ENV DB_PORT=3306
ENV DB_NAME=RodadosDelSudeste
ENV DB_USER=root
ENV DB_PASS=1234

# 2. Instala drivers de MySQL para PHP y el servidor MariaDB
RUN apt-get update && apt-get install -y mariadb-server \
    && docker-php-ext-install mysqli pdo pdo_mysql \
    && docker-php-ext-enable pdo_mysql mysqli \
    && rm -rf /var/lib/apt/lists/*

# 3. Copia los archivos de tu proyecto
COPY . /var/www/html/

# 4. Habilita mod_rewrite de Apache
RUN a2enmod rewrite

EXPOSE 80

# 5. Script de arranque: inicia MariaDB, configura el usuario/base de datos y arranca Apache
CMD service mariadb start && \
    mysql -e "CREATE DATABASE IF NOT EXISTS ${DB_NAME};" && \
    mysql -e "ALTER USER 'root'@'localhost' IDENTIFIED BY '${DB_PASS}'; FLUSH PRIVILEGES;" && \
    apache2-foreground
