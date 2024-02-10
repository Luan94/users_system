<?php

include "../connection.php";

class Login extends Connection {


    //Método para login do usuário, faz requisições e comparações no banco de dados para verificar se o Login existe, é Possivel logar por username ou CPF
    protected function getUser($username, $password) {
        $stmt = $this->connect()->prepare('SELECT password FROM users WHERE username = ? or CPF = ?;');

        if (!$stmt->execute(array($username, $username))) {
            exit();
        }

        if ($stmt->rowCount() == 0) {
            exit();
        }

        $hashedPassword = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPassword = password_verify($password, $hashedPassword[0]["password"]);

        if (!$checkPassword) {
            exit();
        } else {
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE username = ? OR CPF = ? AND password = ?;');

            if (!$stmt->execute(array($username, $username, $password))) {
                $stmt = null;
                exit();
            }

            if ($stmt->rowCount() == 0) {
                $stmt = null;
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["id"] = $user[0]["id"];
            $_SESSION["username"] = $user[0]["username"];

            // Regenerar o ID da sessão para aumentar a segurança
            session_regenerate_id();

            $stmt = null;
        }
    }
}

?>
