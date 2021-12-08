<?php
include('AgendamentoCrud.php');    
        $idReserva = $_GET['idReserva'];
        $result = excluirReserva($idReserva);
        if($result>0){
            echo"<script>alert('Reserva Excluida');</script>";

        }else{
            echo"<script>alert('Erro ao excluir reserva');</script>";
        
        }
        echo'<script>window.location.replace("AgendamentoTabela.php");</script>';
       

?>