<?php
include('servicosCrud.php');    
        $idServico = $_GET['servico'];
        $disponibilidade = $_GET['disponibilidade'];
        if($disponibilidade == 0){
            $disponibilidade = 1;
        }else{
            $disponibilidade = 0;
        }
        $result = desabilitarServicos($idServico,$disponibilidade);
        if($result>0){
            echo"<script>alert('Servico desabilitado/Habilitado');</script>";

        }else{
            echo"<script>alert('Erro ao desabilitar');</script>";
        
        }
        echo'<script>window.location.replace("servicosTabela.php");</script>';

?>