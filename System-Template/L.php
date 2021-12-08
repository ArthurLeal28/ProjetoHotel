<?php
    session_start();
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="content first-content">
            <div class="first-column">
                <h2 class="title title-primary">Bem vindo!</h2>
                <p class="description description-primary">Para se manter conectado</p>
                <p class="description description-primary">por favor faça o login</p>
                <button id="signin" class="btn btn-primary">Entrar</button>
            </div>    
            <div class="second-column">
            <h2 class="title title-second">Crie sua conta</h2>
                <div class="espaco">
                   
                </div><!-- social media -->
                <p class="description description-second">Registe sua conta com o email:</p>
                <form class="form" id="formulario" action="../Conexão/cadastrar.php" method="post">
                    <?php
                        if(isset($_SESSION['nao_cadastrado'])){
                    ?>   
                    <div class="erro">
                        <p >ERRO: Usuario ja cadastrado</p>
                    </div>
                    <?php
                        unset($_SESSION['nao_cadastrado']);
                        }
                    ?>    
                    <?php
                        if(isset($_SESSION['cadastrado'])){
                    ?>   
                    <div class="certo">
                        <p >Salvo+: Usuario cadastrado</p>
                    </div>
                    <?php
                        unset($_SESSION['cadastrado']);
                        }
                    ?>                 
                    <label class="label-input" for="">
                        <i class="far fa-user icon-modify"></i>
                        <input type="text" name="nome" id="nome" placeholder="Nome">
                    </label>
                    
                    <label class="label-input" for="">
                        <i class="far fa-envelope icon-modify"></i>
                        <input type="email" name="usuario" id="usuario" placeholder="Email">
                    </label>
                    
                    <label class="label-input" for="">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" name="senha" id="senha" placeholder="Senha">
                    </label>
                    
                    
                    <button class="btn btn-second">Cadastrar</button>        
                </form>
            </div><!-- second column -->
        </div><!-- first content -->
        <div class="content second-content">
            <div class="first-column">
                <h2 class="title title-primary">Olá,visitante!</h2>
                <p class="description description-primary">Insira seus dados pessoais</p>
                <p class="description description-primary">e se hospede conosco</p>
                <button id="signup" class="btn btn-primary">Cadastrar</button>
            </div>
            <div class="second-column">
                <h2 class="title title-second">Entrar em sua conta</h2>
                <div class="espaco">

                </div><!-- social media -->
                <p class="description description-second">Use seu dados para entrar:</p>
                <form class="form" id="formulario2" action="../Conexão/conexao.php" method="post">
                    <?php
                        if(isset($_SESSION['nao_autenticado'])){
                    ?>   
                    <div class="erro">
                        <p >ERRO: Usuario invalido</p>
                    </div>
                    <?php
                        unset($_SESSION['nao_autenticado']);
                        }
                    ?>
                    <label class="label-input" for="">
                        <i class="far fa-envelope icon-modify"></i>
                        <input name="usuario" id="usuario" type="email" placeholder="Email">
                    </label>
                
                    <label class="label-input" for="">
                        <i class="fas fa-lock icon-modify"></i>
                        <input name="senha" id="senha" type="password" placeholder="Senha">
                    </label>
                
                    <a class="password" href="esqueceu.php">Esqueceu sua senha?</a>
                    <button class="btn btn-second">Entrar</button>
                </form>
            </div><!-- second column -->
        </div><!-- second-content -->
    </div>
    <script src="js/login.js"></script>
</body>
</html>