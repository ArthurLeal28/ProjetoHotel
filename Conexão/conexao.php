<?php
session_start();
include_once('conectar.php');
$conexao = criarConexao();

    $usuario =  $_POST['usuario'];
    $senha =  $_POST['senha']; 

if(empty($_POST['usuario']) || empty($_POST['senha'])) {
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');
	exit();
}

$query = "SELECT * FROM `tbusuario` where email = '{$usuario}' and `senha` = md5({$senha})";
$result = $conexao->prepare($query);
$result->execute();
$row = $result->rowCount();
$result = $result->fetch();
$conexao = null;


if($row == 1) {
	    $_SESSION['usuario'] = $usuario;
	    $_SESSION['adm'] = $result['adm'];
        
	    header('Location: ../System-Template/dashboard.php');
	    exit();
	
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: ../index.php');
	exit();
}

?>