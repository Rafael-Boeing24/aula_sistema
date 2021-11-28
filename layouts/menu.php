<?php

if (filter_input(INPUT_GET, 'sair')) {
    session_destroy();
    include SISTEMA . 'login.php';
    exit();
}

$stmt = $conn->prepare('SELECT * FROM menu order by ordem,descricao');
$stmt->execute();

$resultado = $stmt->fetchAll();
?>
<div class="row">

    <?php
    foreach ($resultado as $linha) {
        ?>
        <a href="<?= $linha['endereco'] ?>"
           class="<?= $linha['classe'] ?>">
            <?= $linha['descricao'] ?></a>
        <?php
    }
    if (isset($_SESSION['usuario'])) {
        ?>
        <a href="?sair=1" class="btn btn-info mx-2 mt-2">Sair</a>
        <?php
    }
    ?>
</div>
<hr>
