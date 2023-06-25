<?php
    require_once '../models/Conexao.php';
    require_once '../models/Categoria.class.php';
    $conexao = new Conexao();
    $conn = $conexao->getConnection();


    //Para Categorias ---------------------------------------------------------------------------------------

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) && $_POST['submit'] === 'Inserir') {
        $categoria_id = $_POST['categoria_id'];
        $nome = $_POST['nome'];
        $categoria = new Categoria ($categoria_id, $nome);
        $conexao->insertCat($categoria);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['apagar']) && $_POST['apagar'] === 'Apagar') {
            $categoria_id = $_POST['categoria_id'];
            $conexao->deleteCat($categoria_id);
            header("Location: /neo_locadora/controllers/categorias.php");
            exit;
        }

        if (isset($_POST['atualizar']) && $_POST['atualizar'] === 'Atualizar') {
            $categoria_id = $_POST['categoria_id'];
            $nome = $_POST['nome'];
    
            $categoria = new Categoria ($categoria_id, $nome);
            $conexao->updateCat($categoria);
    
            header("Location: /neo_locadora/controllers/categorias.php");
            exit;
        }
    }