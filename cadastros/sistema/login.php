<?php
if (filter_input(INPUT_POST, 'login')) {
    try {
        $stmt = $conn->prepare('select login,' . ENTER .
                               '       nome' . ENTER .
                               '  from usuarios' .
                               ' where email = :email' . ENTER .
                               '   and senha = :senha');
        if ($stmt->execute(array('email' => filter_input(INPUT_POST, 'email'), 'senha' => md5(filter_input(INPUT_POST, 'senha'))))) {
            $oRes = $stmt->fetchObject();
            include CADASTROS . 'produtos/listagem.php';
        } else {
            include CADASTROS . 'sistema/login.php';
        }
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
}
?>
<form method="post">
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email">
        <label for="senha">Senha</label>
        <input type="password" class="form-control" name="senha" id="senha">
    </div>
    <input type="submit" class="btn btn-success" name="login" value="Logar">
</form>
