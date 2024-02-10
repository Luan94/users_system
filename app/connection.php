<?php

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

echo getenv('DB_HOST'); echo getenv('DB_USERNAME'); echo getenv('DB_DATABASE');

class Connection {

    public function connect() {
        try {
            // Montar a string de conexão
            $dsn = 'mysql:host=' . getenv('DB_HOST') . ';dbname=' . getenv('DB_DATABASE');
            
            // Criar uma nova instância do PDO
            $dbh = new PDO($dsn, getenv('DB_USERNAME'), getenv('DB_PASSWORD'));

            // Definir o modo de erro do PDO para exceção
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Definir o charset para utf8mb4
            $dbh->exec("set names utf8mb4");

            return $dbh;
        } catch (PDOException $e) {
            // Capturar e imprimir detalhes do erro
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}

// Testar a conexão
$connection = new Connection();
try {
    $dbh = $connection->connect();
    echo "Conexão bem-sucedida!";
} catch (PDOException $e) {
    // Se ocorrer um erro ao conectar, exibir mensagem de erro
    echo "Erro ao conectar: " . $e->getMessage();
}
