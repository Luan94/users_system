<?php

if(isset($_POST["submit"]))
{
    // Pegando dados do POST submit (para o login)
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Incluindo arquivos necessários para efetuar o login    
    include "../model/login_model.php";
    include "../controller/login_controller.php";
    
    // Instanciando a classe de Login
    $login = new LoginController($username, $password);

    // Tratamento de erros e operação do login
    $login->LoginUser();

}
