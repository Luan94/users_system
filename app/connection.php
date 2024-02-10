<?php

class Connection {
    private $host = 'users_system_db';
    private $database = 'users_system';
    private $username = 'luan94';
    private $password = '123456';
    private $port = '3307'; // Adicione a porta aqui

    public function connect() {
        try {
            $dsn = 'mysql:host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->database; // Adicione a porta aqui
            $dbh = new PDO($dsn, $this->username, $this->password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $dbh->exec("set names utf8mb4");
            return $dbh;
        } catch (PDOException $e) {
            throw new PDOException("Erro ao conectar: " . $e->getMessage());
        }
    }
}

// Testar a conexão
$connection = new Connection();
try {
    $dbh = $connection->connect();
} catch (PDOException $e) {
    // Se ocorrer um erro ao conectar, exibir mensagem de erro
    echo "Erro ao conectar: " . $e->getMessage();
}