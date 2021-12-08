<?php			
	include_once "ClienteCRUD.php";

	$idUsuario = $_POST['idUsuario'];
	$registro = recuperarClientePorId($idUsuario);
	$idEndereco = $registro['idEndereco'];
	
	$resultado = excluirCliente($idUsuario);
	if($resultado>0){
	    excluirEndereco($idEndereco);
	}
	echo $resultado;
?>