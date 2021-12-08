<?php
    include_once "bancoDadosCRUD.php";

    function salvarCliente($idUsuario, $nome, $telefone, $cpf, $tdNascimento,$idEndereco)
    {
        $conexao = criarConexao();
        if($idUsuario==0)
        {
            $sql = "INSERT INTO `tbCliente` (`idUsuario`, `nome`, `cpf`, `tdNascimento`, `telefone`, `idEndereco`) VALUES (NULL, :nome, :cpf, :tdNascimento,:telefone, :idEndereco);";
            $sentenca = $conexao->prepare($sql);

            $sentenca->bindValue(':nome', $nome); 
            $sentenca->bindValue(':telefone', $telefone); 
            $sentenca->bindValue(':cpf', $cpf); 
            $sentenca->bindValue(':tdNascimento', $tdNascimento);
            $sentenca->bindValue(':idEndereco', $idEndereco); 

        }else{
            $sql = "UPDATE `tbCliente` SET `nome` = :nome, `cpf` = :cpf, `tdNascimento` = :tdNascimento, `telefone` = :telefone WHERE `tbCliente`.`idUsuario` = :idUsuario;";
            $sentenca = $conexao->prepare($sql);

            $sentenca->bindValue(':idUsuario', $idUsuario);
            $sentenca->bindValue(':nome', $nome); 
            $sentenca->bindValue(':telefone', $telefone); 
            $sentenca->bindValue(':cpf', $cpf);  
            $sentenca->bindValue(':tdNascimento', $tdNascimento);
        }

        $sentenca->execute();     
        $conexao = null;   
        return $sentenca->rowCount();
    }

    function salvarEndereco($idEndereco, $cidade, $bairro, $rua, $numero, $complemento)
    {
        $conexao = criarConexao();
        if($idEndereco==0)
        {   
            $sql = "INSERT INTO `endereco` (`idEndereco`, `rua`, `bairro`, `cidade`, `numero`, `complemento`) VALUES (NULL, :rua, :bairro, :cidade, :numero, :complemento);";
            $sentenca = $conexao->prepare($sql);

            $sentenca->bindValue(':cidade', $cidade); 
            $sentenca->bindValue(':bairro', $bairro); 
            $sentenca->bindValue(':rua', $rua); 
            $sentenca->bindValue(':numero', $numero);
            $sentenca->bindValue(':complemento',$complemento);
        }else{
            $sql = "UPDATE `endereco` SET `rua` = :rua , `bairro` = :bairro , `cidade` = :cidade , `numero` = :numero, `complemento` = :complemento WHERE `endereco`.`idEndereco` = :idEndereco;";
            
            $sentenca = $conexao->prepare($sql);
             $sentenca->bindValue(':idEndereco', $idEndereco);
             $sentenca->bindValue(':cidade', $cidade); 
             $sentenca->bindValue(':bairro', $bairro); 
             $sentenca->bindValue(':rua', $rua); 
             $sentenca->bindValue(':numero', $numero);
             $sentenca->bindValue(':complemento',$complemento);
        }

        $sentenca->execute();     
        $conexao = null; 
        return $sentenca->rowCount();
    }
    
    function excluirCliente($idUsuario)
    {
        $sql = "DELETE FROM tbCliente WHERE idUsuario = :idUsuario;";

        $conexao = criarConexao();

        $sentenca = $conexao->prepare($sql);
        $sentenca->bindValue(':idUsuario', $idUsuario); 
    
        $sentenca->execute(); 
        $conexao = null;
        return $sentenca->rowCount();
    }
    function excluirEndereco($idEndereco)
    {
        $sql = "DELETE FROM endereco WHERE idEndereco = :idEndereco;";

        $conexao = criarConexao();

        $sentenca = $conexao->prepare($sql);
        $sentenca->bindValue(':idEndereco', $idEndereco); 
    
        $sentenca->execute(); 
        $conexao = null;
        return $sentenca->rowCount();
    }


    function listarCliente(){
        
        $sql = "SELECT * FROM tbCliente;";

        $conexao = criarConexao();        
        $sentenca = $conexao->prepare($sql);
    
        $sentenca->execute();     
        $conexao = null;
        return $sentenca->fetchAll();
    }  

    function recuperarClientePorId($idUsuario)
    {
        
        $sql = "SELECT * FROM tbCliente WHERE idUsuario = :idUsuario";

        $conexao = criarConexao();        
        $sentenca = $conexao->prepare($sql);
        $sentenca->bindValue(':idUsuario', $idUsuario); 
    
        $sentenca->execute();     
        $conexao = null;
        return $sentenca->fetch();
    }
    function recuperarEnderecoPorId($idEndereco)
    {
        
        $sql = "SELECT * FROM endereco WHERE idEndereco = :idEndereco";

        $conexao = criarConexao();        
        $sentenca = $conexao->prepare($sql);
        $sentenca->bindValue(':idEndereco', $idEndereco); 
    
        $sentenca->execute();     
        $conexao = null;
        return $sentenca->fetch();
    }
    
    function recuperarEnderecoCliente($cidade, $bairro, $rua, $numero, $complemento)
    {
        $sql = "SELECT * FROM endereco WHERE cidade = :cidade AND bairro = :bairro AND rua = :rua
        AND numero = :numero AND complemento = :complemento";

        $conexao = criarConexao();        
        $sentenca = $conexao->prepare($sql);
        $sentenca->bindValue(':cidade', $cidade); 
        $sentenca->bindValue(':bairro', $bairro); 
        $sentenca->bindValue(':rua', $rua); 
        $sentenca->bindValue(':numero', $numero);
        $sentenca->bindValue(':complemento',$complemento);
    
        $sentenca->execute();     
        $conexao = null;
        $sentenca = $sentenca->fetch();
        return $sentenca['idEndereco'];
    }
    
    function verificarClientePorCPF($idUsuario, $cpf)
    {
          
        $sql = "SELECT * FROM tbCliente WHERE cpf = :cpf AND idUsuario <> :idUsuario;";

        $conexao = criarConexao();

        $sentenca = $conexao->prepare($sql);	
        $sentenca->bindValue(':idUsuario', $idUsuario); 
        $sentenca->bindValue(':cpf', $cpf); 		
        
        $sentenca->execute(); 
        $conexao = null;

        return $sentenca->rowCount();
    }

?>