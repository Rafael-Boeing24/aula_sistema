<?php
if (!isset($_SESSION['usuario'])) {
    include SISTEMA . 'login.php';
    exit();
}

try {
    $stmt = $conn->prepare('select id,' . ENTER .
                           '       codigo,' . ENTER .
                           '       nome,' . ENTER .
                           '       (select sigla' . ENTER .
                           '          from estados' . ENTER .
                           '         where estados.id = cidades.estado) as estado' . ENTER .
                           '  from cidades' . ENTER .
                           ' order by id');
    $stmt->execute();

    $result = $stmt->fetchAll();
    ?>
    <table border="1" class="table table-striped">
        <tr>
            <td>ID</td>
            <td>Código</td>
            <td>Nome</td>
            <td>Estado</td>
            <td>Ação</td>
        </tr>
        <?php
        if (count($result)) {
            foreach ($result as $row) {
                ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['codigo'] ?></td>
                    <td><?= $row['nome'] ?></td>
                    <td><?= $row['estado'] ?></td>
                    <td>
                        <a href="?modulo=cidades&pagina=alterar&id=<?= $row['id'] ?>">Alterar</a>
                        <a href="?modulo=cidades&pagina=deletar&id=<?= $row['id'] ?>">Excluír</a>
                    </td>
                </tr>
                <?php
            }
        } else {
            echo "Nenhum resultado retornado.";
        }
        ?>
    </table>
    <?php
} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
