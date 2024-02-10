<?php

class LoginController extends Login{

 private $username;
 private $password;
 

public function __construct($username,$password){

    $this->username = $username;
    $this->password = $password;

}

public function LoginUser(){
    if($this->CheckIfEmpty() == false){
        header("Location: ../index.php");
        echo '<script>alert("Existem campos obrigatórios que estão vazios!");</script>';        
        exit();
    }

    $this->GetUser($this->username,$this->password);
    header("Location: ../view/dashboard.php");
    exit();
}


//Metodo para a validação se todos os campos estão preenchidos
private function CheckIfEmpty(){
    $isValid;
    if(empty($this->username) || empty($this->password))
    {
        $isValid = false;
    } else {
        $isValid = true;
    }

    return $isValid;

}



}