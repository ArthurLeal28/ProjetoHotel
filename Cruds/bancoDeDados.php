<?php
define('HOST', '127.0.0.1');
define('USUARIO', '');
define('SENHA', '');
    function criarConexao(){
        $conexao = NEW PDO('mysql:host=localhost;dbname=hotel',USUARIO,SENHA) OR die("Nao foi possivel conectar");
        return $conexao;
    }
?>