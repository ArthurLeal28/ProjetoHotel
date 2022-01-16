<?php			
	include_once "ControleQuartoCRUD.php";
	
	$idQuarto = $_POST['idQuarto'];
	$tpquarto = $_POST['tpquarto'];
	$nivelquarto = $_POST['nivelquarto'];
	$tpcama = $_POST['tpcama'];
	$descricao = $_POST['descricao'];
	$preco = $_POST['preco'];
	$quantidade = salvarQuarto($idQuarto, $tpquarto, $nivelquarto, $tpcama, $descricao, $preco);

	echo"<script>alert($quantidade);</script>";
	if($quantidade > 0){

		echo  "<script>alert('Registro salvo com sucesso!');</script>";
		echo  "<script>window.location.replace('ControleQuartoTabela.php');</script>";
	}else{
		echo  "<script>alert('Erro ao salvar o registro');</script>";
		echo  "<script>window.location.replace('ControleQuartoFormulario.php');</script>";		
	}
?>