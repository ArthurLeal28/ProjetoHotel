<?php
include_once("Conexão/usuarioCRUD.php");

    $email = $_POST['email'];    

    $usuario = recuperarUsuarioPorEmail($email);
    if($usuario != null){	

        $pessoa = recuperarPessoaPorId($usuario['idUsuario']);
        $novaSenha = gerarSenha(10);

        //enviar o email com a senha
        $destinatario  = $pessoa['email'];
        $assunto  = "Notel Resorts - Recuperação de senha";
        $mensagem  = "Sua senha é: {$novaSenha}"; 

        $headers = "From: notelresorts@gmail.com"; 
        ini_set('smtp_port', 587);
        $envio = mail($destinatario, $assunto, $mensagem, $headers); 

        if($envio){
            salvarUsuario($usuario['idUsuario'], $usuario['nome'], $novaSenha, $usuario['email']);
            echo "<script>alert('E-mail enviado.'); location.href='login.php';</script>"; 
        }else{
            echo "<script>alert('Erro ao enviar e-mail.');</script>";
        }	
        
    }else{
        echo "<script>alert('Login inválido!'); location.href='login.php';</script>"; 			
    }
?>