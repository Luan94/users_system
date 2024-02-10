# Use a imagem oficial do MySQL como base
FROM mysql:5.6

# Copie o arquivo de configuração personalizado para dentro do contêiner
COPY my.cnf /etc/mysql/my.cnf

# Defina a variável de ambiente para a senha do root do MySQL
ENV MYSQL_ROOT_PASSWORD=123456

# Defina outras variáveis de ambiente conforme necessário
ENV MYSQL_DATABASE=users_system
ENV MYSQL_USER=luan94
ENV MYSQL_PASSWORD=123456

# Copie um script SQL para dentro do contêiner para inicializar o banco de dados com dados iniciais
COPY users_system.sql /docker-entrypoint-initdb.d/

# Exponha o diretório do soquete MySQL
VOLUME /var/run/mysqld

# Exponha a porta do MySQL
EXPOSE 3307
