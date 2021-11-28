<?php
if (filter_input(INPUT_POST, 'login')) {
    try {
        $stmt = $conn->prepare('insert into pessoas (nome) values (:nome)');
        if ($stmt->execute(array('nome' => filter_input(INPUT_POST, 'nome')))) {
            include CADASTROS . 'pessoas/listagem.php';
        }
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
}
?>
<form method="post">
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome">
    </div>
    <input type="submit" name="login" value="Gravar">
</form>
