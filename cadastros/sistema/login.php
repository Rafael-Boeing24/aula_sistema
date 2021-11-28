<?php
if (filter_input(INPUT_POST, 'login')) {
    try {
        $stmt = $conn->prepare('select * from usuarios where email = :email and password = :senha');
        // Processa o cadastro da cidade no sistema
        if ($stmt->execute(array('email' => filter_input(INPUT_POST, 'email'), 'senha' => md5(filter_input(INPUT_POST, 'senha'))))) {
            $oRes = $stmt->fetchObject();
            $_SESSION['id'] = $oRes->id;
            $_SESSION['nome'] = $oRes->nome;
            $_SESSION['usuario'] = $oRes->login;
            $_SESSION['email'] = $oRes->email;

            include LAYOUTS . 'header.php';
            include LAYOUTS . 'menu.php';
            include LAYOUTS . 'home.php';
            include LAYOUTS . 'footer.php';

            exit();
        }
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
}
?>

<form method="post">
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" required>
        <label for="senha">Senha</label>
        <input type="password" class="form-control" name="senha" id="senha" required>
    </div>
    <input type="submit" class="btn btn-success" name="login" value="Salvar">
    <!--<a href="<SISTEMA?>registrar.php" class="btn btn-primary">Registrar</a>-->
    <a href="<?=SISTEMA?>/registrar.php" class="btn btn-primary">Registrar-se</a>
</form>
