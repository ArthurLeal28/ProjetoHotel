<?php
include_once('bancoDeDados.php');
        function salvarServicos($idServico,$nome,$desc,$preco,$quantidade,$tempo){
        
        $conexao = criarConexao();
        if($idServico == 0){
            $query = "INSERT INTO `tbservico` (`idServico`, `servico`, `descricao`, `tempo`, `quantidade`, `preco`, `disponibilidade`) VALUES (NULL, '{$nome}', '{$desc}', '{$tempo}','{$quantidade}', '{$preco}', '1');";
            $result = $conexao->prepare($query);
        }else{
            $query = "UPDATE `tbservico` SET servico = '{$nome}', descricao = '{$desc}',preco = '{$preco}', quantidade = '{$quantidade}',tempo='{$tempo}' WHERE idServico = $idServico;";
            $result = $conexao->prepare($query);
         
        }
        $result->execute();
        $conexao = null;
        return $result->rowCount();
    
    }

    function excluirServicos($idServico){
        $conexao = criarConexao();
        $query = "DELETE FROM `tbservico` WHERE idServico = $idServico;";
        $result = $conexao->prepare($query);
        $result->execute();
        $conexao = null;
        return $result->rowCount();
    
    }

    function tabelaServicos(){
        $conexao = criarConexao();
        $query = "SELECT * FROM tbservico";
        $result = $conexao->prepare($query);
        $result->execute();
        $conexao = null;
        return $result->fetchAll();
    }

    function buscarServicos($idServico){
            $conexao = criarConexao();  
            $query = "SELECT * FROM tbservico WHERE idServico = $idServico";
            $result = $conexao->prepare($query);
            $result->execute();
            $conexao = null;
            return $result->fetch();
    }

    function desabilitarServicos($idServico,$disponibilidade){
        $conexao = criarConexao(); 
        $query = "UPDATE `tbservico` SET disponibilidade = '{$disponibilidade}' WHERE idServico = $idServico;";
        $result = $conexao->prepare($query);
        $result->execute();
        $conexao = null;
        return $result->rowCount();
    }


?>