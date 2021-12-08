<?php
    include('ControleQuartoCrud.php');    
    $idQuarto = $_GET['idQuarto'];
    $disponibilidade = $_GET['disponibilidade'];
    if($disponibilidade == 0){
        $disponibilidade = 1;
    }else{
        $disponibilidade = 0;
    }
    $result = desabilitarQuarto($idQuarto,$disponibilidade);
    if($result>0){
        echo"<script>alert('Servico desabilitado');</script>";

    }else{
        echo"<script>alert('Erro ao desabilitar');</script>";
    
    }
    header('Location: servicosTabela.php');
?>