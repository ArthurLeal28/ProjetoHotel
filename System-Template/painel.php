<?php
include_once('verifica.php');
    if(!isset($_SESSION['usuario'])) 
    {
        if(!$_SESSION['usuario'] || $_SESSION['adm']!=1) {
            echo'Aqui';
?>          
            <script>window.location.replace("../index.php");</script>
<?php
            exit();
        }
    }
    include_once('dashboard.php');
?>