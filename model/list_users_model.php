<?php

class ListUsersModel extends Connection {
    
    //Pega todos os usuários que foram cadastrados
    public function getUsers() {
        $stmt = $this->connect()->prepare('SELECT id,username, CPF, RG, birth_date, phone FROM users');
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }
}

?>
