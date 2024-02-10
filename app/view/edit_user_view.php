<?php
session_start();

if (!isset($_SESSION["id"])) {
    // Usuário não está autenticado, redirecione para a página de login
    header("Location: index.php");
    exit();
}


//Arquivos necessários
require_once "../connection.php";
require_once "../model/edit_user_model.php";
require_once "../controller/edit_user_controller.php";
require_once "../controller/list_user_addresses_controller.php";

$editUserController = new EditUserController();
$addressController = new ListUserAddressController();

// Certifique-se de que 'user_id' está definido (Ele vem de um parâmetro da URL)
$id = isset($_GET['user_id']) ? $_GET['user_id'] : null;

// Verifique se $id está definido antes de tentar obter o usuário
if ($id !== null) {
    
    // Se o formulário foi enviado, atualize o usuário
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["edit_user"])) {
        $username = $_POST['username'];
        $CPF = $_POST['CPF'];
        $RG = $_POST['RG'];
        $birthDate = $_POST['birthDate'];
        $phone = $_POST['phone'];

        // Atualize o usuário
        $editUserController->updateThisUser($id, $username, $CPF, $RG, $birthDate, $phone);
    }

    // Recupere os dados do usuário
    $user = $editUserController->getUserForEdit($id);

    // Obtenha os endereços do usuário
    $addresses = $addressController->getAddressesByUserId($id);
    
} else {
    // Lógica para lidar com a ausência do 'user_id', como redirecionar ou exibir uma mensagem de erro (nenhuma por enquanto)
    echo '<script>alert("usuário não definido");</script>';
    echo '<script>window.location.href = "dashboard.php";</script>';
    exit();
}

//Adição do Header da aplicação
include "../includes/layout_header.php";

?>

<div class="container my-4 mb-5">
    <h3 class="form-header-border border-bottom-custom-primarycolor p-3 mb-0">Editar Usuário: <?php echo $user['username']; ?></h3>
    <form action="edit_user_view.php?user_id=<?php echo $id; ?>" method="post" class="shadow p-4 mb-5 bg-white rounded">
        
        <div class="col-md-6"></div>
            <input type="hidden" name="user_id" value="<?php echo $id; ?>">
                <div class="mb-3">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $user['username']; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="CPF" class="form-label">CPF:</label>
                    <input type="text" name="CPF" class="form-control" value="<?php echo $user['CPF']; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="RG" class="form-label">RG:</label>
                    <input type="text" name="RG" class="form-control" value="<?php echo $user['RG']; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="birthDate" class="form-label">Data de Nascimento:</label>
                    <input type="date" name="birthDate" class="form-control" value="<?php echo $user['birth_date']; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Telefone:</label>
                    <input type="text" name="phone" class="form-control" value="<?php echo $user['phone']; ?>" required>
                </div>

                <button type="submit" name="edit_user" class="btn btn-primary">Salvar Alterações</button>
        </form>


        <h3 class="form-header-border border-bottom-custom-primarycolor p-3 mb-0">Adicionar novo Endereço</h3>
        <form action="../includes/add_address.php" method="post" class="shadow p-4 mb-5 bg-white rounded">
        
            <input type="hidden" name="user_id" value="<?php echo $id; ?>">
            <div class="mb-3">
                <label for="new_address" class="form-label">Endereço</label>
                <input type="text" name="address" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="new_CEP" class="form-label">CEP:</label>
                <input type="text" name="CEP" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="new_city" class="form-label">Cidade</label>
                <input type="text" name="city" class="form-control" required>
            </div>

            <button type="submit" name="add_address" class="btn btn-primary">Adicionar Endereço</button>
        </form>


        
            
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Endereço</th>
                            <th>CEP</th>
                            <th>Cidade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($addresses as $address) { ?>
                            <tr>
                                <td><?php echo $address['address']; ?></td>
                                <td><?php echo $address['CEP']; ?></td>
                                <td><?php echo $address['city']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
        
        

</div>
<?php include "../includes/layout_footer.php"; ?>