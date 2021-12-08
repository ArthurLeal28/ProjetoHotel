<?php			
    include_once "ClienteCRUD.php";
	
	
	$idEndereco = $_POST['idEndereco'];
	$cidade = $_POST['cidade'];
	$bairro = $_POST['bairro'];
	$rua = $_POST['rua'];
    $numero = $_POST['numero'];
	$complemento = $_POST['complemento'];
	$quantidade1 = salvarEndereco($idEndereco, $cidade, $bairro, $rua, $numero, $complemento);
	if($quantidade1 > 0){
        $idEndereco = recuperarEnderecoCliente( $cidade, $bairro, $rua, $numero, $complemento);
     }

	$idUsuario = $_POST['idUsuario'];
	$nome = $_POST['nome'];
	$telefone = $_POST['telefone'];
	$cpf = $_POST['cpf'];
    $tdNascimento = $_POST['tdNascimento'];
    $quantidade = salvarCliente($idUsuario, $nome, $telefone, $cpf, $tdNascimento,$idEndereco);


	echo  "<script>window.location.replace('ClienteTabela.php');</script>";
?>