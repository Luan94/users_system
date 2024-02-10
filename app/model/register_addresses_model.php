<?php

require_once "../connection.php";

//Cadastra novo endereço de um usuário
class RegisterAddressModel extends Connection {
    public function setAddress($userId, $address, $CEP, $city) {
        $stmt = $this->connect()->prepare('INSERT INTO users_addresses (user_id, address, CEP, city) VALUES (?, ?, ?, ?)');
        $stmt->execute([$userId, $address, $CEP, $city]);
    }
}

?>
