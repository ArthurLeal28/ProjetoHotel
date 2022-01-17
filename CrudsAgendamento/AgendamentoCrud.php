<?php
include_once('bancoDeDados.php');
        function salvarReserva($idReserva,$dtEntrada,$dtSaida,$start,$end,$idCliente,$qtdA,$qtdC,$pagamento){
        
        $conexao = criarConexao();
        if($idReserva == 0){
            $query = "INSERT INTO `reserva` (`idReserva`, `dtEntrada`, `dtSaida`, `start`, `end`, `idUsuario`, `qtdA`,`qtdCcinco`,`pagamento`) VALUES (NULL, '{$dtEntrada}', '{$dtSaida}', '{$start}','{$end}', {$idCliente}, '{$qtdA}','{$qtdC}','{$pagamento}')";
            $result = $conexao->prepare($query);
        }else{
            $query = "UPDATE `reserva` SET servico = '{$nome}', descricao = '{$desc}',preco = '{$preco}', quantidade = '{$quantidade}',tempo='{$tempo}' WHERE idReserva = $idReserva;";
            $result = $conexao->prepare($query);
         
        }
        $result->execute();
        $result = $conexao->lastInsertId();
        $conexao = null;
        return $result;
        
        
    }

    function excluirReserva($idReserva){
        $conexao = criarConexao();
        $query = "DELETE FROM `reserva` WHERE idReserva = $idReserva;";
        $result = $conexao->prepare($query);
        $result->execute();
        $conexao = null;
        return $result->rowCount();
    
    }

    function tabelaReserva(){
        $conexao = criarConexao();
        $query = "SELECT * FROM tbCliente c, reserva r WHERE c.idUsuario = r.idUsuario";
        $result = $conexao->prepare($query);
        $result->execute();
        $conexao = null;
        return $result->fetchAll();

     
    }

    function buscarReserva($idReserva){
            echo"<script>alert({$idReserva})</script>";
            $conexao = criarConexao();  
            $query = "SELECT * FROM tbCliente c, reserva r WHERE r.idReserva = $idReserva and c.idUsuario = r.idUsuario";
            $result = $conexao->prepare($query);
            $result->execute();
            $conexao = null;
            return $result->fetch();
    }
    function listarUsuario(){
        $conexao = criarConexao();
        $query = "SELECT * FROM tbCliente";
        $result = $conexao->prepare($query);
        $result->execute();
        $conexao = null;
        return $result->fetchAll();
    }
    function listarQuarto(){
        $conexao = criarConexao();
        $query = "SELECT * FROM quarto";
        $result = $conexao->prepare($query);
        $result->execute();
        $conexao = null;
        return $result->fetchAll();
    }
    function listaQuarto($idQuarto){
        $conexao = criarConexao();
        $query = "SELECT * FROM quarto WHERE idQuarto=$idQuarto";
        $result = $conexao->prepare($query);
        $result->execute();
        $conexao = null;
        return $result->fetch();
    }

    function listarQuartosReservados($idReserva){
        $conexao = criarConexao();
        $query = "SELECT * FROM reservaQuartos WHERE idReserva=$idReserva";
        $result = $conexao->prepare($query);
        $result->execute();
        $conexao = null;
        return $result->fetchAll();
    }
    function  salvarReservaQuarto($idReserva,$idQuarto){
        $conexao = criarConexao();
        $query = "INSERT INTO reservaquartos (`idReserva`, `idQuarto`) VALUES ($idReserva,$idQuarto)";
        $result = $conexao->prepare($query);
        $result->execute();
        $conexao = null;
        return $result->rowCount();
    }
    function  excluirReservaQuarto($idReserva){
        $conexao = criarConexao();
        $query = "DELETE FROM `reservaquartos` WHERE idReserva = $idReserva;";
        $result = $conexao->prepare($query);
        $result->execute();
        $conexao = null;
        return $result->rowCount();
    }
    function salvarPreco($preco,$idReserva){
        $conexao = criarConexao();
        $query = "UPDATE `reserva` SET preco='{$preco}' WHERE idReserva = $idReserva;";
        $result = $conexao->prepare($query);   
        $result->execute();
        $result = $conexao->lastInsertId();
        $conexao = null;
        return $result;
    }
?>