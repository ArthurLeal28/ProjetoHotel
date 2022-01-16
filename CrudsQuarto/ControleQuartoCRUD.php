<?php
    include_once "bancoDadosCRUD.php";

    function salvarQuarto($idQuarto, $tpquarto, $nivelquarto, $tpcama, $descricao, $preco){

        $conexao = criarConexao();

        if($idQuarto == 0){
            $sql = "INSERT INTO quarto(tpquarto, nivelquarto, tpcama, descricao, preco) VALUES(:tpquarto, :nivelquarto, :tpcama, :descricao, :preco);";
            $sentenca = $conexao->prepare($sql);

            $sentenca->bindValue(':tpquarto', $tpquarto); 
            $sentenca->bindValue(':nivelquarto', $nivelquarto); 
            $sentenca->bindValue(':tpcama', $tpcama); 
            $sentenca->bindValue(':descricao', $descricao);
            $sentenca->bindValue(':preco', $preco);  

        }else{
            $sql = "UPDATE quarto SET tpquarto = :tpquarto, nivelquarto = :nivelquarto, tpcama = :tpcama, descricao = :descricao, preco = :preco WHERE idQuarto = :idQuarto;";
            $sentenca = $conexao->prepare($sql);

            $sentenca->bindValue(':idQuarto', $idQuarto); 
            $sentenca->bindValue(':tpquarto', $tpquarto); 
            $sentenca->bindValue(':nivelquarto', $nivelquarto); 
            $sentenca->bindValue(':tpcama', $tpcama); 
            $sentenca->bindValue(':descricao', $descricao);
            $sentenca->bindValue(':preco', $preco); 
        }
    
        $sentenca->execute();     
        $conexao = null;    
        return $sentenca->rowCount();
    }

    function excluirQuarto($idQuarto){

        $sql = "DELETE FROM quarto WHERE idQuarto = :idQuarto;";

        $conexao = criarConexao();

        $sentenca = $conexao->prepare($sql);
        $sentenca->bindValue(':idQuarto', $idQuarto); 
    
        $sentenca->execute(); 
        $conexao = null;
        return $sentenca->rowCount();
    }    

    function listarQuarto(){
        
        $sql = "SELECT * FROM quarto;";

        $conexao = criarConexao();        
        $sentenca = $conexao->prepare($sql);
    
        $sentenca->execute();     
        $conexao = null;
        return $sentenca->fetchAll();
    }  

    function recuperarQuartoPorId($idQuarto){
        
        $sql = "SELECT * FROM quarto WHERE idQuarto = :idQuarto";

        $conexao = criarConexao();        
        $sentenca = $conexao->prepare($sql);
        $sentenca->bindValue(':idQuarto', $idQuarto); 
    
        $sentenca->execute();     
        $conexao = null;
        return $sentenca->fetch();
    }    

  /*  function verificarTipoExercicioPorNome($id, $nome){
          
        $sql = "SELECT * FROM tbTipoExercicio WHERE nome = :nome AND idTipoExercicio <> :id;";

        $conexao = criarConexao();
        $sentenca = $conexao->prepare($sql);	
        $sentenca->bindValue(':nome', $nome); 		
        $sentenca->bindValue(':id', $id); 				

        $sentenca->execute(); 
        $conexao = null;

        return $sentenca->rowCount();
    } */    
?>