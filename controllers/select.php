<?php
    require_once '../models/Conexao.php';
    require_once '../models/Ator.class.php';
    $conexao = new Conexao();
    $conn = $conexao->getConnection();

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) && $_POST['submit'] === 'Inserir') {
        $ator_id = $_POST['ator_id'];
        $primeiro_nome = $_POST['primeiro_nome'];
        $ultimo_nome = $_POST['ultimo_nome'];
        $ator = new Ator ($ator_id, $primeiro_nome, $ultimo_nome);
        $conexao->insert($ator);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (isset($_POST['apagar']) && $_POST['apagar'] === 'Apagar') {
            $ator_id = $_POST['ator_id'];
            $conexao->delete($ator_id);
            header("Location: /neo_locadora/controllers/ator.php");
            exit;
        }
    
        if (isset($_POST['atualizar']) && $_POST['atualizar'] === 'Atualizar') {
            $ator_id = $_POST['ator_id'];
            $primeiro_nome = $_POST['primeiro_nome'];
            $ultimo_nome = $_POST['ultimo_nome'];
    
            $ator = new Ator($ator_id, $primeiro_nome, $ultimo_nome);
            $conexao->update($ator);
    
            header("Location: /neo_locadora/controllers/ator.php");
            exit;
        }
    }
    
?>
