<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário - <?php echo $user['username']; ?></title>

    <!-- Adicição de stylesheets do Bootstrap, style personalizado com esquema de cores e fontAwesome para utilizar ícones -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container">
        <div class="navbar-brand text-white">Bem-vindo, <?php echo $_SESSION["username"]; ?>!</div>
        
        <!-- Botão de alternância para dispositivos móveis -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="../view/dashboard.php">Dashboard</a>
                </li>
            </ul>
            
            <ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION["username"])) { ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../includes/log_out.php" class="header-login-a">Sair &nbsp;<i class="fa-solid fa-right-from-bracket"></i></a>
                    </li>
                <?php }  ?>                 
            </ul>
        </div>
    </div>
</nav>



<div class="container mt-5 mb-5 pb-5">