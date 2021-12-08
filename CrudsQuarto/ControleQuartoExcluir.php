<?php			
	include_once "ControleQuartoCRUD.php";

	$idQuarto = $_POST['idQuarto'];
	$resultado = excluirQuarto($idQuarto);
	
	echo $resultado;
?>