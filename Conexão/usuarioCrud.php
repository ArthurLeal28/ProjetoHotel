<?php
include('bancoDadosCRUD.php');
function recuperarPessoaPorId($idUsuario){
        try{
            $sql = "SELECT * FROM tbusuario WHERE idUsuario = :idUsuario;";

            $conexao = criarConexao();        
            $sentenca = $conexao->prepare($sql);
            $sentenca->bindValue(':idUsuario', $idUsuario); 
            $sentenca->execute();     
            $conexao = null;
            return $sentenca->fetch();
        }catch (PDOException $erro){
            criarArquivoErro($erro);
            die();
        }
    }    

    function verificarUsuarioPorEmail($id, $email){
        try{   
            $sql = "SELECT * FROM tbusuario WHERE email = :email AND idUsuario <> :idUsuario;";

            $conexao = criarConexao();
            $sentenca = $conexao->prepare($sql);	
            $sentenca->bindValue(':email', $email); 		
            $sentenca->bindValue(':idUsuario', $idUsuario); 				

            $sentenca->execute(); 
            $conexao = null;

            return $sentenca->rowCount();
        }catch (PDOException $erro){
            criarArquivoErro($erro);
            die();
        }
    } 

    function autenticarUsuario($email, $Senha){
        try{   
            $sql = "SELECT * FROM tbusuario WHERE email = :email AND Senha = :Senha;";

            $conexao = criarConexao();
            $sentenca = $conexao->prepare($sql);	
            $sentenca->bindValue(':email', $email); 		
            $sentenca->bindValue(':Senha', $Senha); 				

            $sentenca->execute();             
            $conexao = null;

            return $sentenca->fetch();
        }catch (PDOException $erro){
            criarArquivoErro($erro);
            die();
        }
    }  

    function recuperarUsuarioPorEmail($email){
        try{
            $sql = "SELECT * FROM tbusuario WHERE email = :email;";

            $conexao = criarConexao();        
            $sentenca = $conexao->prepare($sql);
            $sentenca->bindValue(':email', $email); 
        
            $sentenca->execute();     
            $conexao = null;
            return $sentenca->fetch();
        }catch (PDOException $erro){
            criarArquivoErro($erro);
            die();
        }
    }    

    function gerarSenha($tamanho){
      $ma = "ABCDEFGHIJKLMNOPQRSTUVYXWZ"; // $ma contem as letras maiúsculas
      $mi = "abcdefghijklmnopqrstuvyxwz"; // $mi contem as letras minusculas
      $nu = "0123456789"; // $nu contem os números
      $si = "!@#$%¨&*()_+="; // $si contem os símbolos

      $maiusculas = true;
      $minusculas = true;
      $numeros = true;
      $simbolos = true;
      $Senha = "";
    
      if ($maiusculas){
            // se $maiusculas for "true", a variável $ma é embaralhada e adicionada para a variável $Senha
            $Senha .= str_shuffle($ma);
      }
    
        if ($minusculas){
            // se $minusculas for "true", a variável $mi é embaralhada e adicionada para a variável $Senha
            $Senha .= str_shuffle($mi);
        }
    
        if ($numeros){
            // se $numeros for "true", a variável $nu é embaralhada e adicionada para a variável $Senha
            $Senha .= str_shuffle($nu);
        }
    
        if ($simbolos){
            // se $simbolos for "true", a variável $si é embaralhada e adicionada para a variável $Senha
            $Senha .= str_shuffle($si);
        }
    
        // retorna a Senha embaralhada com "str_shuffle" com o tamanho definido pela variável $tamanho
        return substr(str_shuffle($Senha),0,$tamanho);
    }
?>