<?php
include('AgendamentoCrud.php'); 
    if(isset($_GET['preco'])){
       $preco = $_GET['preco'];
       $idReserva = $_GET['idReserva'];
        salvarPreco($preco,$idReserva);
        echo"<script>window.location.replace('AgendamentoTabela.php');</script>";
    }else{
        $idReserva = $_POST['idReserva'];
        $idQuarto = $_POST['idQuarto'];
        echo"<script>alert('Salvo')</script>";
        
        salvarReservaQuarto($idReserva,$idQuarto);
        if($idReserva>0){
           echo"<script>alert('Salvo')</script>";
           echo"<script>window.location.replace('AgendamentoFormulario.php?idReserva={$idReserva}');</script>";
        }
    }
    
?>