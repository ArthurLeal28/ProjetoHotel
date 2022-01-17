<?php
include('AgendamentoCrud.php');
    
    $idReserva = $_POST['idReserva'];
    $dtEntrada = $_POST['dtEntrada'];
    $dtSaida = $_POST['dtSaida'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $idCliente = $_POST['cliente'];
    $qtdA = $_POST['qtdA'];
    $qtdCcinco = $_POST['qtdCcinco'];
    $pagamento = $_POST['pagamento'];
    if(empty($_POST['qtdC'])){
        $qtdC = 0;
    }else{
        $qtdC = $_POST['qtdC'];
    }
     $idReserva = salvarReserva($idReserva,$dtEntrada,$dtSaida,$start,$end,$idCliente,$qtdA,$qtdCcinco,$pagamento);
    if($idReserva>0){
       echo"<script>alert('Salvo')</script>";
       echo"<script>window.location.replace('AgendamentoFormulario.php?idReserva={$idReserva}');</script>";
    }
?>
    