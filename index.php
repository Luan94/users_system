<?php session_start();

if (isset($_SESSION["username"])) {
    // Usuário já está autenticado, redirecione para a página de dashboard
    header("Location: view/dashboard.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
    
    </style>
</head>

<body>

    <section class="index-login">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                
                    <div class="index-login-login p-0">
                    <h4 class="form-header-border border-bottom-custom-primarycolor p-3 mb-0">LOGIN</h4>
                        
                        
                        <form action="includes/login_user.php" method="post" class="p-4">
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                            </div>
                            <button type="submit" class="btn btn-primary mb-4" name="submit">LOGIN</button>
                    
                            <p>Ainda não tem uma conta? <a href="#" id="signup-btn">Cadastre-se aqui!</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modap para popup do formulário de cadastro -->
    <div class="modal" tabindex="-1" role="dialog" id="signupModal">
    <div class="modal-dialog" role="document">
        <h5 class="form-header-border border-bottom-custom-primarycolor p-3 mb-0 text-white">Cadastrar-se <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button></h5>
        <div class="modal-content border-none">
            <div class="modal-body">
                <form action="includes/register_user.php" method="post">
                    <div class="form-group">
                        <label for="username">Nome do usuário</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="passrepeat">Repita a senha</label>
                        <input type="password" class="form-control" id="passrepeat" name="passrepeat" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="CPF">CPF</label>
                        <input type="text" class="form-control" id="CPF" name="CPF" required>
                    </div>
                    <div class="form-group">
                        <label for="RG">RG</label>
                        <input type="text" class="form-control" id="RG" name="RG" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Telefone</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="birthdate">Data de Nascimento</label>
                        <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Cadastrar-se</button>
                </form>
            </div>
        </div>
    </div>
</div>

    <!-- Add Bootstrap JS and Popper.js scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        // Show signup modal when the "Sign up here!" link is clicked
        document.getElementById('signup-btn').addEventListener('click', function () {
            $('#signupModal').modal('show');
        });
    </script>
</body>

</html>
