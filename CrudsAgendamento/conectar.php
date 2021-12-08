<?php
define('HOST', '127.0.0.1');
define('USUARIO', 'id9239971_sergio');
define('SENHA', 'Lev^VfJ*AAy?8SlG');
    function criarConexao(){
        $conexao = NEW PDO('mysql:host=localhost;dbname=id9239971_trabalho',USUARIO,SENHA) OR die("Nao foi possivel conectar");
        return $conexao;
    }
?>