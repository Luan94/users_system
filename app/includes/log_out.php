<?php

//Sequência para o encerramento de sessão (LOGOUT)
session_start();
session_unset();
session_destroy();

//volta para pagina inicial
header("location: ../index.php?error=none");