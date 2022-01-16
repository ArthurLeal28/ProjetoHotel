<?php
session_start();
 
       if(!isset($_SESSION['usuario'])){
            
?>
            <script>alert('Sua sessão nao foi iniciada');</script>
            <script>window.location.replace("../index.php");</script>
<?php
            
        }else if(!$_SESSION['usuario'] || $_SESSION['adm']!=1) {
     
?>
        <script>alert('Sua sessão foi encerrada');</script>
        <script>window.location.replace('../index.php');</script>
<?php
        }
?>