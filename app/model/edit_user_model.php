<?php

class EditUserModel extends Connection {
    
    //Pega o usuário por ID para carregar as informações no formulário
    public function getUserById($id) {
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE id = ?');
        
        try {
            $stmt->execute([$id]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro na consulta SQL: " . $e->getMessage();
            return false;
        }       
        return $user;
    }

    //Pega o usuário por ID para carregar as informações no formulário
    public function updateUser($id, $username, $CPF, $RG, $birthDate, $phone) {
        $stmt = $this->connect()->prepare('UPDATE users SET username = ?, CPF = ?, RG = ?, birth_date = ?, phone = ? WHERE id = ?');
        $stmt->execute([$username, $CPF, $RG, $birthDate, $phone, $id]);
    }
}

?>