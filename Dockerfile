# Usa a imagem oficial do PHP com Apache
FROM php:8.2-apache
#Copia os arquivos da sua aplicação para o diretorio padrão do apache
COPY . /var/www/html/
#Habilita módulos adicionais do Apache(opcional)
RUN docker-php-ext-install mysqli pdo pdo_mysql
#Exponha a porta padrão do Apache
EXPOSE 80
