<?php			
	include_once "ClienteCRUD.php";
	
    $cpf = $_POST['cpf'];
    $idUsuario = $_POST['idUsuario'];

    $quantidade = verificarClientePorCPF($idUsuario, $cpf);
 
    if($quantidade == 0){
        echo "true";
    } else{
        echo "false";
    }  

    
?>	