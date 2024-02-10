<?php

require_once "../model/register_addresses_model.php";

class RegisterAddressController extends RegisterAddressModel {

    //Metodo para cadastrar novos endereços para o usuário
    public function addAddress($userId, $address, $CEP, $city) {
        $this->setAddress($userId, $address, $CEP, $city);
    }
}

?>
