<?php
include('servicosCrud.php');    
        $idServicos = $_GET['servico'];
        $result = excluirServicos($idServicos);
        if($result>0){
            echo"<script>alert('Serviço Excluido');</script>";

        }else{
            echo"<script>alert('Erro ao excluir serviço');</script>";
        
        }
        echo'<script>window.location.replace("servicosTabela.php");</script>';
       

?>