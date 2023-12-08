<?php

include "../config/connection.php";

class Register extends connection{


    //Método para cadastrar o usuário
    protected function setUser($username,$password,$name,$CPF,$RG,$phone,$birthdate) {
    $stmt=$this->connect()->prepare('INSERT INTO users (username,password,name,CPF,RG,phone,birth_date) VALUES (?, ?, ?, ?, ?, ?, ?);');
    $hashedPassword=password_hash($password, PASSWORD_DEFAULT);
    if(!$stmt->execute(array($username,$hashedPassword,$name,$CPF,$RG,$phone,$birthdate))) {
        $stmt = null;
        header("location: ../index.php?error=stmtfailed");
        exit();
    }
    $stmt = null;

    }


    //Método para verificar se username ou CPF já está em uso
    protected function checkUserExists($username, $CPF) {
        $stmt = $this->connect()->prepare(
            'SELECT username FROM users WHERE username = ? OR CPF = ?;'
        );

        if(!$stmt->execute(array($username, $CPF))){
            $stmt = null;
            header("location: ../index.php?error=stmterror");
            exit();
        }

        $result;
        if($stmt->rowCount() > 0){
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }


}

?>