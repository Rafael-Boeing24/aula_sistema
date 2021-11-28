<?php
if (filter_input(INPUT_POST, 'registrar')) {
    try {
        $stmt = $conn->prepare('insert into usuarios (nome, login, email, password)' . ENTER .
                               'values (:nome, :usuario, :email, :senha)');
        // Processa o cadastro da cidade no sistema
        if ($stmt->execute(array('email' => filter_input(INPUT_POST, 'email'), 'senha' => md5(filter_input(INPUT_POST, 'senha'))))) {
            include SISTEMA . 'login.php';

            exit();
        }
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
}
?>

<form method="post">
    <div class="form-group">
        <label for="email">Nome</label>
        <input type="text" class="form-control" name="nome" id="nome" required>
        <label for="email">Usuário</label>
        <input type="text" class="form-control" name="usuario" id="usuario" required>
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" required>
        <label for="senha">Senha</label>
        <input type="password" class="form-control" name="senha" id="senha" required>
    </div>
    <input type="submit" class="btn btn-success" name="registrar" value="Registrar">
</form>
