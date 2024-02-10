<?php


class ListUserAddressModel extends Connection {

    //Pega os endereços que pertencem ao usuário de id = "n°"
    public function getAddressesByUserIdInModel($userId) {
        $stmt = $this->connect()->prepare('SELECT * FROM users_addresses WHERE user_id = ?');
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
