# Imagem oficial do PHP 8.2 com Apache
FROM php:8.2-apache

# Porta utilizada pelo Render
ENV PORT=8080

# Instala extensões necessárias para conexão com MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Ativa o mod_rewrite do Apache
RUN a2enmod rewrite

# Copia os arquivos da aplicação
COPY . /var/www/html/

# Configura permissões
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Configura o Apache para utilizar a porta definida pelo Render
RUN sed -i "s/Listen 80/Listen ${PORT}/" /etc/apache2/ports.conf \
    && sed -i "s/<VirtualHost \*:80>/<VirtualHost *:${PORT}>/" \
    /etc/apache2/sites-available/000-default.conf

# Permite .htaccess e acesso à aplicação
RUN printf '%s\n' \
    '<Directory /var/www/html>' \
    '    Options Indexes FollowSymLinks' \
    '    AllowOverride All' \
    '    Require all granted' \
    '</Directory>' \
    >> /etc/apache2/apache2.conf

# Apache deve permanecer em primeiro plano
CMD ["apache2-foreground"]

    echo '</Directory>' >> /etc/apache2/apache2.conf

# Expõe a porta corretamente
EXPOSE ${PORT}

# Inicia o Apache
CMD ["apache2-foreground"]
