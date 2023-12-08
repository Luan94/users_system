<?php

class ListUsersController extends ListUsersModel {

    //Pega lista de usuários para a exibição
    public function getUsersForList() {
        try {
            return $this->getUsers();
        } catch (PDOException $e) {
            error_log("Erro ao obter lista de usuários: " . $e->getMessage());
            return null;
        }
    }
}

?>
