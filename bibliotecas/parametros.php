<?php

// Configurações para os diretórios do sitema.
define('ROOT_DIR', dirname(__DIR__));
define('BIBLIOTECAS', dirname(__DIR__) . "/bibliotecas/");
define('LAYOUTS', dirname(__DIR__) . "/layouts/");
define('CADASTROS', dirname(__DIR__) . "/cadastros/");
define('PESSOAS', dirname(__DIR__) . "/cadastros/pessoas/");

// Configurações para a conexão com o Banco de Dados.
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_SENHA', '');
define('DB_BASE', 'aulaweb');