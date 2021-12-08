<?php
include_once('bancoDeDados.php');
        function salvarReserva($idReserva,$dtEntrada,$dtSaida,$start,$end,$idCliente,$qtdA,$qtdC,$idQuarto,$pagamento,$preco){
        
        $conexao = criarConexao();
        if($idReserva == 0){
            $query = "INSERT INTO `reserva` (`idReserva`, `dtEntrada`, `dtSaida`, `start`, `end`, `idUsuario`, `qtdA`,`qtdC`,`idQuarto`,`pagamento`,`preco`) VALUES (NULL, '{$dtEntrada}', '{$dtSaida}', '{$start}','{$end}', {$idCliente}, '{$qtdA}','{$qtdC}',{$idQuarto},'{$pagamento}',110)";
            $result = $conexao->prepare($query);
        }else{
            $query = "UPDATE `reserva` SET servico = '{$nome}', descricao = '{$desc}',preco = '{$preco}', quantidade = '{$quantidade}',tempo='{$tempo}' WHERE idReserva = $idReserva;";
            $result = $conexao->prepare($query);
         
        }
        $result->execute();
        $conexao = null;
        echo $result->rowCount();
    
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
        $query = "SELECT * FROM tbCliente c, reserva r,quarto q WHERE c.idUsuario = r.idUsuario and q.idQuarto=r.idQuarto";
        $result = $conexao->prepare($query);
        $result->execute();
        $conexao = null;
        return $result->fetchAll();

        $conexao = criarConexao();
        $query = "SELECT * FROM reserva";
        $result = $conexao->prepare($query);
        $result->execute();
        $conexao = null;
        return $result->fetchAll();
    }

    function buscarReserva($idReserva){
            $conexao = criarConexao();  
            $query = "SELECT * FROM tbCliente c, reserva r,quarto q WHERE idReserva = $idReserva and c.idUsuario = r.idUsuario and q.idQuarto=r.idQuarto";
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
  

?>