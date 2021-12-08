<?php
    session_start();
//if(!isset($_SESSION['usuario'])) 
   // { 
        if(!$_SESSION['usuario'] || $_SESSION['adm']!=1) {
            
?>
            <script>window.location.replace("../index.php");</script>
<?php
            exit();
        }
    //} 


?>