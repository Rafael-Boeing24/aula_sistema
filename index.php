<?php
include "bibliotecas/parametros.php";
include "bibliotecas/conexao.php";

// Inicia a sessão.
session_start();

include LAYOUTS . 'header.php';

if (!isset($_SESSION['usuario'])) {
    include SISTEMA . 'login.php';
    exit();
}

include LAYOUTS . 'menu.php';

if (!filter_input(INPUT_GET, 'pagina')) {
    include LAYOUTS . 'home.php';
} else {
    include CADASTROS . filter_input(INPUT_GET, 'modulo') . '/' . filter_input(INPUT_GET, 'pagina') . '.php';
}

include LAYOUTS . 'footer.php';
