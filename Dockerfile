# Use a imagem PHP oficial como base
FROM php:latest

WORKDIR /users_system
# Copie os arquivos do código-fonte para o diretório de trabalho do contêiner
COPY . .

# Exponha a porta 8080 para acesso HTTP
EXPOSE 8080

# Comando padrão para executar o servidor web embutido do PHP
CMD ["php", "-S", "0.0.0.0:8080", "-t", "/users_system"]