<?php

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

    //while($row = $stmt->fetch()) {
    //while($row = $stmt->fetch(PDO::FETCH_OBJ)) {
    //print_r($row);
    //}

    $result = $stmt->fetchAll();
    ?>
    <table border="1" class="table table-striped">
        <tr>
            <td>ID</td>
            <td>Código</td>
            <td>Nome</td>
            <td>Estado</td>
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
