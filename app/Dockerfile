# Use a imagem PHP oficial como base
FROM php:latest

RUN docker-php-ext-install pdo pdo_mysql
RUN apt-get update && apt-get install -y unzip && apt-get install -y wget && \
    wget -qO- https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /users_system

# Instale o Composer


# Instale as dependências do projeto
COPY composer.json composer.json
RUN composer install

# Copie os arquivos do código-fonte para o diretório de trabalho do contêiner
COPY . .

# Exponha a porta 8080 para acesso HTTP
EXPOSE 8080

# Comando padrão para executar o servidor web embutido do PHP
CMD ["php", "-S", "0.0.0.0:8080", "-t", "/users_system"]