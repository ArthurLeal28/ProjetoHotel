<?php
    define('HOST', '127.0.0.1');
    define('USUARIO', 'id9239971_root');
    define('SENHA', 'THU=83rs|H1_90fi');
    function criarConexao(){
        $conexao = NEW PDO('mysql:host=localhost;dbname=id9239971_hotel',USUARIO,SENHA) OR die("Nao foi possivel conectar");
        return $conexao;
        echo 'Teste';
    }
?>