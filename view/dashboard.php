<?php
session_start();

if (!isset($_SESSION["id"])) {
    // Usuário não está autenticado, redirecione para a página de login
    header("Location: index.php");
    exit();
}

require_once "../config/connection.php";
require_once "../model/list_users_model.php";
require_once "../controller/list_users_controller.php";
require_once "../model/delete_user_model.php";
require_once "../controller/delete_user_controller.php";

$listUsersController = new ListUsersController();
$deleteUserController = new DeleteUserController();

$users = $listUsersController->getUsersForList();


//Funciona porém TO DO: passar este método do formulário e ajustar o código para seu include na pasta ../includes para organização da estrutura da aplicação
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['delete_user'])) {
        $userIdToDelete = $_POST['user_id'];
        $deleteUserController->deleteUser($userIdToDelete);        
        header("Location: dashboard.php"); 
        exit();
    }
}


//Adiciona Header da aplicação
include "../includes/layout_header.php";

?>


<div class="container table-responsive my-4 mb-5">
<h2 class="mb-3 pb-2 border-bottom-custom-primarycolor">Lista de Usuários Cadastrados</h2>

    <table class="table table-bordered mt-5">
        <thead>
            <tr class="align-middle">
                <th>Username</th>
                <th>CPF</th>
                <th>RG</th>
                <th>Data de Nascimento</th>
                <th>Telefone</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) { ?>
                <tr>
                    <td class="align-middle"><?php echo $user['username']; ?></td>
                    <td class="align-middle"><?php echo $user['CPF']; ?></td>
                    <td class="align-middle"><?php echo $user['RG']; ?></td>
                    <td class="align-middle"><?php echo $user['birth_date']; ?></td>
                    <td class="align-middle"><?php echo $user['phone']; ?></td>
                    <td class="d-flex justify-content-center align-middle">
                        <a href="edit_user_view.php?user_id=<?php echo $user['id']; ?>" class="btn btn-primary mr-2">Editar</a>
                        <form action="dashboard.php" method="post" style="display: inline;">
                            <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                            <button type="submit" name="delete_user" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>

<?php include "../includes/layout_footer.php"; ?>