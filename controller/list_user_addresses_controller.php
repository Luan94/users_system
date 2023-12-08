<?php

require_once "../model/list_user_addresses_model.php";

class ListUserAddressController extends ListUserAddressModel {

    //Pega os endereçõs cadastrados pelo usuário de id: "n°"
    public function getAddressesByUserId($userId) {
        return $this->getAddressesByUserIdInModel($userId);
    }
}

?>
