<?php //@author Arthur Carvalho
include_once('verifica.php');
    $pagina = 3;
    $ativo1 = '';
    $ativo2 = '';
    $ativo3 = '';
    if(isset($_GET['pag'])){
        $pagina = $_GET['pag'];
    }
        if($pagina == 1){
            $ativo1 = 'hovered';
        }else if($pagina == 2){
            $ativo2 = 'hovered';
        }else{
            $ativo3 = 'hovered';
        }
?>
<html>
    <head>
        <meta charset='UTF-08'>
        <meta name='viewport' content='width=device-width,initial-scale=1.0'>
        <title>Cadastro</title>
        <link rel='stylesheet' type='text/css' href='css/estilo.css'>
        <link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>
        <link href='lib/main.css' rel='stylesheet' />
        <script src='lib/main.js'></script>
        <script src='lib/locales/pt-br.js'></script>
        <script src='lib/calendario.js'></script>
    </head>
    <body>
        <div class='container'>
            <div class='navegacao'>
                <ul>
                    <li>
                        <a href='#'>
                        <span class='icone fas fa-hotel'></span>
                        <span class='titulo'>Notel Resorts</span>
                        </a><!--Link1-->
                    </li><!--Lista1-->
                    <li class='<?php echo $ativo1;?>'>
                        <a href='https://lealdigitalmarketing.000webhostapp.com/System-Template/painel.php?pag=1' >
                        <span class='icone fas fa-home'></span>
                        <span class='titulo'>Dashboard</span>
                        </a><!--Link2-->
                    </li><!--Lista2-->
                    <li class='<?php echo $ativo2;?>'>
                        <a href='https://lealdigitalmarketing.000webhostapp.com/System-Template/painel.php?pag=2'>
                        <span class='icone fas fa-file-chart-line'></span>
                        <span class='titulo'>Relatorios</span>
                        </a><!--Link3-->
                    </li><!--Lista3-->
                    <li class='<?php echo $ativo3;?>'>
                        <a href='https://lealdigitalmarketing.000webhostapp.com/System-Template/painel.php?pag=3'>
                        <span class='icone fas fa-tasks-alt'></span>
                        <span class='titulo'>Gerenciamento</span>
                        </a><!--Link4-->
                    </li><!--Lista4-->
                    <li value>
                        <a href='https://lealdigitalmarketing.000webhostapp.com/System-Template/logout.php'>
                        <span class='icone fas fa-sign-out-alt'></span>
                        <span class='titulo'>Sair</span>
                        </a><!--Link5-->
                    </li><!--Lista5-->
                </ul>
            </div><!--Navegacao-->
        </div><!--Container-->

        <div class='main'>
            <div class='topobarra'>
                <div class='alterna '>
                <ion-icon name="menu-outline"></ion-icon>
                </div><!--Menu-->
                <div class='procurar'>
                    <label>
                        <input type="text" type='text' placeholder='Procure aqui'>
                        <i class="far fa-search"></i>
                    </label>
                </div><!--Procurar-->
                <div class='usuario'>
                    <img src="imagens/user2.png" alt="usuario" id='usuario'>
                </div>
            </div>
            <div class='interno'>
                <?php 
                    if($pagina == 1){
                       include_once('construcao.php');
                    }else if($pagina == 2){
                        include_once('construcao.php');
                    }else{
                        include_once('gerenciamento.php');
                    }
                ?>  
                

            </div>
        </div>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script type="text/javascript" src="js/dashboard.js"></script>
    </body>
</html>