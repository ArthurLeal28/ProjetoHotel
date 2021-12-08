<?php
define('HOST', '127.0.0.1');
define('USUARIO', 'id9239971_sergio');
define('SENHA', 'eT=5D5jbdP\TOvT+');
    function criarConexao(){
        $conexao = NEW PDO('mysql:host=localhost;dbname=id9239971_trabalho',USUARIO,SENHA) OR die("Nao foi possivel conectar");
        return $conexao;
    }
?>