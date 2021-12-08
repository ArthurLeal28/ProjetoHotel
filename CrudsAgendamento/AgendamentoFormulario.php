<?php
    include_once('AgendamentoCrud.php');
    $idReserva = 0;
    $dtEntrada = "";
    $dtSaida = "";
    $preco= 0;
    $qtdA = 0;
    $qtdC =0; 
    $pagamento = 0; 
        if(isset($_GET['idReserva'])){
            include_once('AgendamentoCrud.php');
            $idReserva = $_GET['idReserva'];
            $registro =  buscarReserva($idReserva);
            $dtEntrada = $registro['dtEntrada'];
            $preco= $registro['preco'];
            $dtSaida = $registro['dtSaida'];
            $start = $registro['start'];
            $end = $registro['end'];
            $qtdA = $registro['qtdA'];
            $qtdC = $registro['qtdC'];
            $idCliente = $registro['idUsuario'];
            $idQuarto = $registro['idQuarto'];
            $pagamento = $registro['pagamento'];           
        }
        
    ?>
    <html>
    <head>
        <meta charset="UTF-08">
        <title>Cadastro</title>
        <link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>
		<link type="text/css" rel="stylesheet" href="css/estilos.css"/>	
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        
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
            <h1 class="text-white">Reservar Quartos <i class="fas fa-door-open"></i></h1>
            <hr class="border-bottom border-white">
            <form id="formulario" action="AgendamentoSalvar.php" method="post" onsubmit="return validaDatas()">

                    <div class="row form-group">
                        <input type="hidden" id="idReserva"  name="idReserva" value="<?php echo"$idReserva"; ?>">
                        <input type="hidden" id="preco"  name="preco" value="1">
                        <div class="col-md-6">
							<label for="dtEntrada">Data de Entrada*</label>  
							<input class="form-control" id="dtEntrada" name="dtEntrada" value="<?php echo $dtEntrada ?>" 
							type="date" >
						</div>
                        <div class="col-md-6">
                                <label for="start">Hora de entrada*</label>
                                <input class="form-control" id="start" name="start" value="<?php echo $start ?>" 
                                type="time">
                        </div>
                            
                        <div class="col-md-6">
							<label for="dtSaida">Data de Saida*</label>  
							<input class="form-control" id="dtSaida" name="dtSaida" onclick="verificardata()" value="<?php echo $dtSaida ?>" 
							type="date" >
						</div>
                        <div class="col-md-6">
                                <label for="end">Hora de Saida*</label>
                                <input class="form-control" id="end" name="end" value="<?php echo $end ?>" 
                                type="time">
                        </div>
                        <div class="col-md-6">
                                <label for="idCliente">Cliente/CPF/Telefone*</label>
                                <select class="form-control" id='idCliente'name="idCliente" >
                                    <option selected disabled >Selecione um cliente</option>
                                    <?php
                                        $registros = listarUsuario();
                                        foreach($registros as $registro){
                                            $cliente = $registro['nome']."/".$registro['cpf']."/".$registro['telefone'];
                                            echo$cliente;
                                            echo"<option value='{$registro['idUsuario']}'>".$cliente."</option>" ;
                                            
                                        }
                                    ?>
                                    
                                    
                                </select>
                        </div>
                        <div class="col-md-3">
                                <label for="qtdA">Adultos*</label>
                                <input class="form-control tipos" id="qtdA" name="qtdA" value="<?php echo $qtdA ?>" 
                                type="number" min='1' placeholder="Informe a quantidade">
                        </div>
                        <div class="col-md-3">
                                <label for="qtdC">Crianças</label>
                                <input class="form-control tipos" id="qtdC" name="qtdC" value="<?php echo $qtdC ?>" 
                                type="number" placeholder="Informe a quantidade">
                        </div>
                        
                </div>
                <h5 class="text-white">Escolha dos Quartos <i class="fas fa-door-open"></i></h1>
                <hr class="border-bottom border-white"> 
                <div class="row form-group">
                                
                            
                        <div class="col-md-12">
                                <label for="idQuarto">Quarto/Tipo/Nivel/Tipo de cama*</label>
                                <select class="form-control" id='idQuarto'name="idQuarto" onchange="mudarValor()">
                                <option <?php if($idQuarto==0){echo'selected="selected"';}?> disabled>Selecione um quarto</option >
                                 <?php
                                        $registros = listarQuarto();
                                        foreach($registros as $registro){
                                            $q = $registro['nomeQ']."/".$registro['tpquarto']."/".$registro['nivelquarto']."/".$registro['tpcama'];
                                    
                                            echo"<option if($idQuarto==$registro['idQuarto'] & $idQuarto!=0){echo 'selected='selected';} value='{$registro['idQuarto']}'>".$q."</option>" ;
                                            
                                        }
                                    ?>
                                    
                                </select>
                        </div>
                        
                        <div class="col-md-12">
                                <label for="pagamento">Forma de pagamento*</label>
                                <select class="form-control" id='pagamento'name="pagamento" >
                                <option selected disabled>Selecione uma forma de pagamento</option disabled>
                                    <option value="1">Cartão de Credito 12x</option>
                                    <option value="2">Cartão de Débito 3% Desconto</option>
                                    <option value="3">Dinheiro 10% Desconto</option>
                                    
                                </select>
                        </div>
                            
                         
                </div>
                <div class="row form-group">
                                <div class="col-md-6">
                                    <a type="button" href="../System-Template/dashboard.php" class="btn btn-primary float-left">Voltar</a>											
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-success float-right">Salvar</button>											
                                </div>	
                                
                                
                </div>	
                <hr class="border-bottom border">         
            </form>
        </div>
            <script type="text/javascript" src="js/jquery.js"></script>
			<script type="text/javascript" src="js/bootstrap.js"></script>
			<script type="text/javascript" src="js/jquery.validate.js"></script>		
			<script type="text/javascript" src="js/jquery.mask.js"></script>			
			<script type="text/javascript" src="js/validar.js"></script>	
    </body>
</html>
    