<?php include '../header.html'; ?>

<style>
    .form-box {
        background-color: #ffffff;
        border-radius: 20px;
        padding: 10px;
    }
</style>

<h2>Filmes</h2>
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