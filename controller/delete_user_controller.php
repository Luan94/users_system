<?php

class DeleteUserController extends DeleteUserModel {
    private $userModel;

    public function __construct() {
        $this->userModel = new DeleteUserModel();
    }

    //Deletar usuário
    public function deleteUser($id) {
        try {

            //Espaço para adicionar lógica adicional se necessário
            $user = $this->userModel->getUserById($id);

            if (!$user) {
                // Usuário não encontrado
                return "Usuário não encontrado.";
            }

            // Tenta deletar o usuário
            $deleteSuccessful = $this->userModel->deleteUser($id);

            if ($deleteSuccessful) {
                
                return "Usuário deletado com sucesso!";
            } else {
                
                return "Falha ao deletar o usuário.";
            }
        } catch (PDOException $e) {
            //pegar PDO database Exception caso tenha
            return "Erro no banco de dados: " . $e->getMessage();
        }
    }
}


?>
