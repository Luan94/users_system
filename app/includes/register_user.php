<?php

if(isset($_POST["submit"]))
{
    // Pegando dados do POST submit (para registro de usuário)
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passrepeat = $_POST['passrepeat'];
    $name = $_POST['name'];
    $CPF = $_POST['CPF'];
    $RG = $_POST['RG'];
    $phone = $_POST['phone'];
    $birthdate = $_POST['birthdate'];

    // Incluindo arquivos necessários para o registro de usuário
    
    include "../model/register_user_model.php";
    include "../controller/register_user_controller.php";
    
    // Instanciando a classe Register
    $register = new RegisterController($username, $password, $passrepeat,$name, $CPF, $RG, $phone, $birthdate);

    // Tratamento de erros e operação de registro de usuário
    $register->registerUser();

}
