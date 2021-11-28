<?php
if (!isset($_SESSION['usuario'])) {
    include SISTEMA . 'login.php';
    exit();
}

try {
    $stmt = $conn->prepare('select id,' . ENTER .
                           '       marca,' . ENTER .
                           '       nome,' . ENTER .
                           '       quantidade,' . ENTER .
                           '       valorunitario,' . ENTER .
                           '       round((valorunitario * quantidade), 2) as valortotal' . ENTER .
                           'from produtos');
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
            <td>Marca</td>
            <td>Nome</td>
            <td>Quantidade</td>
            <td>Valor Unitário</td>
            <td>Valor Total</td>
        </tr>
        <?php
        if (count($result)) {
            foreach ($result as $row) {
                ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['marca'] ?></td>
                    <td><?= $row['nome'] ?></td>
                    <td><?= $row['quantidade'] ?></td>
                    <td><?= $row['valorunitario'] ?></td>
                    <td><?= $row['valortotal'] ?></td>
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
