<?php

if(isset($_POST["add_address"]))
{
    // Pegando dados do POST add_address
    $user_id = $_POST['user_id'];
    $address = $_POST['address'];
    $CEP = $_POST['CEP'];
    $city = $_POST['city'];
    
    // Incluindo arquivos necessários para a execução da ação
    include "../model/register_addresses_model.php";
    include "../controller/register_addresses_controller.php";
    
    // Instanciando a classe RegisterAddressController
    $registerAddressController = new RegisterAddressController();
    
    // Chamando o método do controller para o cadastro de um novo endereço
    $registerAddressController->addAddress($user_id, $address, $CEP, $city);

    header("location: ../view/edit_user_view.php?user_id=" . $user_id);
}