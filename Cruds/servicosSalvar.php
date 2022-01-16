<?php
include('servicosCrud.php');
    $conexao = criarConexao();
    $idServico = $_POST['idServico'];
    $servico = $_POST['servico'];
    $desc = $_POST['desc'];
    $preco = $_POST['preco'];
    if(empty($_POST['qtd'])){
        $qtd = 0;
    }else{
        $qtd = $_POST['qtd'];
    }
    
    if(empty($_POST['tempo'])){
        $tempo = 0; 
    }else{
        $tempo = $_POST['tempo'];
    }
    salvarServicos($idServico,$servico,$desc,$preco,$qtd,$tempo);
    header('Location: ../Cruds/servicosTabela.php');

?>