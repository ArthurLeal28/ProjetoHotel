<?php

    include_once('verifica.php');
    $idServico = 0;
    $servico = "";
    $preco= "";
    $qtd = "";
    $desc =""; 
    $tempo = ""; 
        if(isset($_GET['servico'])){
            include('servicosCrud.php');
            $idServico = $_GET['servico'];
            $registro =  buscarServicos($idServico);
            $servico = $registro['servico'];
            $preco= $registro['preco'];
            $qtd = $registro['quantidade'];
            $desc = $registro['descricao'];
            $tempo = $registro['tempo'];
            $preco= number_format($preco, 2);
           
        }
        
    ?>
    <html>
    <head>
        <meta charset="UTF-08">
        <title>Cadastro</title>
        <link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>
		<link type="text/css" rel="stylesheet" href="css/estilos.css"/>	
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">NOTEL Resorts</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="../System-Template/dashboard.php">Home <span class="sr-only">(Página atual)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Destaques</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Preços</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Gerenciamento 
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="servicosTabela.php">Serviços</a>
                <a class="dropdown-item" href="../CrudsCliente/ClienteTabela.php">Clientes</a>
                <a class="dropdown-item" href="../CrudsQuarto/ControleQuartoTabela.php">Quartos</a>
                </div>
            </li>
            </ul>
        </div>
    </nav>
        <div class="container forms">
            <h1 class="text-white">Cadastrar Serviços <i class="fas fa-concierge-bell"></i></h1>
            <hr class="border-bottom border-white">
            <form id="formulario" action="servicosSalvar.php" method="post">

                    <div class="row form-group">
                        <input type="hidden" id="idServico"  name="idServico" value="<?php echo"$idServico"; ?>">

                        <div class="col-md-6">
							<label for="servico">Serviço*</label>  
							<input class="form-control" id="servico" name="servico" value="<?php echo $servico ?>" 
							type="text" placeholder="Informe o nome do serviço">
						</div>
                        <div class="col-md-6">
                                <label for="preco">Preço($)*</label>
                                <input class="form-control" id="preco" name="preco" value="<?php echo $preco ?>" 
                                type="text" placeholder="Informe o preco">
                        </div>
                            
                        <div class="col-md-12">
                                <label for="desc">Descrição*</label>  
                                <input class="form-control" id="desc" name="desc" value="<?php echo $desc ?>" 
                                type="text" placeholder="Informe uma descrição">
                                
                        </div>
                            <legend class="col-form-label col-sm-2 pt-0">Tipos de serviços</legend>
                            <div class="col-md-6 row ">
                                
                                <div class="col-sm-10 ">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="1" onclick="verifica(value)"<?php if($qtd!=null){echo"checked";}?>>
                                        <label class="form-check-label" for="gridRadios1">
                                            Consumíveis
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="2" onclick="verifica(value)"<?php if($tempo!=null){echo"checked";}?> >
                                        <label class="form-check-label" for="gridRadios2">
                                            Serviços Prestados
                                        </label>
                                    </div>
                                    <div class="form-check disabled">
                                        <input class="form-check-input" type="hidden" name="gridRadios" id="gridRadios3" value="opcao3" disabled>
                                        <label tyclass="form-check-label" for="gridRadios3">
                                            
                                        </label>
                                    </div>
                                </div>
                            </div>
                        
                       
                        <div class="col-md-6">
                                <label for="qtd">Quantidade*</label>  
                                <input class="form-control tipos" id="qtd" name="qtd" value="<?php echo $qtd ?>" 
                                type="number" placeholder="Informe a quantidade" <?php if($idServico==0 || $qtd==null){echo"disabled";} ?>>
                        </div>
                        <div class="col-md-6">
                                <label for="senha">Tempo(Min)*</label>  
                                
                                <input class="form-control tipos" id="tempo" name="tempo" value="<?php echo $tempo ?>" 
                                type="number" placeholder="Informe o tempo gasto em minutos" <?php if($idServico==0 || $tempo==0){echo"disabled";}?>>
                        </div>
                        
                </div>
                <div class="row form-group">
                        <div class="col-md-6">
							<a type="button" href="../System-Template/dashboard.php" class="btn btn-primary float-left">Voltar</a>											
						</div>
						<div class="col-md-6">
							<button type="submit" class="btn btn-success float-right"  >Salvar</button>											
						</div>	
                        
                </div>	
            </form>
        </div>
            <script type="text/javascript" src="js/jquery.js"></script>
			<script type="text/javascript" src="js/bootstrap.js"></script>
			<script type="text/javascript" src="js/jquery.validate.js"></script>		
			<script type="text/javascript" src="js/jquery.mask.js"></script>			
			<script type="text/javascript" src="js/validar.js"></script>	
    </body>
</html>
    