<?php include '../header.html'; ?>

<style>
    .form-box {
        background-color: #ffffff;
        border-radius: 20px;
        padding: 10px;
    }
</style>

<h2>Atores</h2>
<div class="form-box">
    <form name="atores" method="POST">
    <div class="row justify-content-md-center">
    <div class="col col-lg-2">
            <label for="ator_id">Número de identificação:</label><br />
            <input type="text" name="ator_id" id="ator_id" size="20" maxlength="20" /><br />
        </div>

        <div class="col">
            <label for="primeiro_nome">Nome:</label><br />
            <input type="text" name="primeiro_nome" id="primeiro_nome" size="20" maxlength="100" /><br />
        </div>

        <div class="col">
            <label for="ultimo_nome">Sobrenome:</label><br />
            <input type="text" name="ultimo_nome" id="ultimo_nome" size="20" maxlength="100" /><br />
        </div>

        <input type="submit" name="submit" value="Inserir">
        <input type="reset" value="Limpar"/>
        <hr>
    </form>
</div>


<?php
include 'select.php';
$dados = $conexao->selectAll();
foreach ($dados as $dado) {
    echo $dado['ator_id'] . "<br />" .
        $dado['primeiro_nome'] . "<br />" .
        $dado['ultimo_nome'] . "<br />" .
        $dado['ultima_atualizacao'] . "<br />";

    echo "<form method='POST'>";
    echo "<input type='hidden' name='ator_id' value='" . $dado['ator_id'] . "' />";
    echo "<input type='submit' name='apagar' value='Apagar' />";
    echo "</form>";

    echo "<form method='POST'>";
    echo "<input type='hidden' name='ator_id' value='" . $dado['ator_id'] . "' />";
    echo "<input type='text' name='primeiro_nome' value='" . $dado['primeiro_nome'] . "' />";
    echo "<input type='text' name='ultimo_nome' value='" . $dado['ultimo_nome'] . "' />";
    echo "<input type='submit' name='atualizar' value='Atualizar' />";
    echo "</form>";

    echo "<hr />";
}
?>


<?php include '../footer.html'; ?>