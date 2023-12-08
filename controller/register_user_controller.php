<?php

class RegisterController extends Register{

 private $username;
 private $password;
 private $passrepeat;
 private $name;
 private $CPF;
 private $RG;
 private $phone;
 private $birthdate;

public function __construct($username,$password,$passrepeat,$name,$CPF,$RG,$phone,$birthdate){

    $this->username = $username;
    $this->password = $password;
    $this->passrepeat = $passrepeat;
    $this->name = $name;
    $this->CPF = $CPF;
    $this->RG = $RG;
    $this->phone = $phone;
    $this->birthdate =$birthdate;
}


public function registerUser(){

    //Abaixo: uso dos métodos para validação de registro do usuário
    if ($this->CheckIfEmpty() == false) {
        echo '<script>alert("Existem campos obrigatórios que estão vazios!!");</script>';
        echo '<script>window.location.href = "../index.php";</script>';
    }
    
    if ($this->usernameValidation() == false) {
        echo '<script>alert("Este nome de usuário é inválido");</script>';
        echo '<script>window.location.href = "../index.php";</script>';
    }
    
    if ($this->PasswordRepeatValidation() == false) {
        echo '<script>alert("As senhas não coincidem");</script>';
        echo '<script>window.location.href = "../index.php";</script>';
    }
    
    if ($this->checkIfUserExists() == false) {
        echo '<script>alert("Este usuário já existe");</script>';
        echo '<script>window.location.href = "../index.php";</script>';
    }
    
    if ($this->CPFValidation() == false) {
        echo '<script>alert("Este CPF é inválido");</script>';
        echo '<script>window.location.href = "../index.php";</script>';
        exit();
        
    }
    
    //Se tudo deu certo acima, cadastre o usuário
    $this->setUser($this->username,$this->password,$this->name,$this->CPF,$this->RG,$this->phone,$this->birthdate);

    header("Location: ../index.php");
    exit(); // Certifique-se de parar a execução do script após o redirecionamento

}

//Checar se há campos vazios
private function CheckIfEmpty(){
    
    if(empty($this->username) || empty($this->password) || empty($this->passrepeat) || empty($this->name) || empty($this->CPF) || empty($this->RG) || empty($this->phone) || empty($this->birthdate))
    {
        return false;
    } else {
        return true;
    }  

}

//Checar se username é valido
private function usernameValidation() {
    $isValid;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->username)){
            return false;
        }else{
            return true;
        }
}

//Checar se senha e senha repetida são iguais
private function PasswordRepeatValidation() {
        if ($this->password !== $this->passrepeat){
            return false;
        }else{
            return true;
        }
}

//Checar se o username a cadastrar já está em uso no banco de dados
private function checkIfUserExists() {
    if (!$this->checkUserExists($this->username,$this->CPF)){
        return false;
    }else{
        return true;
    }
}

//Validador de CPF
private function validateCPF($cpf) {
    // Remover caracteres não numéricos
    $cpf = preg_replace('/[^0-9]/', '', $cpf);

    // Verificar se o CPF tem 11 dígitos
    if (strlen($cpf) !== 11) {
        return false;
    }

    // Calcular o primeiro dígito verificador
    $sum = 0;
    for ($i = 0; $i < 9; $i++) {
        $sum += $cpf[$i] * (10 - $i);
    }
    $remainder = $sum % 11;
    $digit1 = ($remainder < 2) ? 0 : 11 - $remainder;

    // Calcular o segundo dígito verificador
    $sum = 0;
    for ($i = 0; $i < 10; $i++) {
        $sum += $cpf[$i] * (11 - $i);
    }
    $remainder = $sum % 11;
    $digit2 = ($remainder < 2) ? 0 : 11 - $remainder;

    // Verificar se os dígitos verificadores são válidos
    if ($cpf[9] != $digit1 || $cpf[10] != $digit2) {
        return false;
    }

    return true;
}


// Validar CPF a cadastrar
private function CPFValidation()
{
    $isCPFValid = $this->validateCPF($this->CPF);
    if (!$isCPFValid) {
        return false;
    }
    return true;
}
    


}