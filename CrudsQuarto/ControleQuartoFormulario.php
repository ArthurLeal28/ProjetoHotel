<?php	
		include_once('verifica.php');
		include_once "ControleQuartoCRUD.php";

		$idQuarto = 0;
		$tpquarto = "";
		$nivelquarto = "";
		$tpcama = "";
		$descricao = "";
		$preco = "";

		if(isset($_GET['idQuarto'])){
			$idQuarto = $_GET['idQuarto'];
			$registro = recuperarQuartoPorId($idQuarto);

			$tpquarto = $registro['tpquarto'];
			$nivelquarto = $registro['nivelquarto'];
			$tpcama = $registro['tpcama'];
			$descricao = $registro['descricao'];
			$preco = $registro['preco'];
		}
	?>
    <html>
		<head>
			<meta charset="utf-8"/>
			<title> Controle de Quartos </title>
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
						<a class="dropdown-item" href="../Cruds/servicosTabela.php">Serviços</a>
						<a class="dropdown-item" href="../CrudsCliente/ClienteTabela.php">Clientes</a>
						<a class="dropdown-item" href="ControleQuartoTabela.php">Quartos</a>
						</div>
					</li>
					</ul>
				</div>
			</nav>
			<div class="container tabela">
                <h1 class="text-white">Controle de Quartos  <i class="fas fa-concierge-bell"></i></h1>
                <hr class="border-bottom border-white">				
				<form id="formulario" action="ControleQuartoSalvar.php" method="post">
					<div class="row form-group">
						<!--campo oculto (invisível) -->
						<input type="hidden" id="idQuarto" name="idQuarto" value="<?php echo $idQuarto; ?>" >	
					</div>
                    <div class="row form-group">
						<div class="col-md-4">
							<label class="text-white"for="tpquarto">Tipo do quarto</label>  
							<select class="form-control" id="tpquarto" name="tpquarto">
							    <option value="<?php echo $tpquarto; ?>" selected="selected" disabled>Selecione uma opção</option>
							    <option value="<?php echo $tpquarto = "Solteiro"; ?>">Solteiro</option>
                                <option value="<?php echo $tpquarto = "Duplo"; ?>">Duplo</option>
								<option value="<?php echo $tpquarto = "Duplex"; ?>">Duplex</option>			
                            </select>
						</div>
                        <div class="col-md-4">
							<label  class="text-white"for="nivelquarto">Nivel do quarto</label>  
							<select class="form-control" id="nivelquarto" name="nivelquarto">
							    <option value="<?php echo $nivelquarto; ?>" selected="selected" disabled>Selecione uma opção</option>
							    <option value="<?php echo $nivelquarto = "Standart"; ?>">Standart</option>
                                <option value="<?php echo $nivelquarto = "Executivo"; ?>">Executivo</option>
								<option value="<?php echo $nivelquarto = "Deluxe"; ?>">Deluxe</option>			
                            </select>
						</div>	
						<div class="col-md-4">
							<label  class="text-white"for="tpcama">Tipo de cama</label>  
							<select class="form-control" id="tpcama" name="tpcama">
								<option value="<?php echo $tpcama;?>" selected="selected" disabled>Selecione uma opção</option>
							    <option value="<?php echo $tpcama = "Solteiro"; ?>">Solteiro</option>
                                <option value="<?php echo $tpcama ="Casal"; ?>">Casal</option>
								<option value="<?php echo $tpcama ="Queen size"; ?>">Queen size</option>
								<option value="<?php echo $tpcama ="King size"; ?>">King size</option>
							</select>
						</div>	
					</div>
					<div class="row form-group">
						<div class="col-md-12">
                        	<label  class="text-white"for="desc">Descrição (Detalhes adicionais do quarto)</label>  
                        	<input class="form-control" id="descricao" name="descricao" type="text" value="<?php echo $descricao; ?>" placeholder="Informe uma descrição">            
                    	</div>
					</div>
					  <div class="row form-group">
						<div class="col-md-5">
    						<label  class="text-white" for="preco">Valor</label>
    						<input type="preco" class="form-control" id="preco" name = "preco" type="text" value="<?php echo $preco; ?>" placeholder="Insira o valor do quarto">
						</div>	
  					</div>
					<div class="row form-group">
						<div class="col-md-12">
							<a href="../System-Template/dashboard.php" class="btn btn-primary float-left">Voltar</a>
							<button type="submit" class="btn btn-success float-right">Salvar</button>											
						</div>											
					</div>					
				</form>			
			</div> 	
			<script type="text/javascript" src="js/jquery.js"></script>
			<script type="text/javascript" src="js/bootstrap.js"></script>
			<script type="text/javascript" src="js/jquery.validate.js"></script>		
			<script type="text/javascript" src="js/jquery.mask.js"></script>			
			<script type="text/javascript" src="js/ControleQuartoFormulario.js"></script>				
		</body>
	</html>