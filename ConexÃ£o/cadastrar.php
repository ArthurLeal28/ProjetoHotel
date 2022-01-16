<?php
session_start();
include_once('conectar.php');
$conexao = criarConexao();

    $usuario =  $_POST['usuario'];
    $senha =  $_POST['senha']; 
    $nome = $_POST['nome'];



if(empty($_POST['usuario']) || empty($_POST['senha']) || empty($_POST['nome'])) {
	header('Location:  https://lealdigitalmarketing.000webhostapp.com/index.php');
	exit();
}

    $query = "SELECT * FROM `tbusuario` where email = '{$usuario}'";
    $result = $conexao->prepare($query);
    $result->execute();
    $row = $result->rowCount();

if($row == 1) {
    $_SESSION['nao_cadastrado'] = true;
	header('Location: https://lealdigitalmarketing.000webhostapp.com/index.php');
	exit();
} else {
    $_SESSION['cadastrado'] = true;
    $query = "INSERT INTO `tbusuario` (`email`,`senha`,`nome`,`adm`) VALUES ('{$usuario}',md5({$senha}),'{$nome}',0);";
    $result = $conexao->prepare($query);
    $result->execute();
    header('Location: https://lealdigitalmarketing.000webhostapp.com/index.php');
}
   

?>