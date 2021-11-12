<?php
if (filter_input(INPUT_POST, 'gravar')) {
    try {
        $stmt = $conn->prepare('INSERT INTO cidades (nome, estado) values (:nome, :estado)');
        // Processa o cadastro da cidade no sistema
        if ($stmt->execute(array('nome' => filter_input(INPUT_POST, 'nome'), 'estado' => filter_input(INPUT_POST, 'estado')))) {
            include CADASTROS . 'cidades/listagem.php';
            exit();
        }
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
}
?>
<form method="post">
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" required>
        <label for="nome">Estado</label>
        <select class="form-control" name="estado" required>
            <?php
            $stmt = $conn->prepare('select id,' . ENTER .
                                   '       nome' . ENTER .
                                   '  from estados');
            $stmt->execute();

            $sOptions = '<option value="">Selecione...</option>';
            while ($oRes = $stmt->fetchObject()) {
                $sOptions .= '<option value="' . $oRes->id . '">' . $oRes->nome . '</option>';
            }
            echo $sOptions;
            ?>
        </select>
    </div>
    <input type="submit" name="gravar" value="Gravar">
</form>
