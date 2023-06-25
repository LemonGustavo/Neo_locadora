<?php include '../header.html'; ?>

<style>
    .form-box {
        background-color: #ffffff;
        border-radius: 20px;
        padding: 10px;
    }
</style>

<h2>Categorias</h2>
<div class="form-box">
    <form name="categorias" method="POST">
    <div class="row justify-content-md-center">
    <div class="col col-lg-2">
            <label for="categoria_id">Número de identificação:</label><br />
            <input type="text" name="categoria_id" id="categoria_id" size="20" maxlength="20" /><br />
        </div>

        <div class="col">
            <label for="nome">Gênero:</label><br />
            <input type="text" name="nome" id="nome" size="20" maxlength="100" /><br />
        </div>

        <input type="submit" name="submit" value="Inserir">
        <input type="reset" value="Limpar"/>
        <hr>
</form>
</div>


<?php
include 'selectCat.php';
$dados = $conexao->selectAllCat();
foreach ($dados as $dado) {
    echo $dado['categoria_id'] . "<br />" .
        $dado['nome'] . "<br />" .
        $dado['ultima_atualizacao'] . "<br />";

    echo "<form method='POST'>";
    echo "<input type='hidden' name='categoria_id' value='" . $dado['categoria_id'] . "' />";
    echo "<input type='submit' name='apagar' value='Apagar' />";
    echo "</form>";

    echo "<form method='POST'>";
    echo "<input type='hidden' name='categoria_id' value='" . $dado['categoria_id'] . "' />";
    echo "<input type='text' name='nome' value='" . $dado['nome'] . "' />";
    echo "<input type='submit' name='atualizar' value='Atualizar' />";
    echo "</form>";

    echo "<hr />";
}
?>


<?php include '../footer.html'; ?>