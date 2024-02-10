<?php

class EditUserController extends EditUserModel {

   


    //Pega infos do usuário
    public function getUserForEdit($id) {
        try {
            return $this->getUserById($id);
        } catch (PDOException $e) {
            error_log("Erro ao obter o usuário para edição:" . $e->getMessage());
            return null;
        }
    }

    //Atualiza infos do usuário
    public function updateThisUser($id, $username, $CPF, $RG, $birthDate, $phone) {
        try {
            return $this->updateUser($id, $username, $CPF, $RG, $birthDate, $phone);
        } catch (PDOException $e) {
            error_log("Erro ao atualizar informações do usuário: " . $e->getMessage());
            return false;
        }
    }

}

?>
