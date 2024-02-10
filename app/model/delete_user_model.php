<?php

class DeleteUserModel extends Connection {


    //Pega o ID do usuário que será deletado para tratamento de erros desta operação
    public function getUserById($id) {
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    //Deleta o usuário
    public function deleteUser($id) {
        $stmt = $this->connect()->prepare('DELETE FROM users WHERE id = ?');
        $stmt->execute([$id]);
    }
}


?>
