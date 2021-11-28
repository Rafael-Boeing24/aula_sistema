<?php
if (!isset($_SESSION['usuario'])) {
    include SISTEMA . 'login.php';
    exit();
}

try {
    $stmt = $conn->prepare('select id,' . ENTER .
                           '       sigla,' . ENTER .
                           '       nome' . ENTER .
                           '  from estados' . ENTER .
                           ' order by id');
    $stmt->execute();

    //while($row = $stmt->fetch()) {
    //while($row = $stmt->fetch(PDO::FETCH_OBJ)) {
    //print_r($row);
    //}

    $result = $stmt->fetchAll();
    ?>
    <table border="1" class="table table-striped">
        <tr>
            <td>ID</td>
            <td>Sigla</td>
            <td>Nome</td>
            <td>Ação</td>
        </tr>
        <?php
        if (count($result)) {
            foreach ($result as $row) {
                ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['sigla'] ?></td>
                    <td><?= $row['nome'] ?></td>
                    <td>
                        <a href="?modulo=estados&pagina=alterar&id=<?= $row['id'] ?>">Alterar</a>
                        <a href="?modulo=estados&pagina=deletar&id=<?= $row['id'] ?>">Excluír</a>
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
