<?php		
		include_once('verifica.php');
		include_once "ControleQuartoCRUD.php";

		$registros = listarQuarto();
	?>
	<html>

	<head>
	    <meta charset="utf-8" />
	    <title> Controle de Quarto</title>
	    <link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
	    <link type="text/css" rel="stylesheet" href="css/estilos.css" />
		<link type="text/css" rel="stylesheet" href="css/datatables.css" />
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
					<a class="dropdown-item" href="ControleQuartoFormulario.php">Quartos</a>
					</div>
				</li>
				</ul>
			</div>
		</nav>
	    <div class="container tabela">
            <h1 class="text-white">Controle de Quartos <i class="fas fa-concierge-bell"></i></h1>
            <hr class="border-bottom border-white">
	        <a href="ControleQuartoFormulario.php" class="btn btn-primary float-right mb-2">Cadastrar</a>
	        <table id="tabela" class="table">
	            <thead class="thead-dark">
	                <tr>
	                    <th>Quarto</th>
	                    <th>Tipo quarto</th>
						<th>Nivel quarto</th>
                        <th>Tipo de cama</th>
                        <th>Valor</th>
						<th></th>
	                </tr>
	            </thead>
	            <tbody>
	                <?php	
						foreach($registros as $registro){
							echo "<tr>"; 
							echo "<td> {$registro['nome']} </td>";
							echo "<td> {$registro['tpquarto']} </td>";
                            echo "<td> {$registro['nivelquarto']} </td>";
                            echo "<td> {$registro['tpcama']} </td>";
                            echo "<td> {$registro['preco']} </td>";
							echo "<td> <button type='button' onclick='confirmarExclusao({$registro['idQuarto']})' class='btn btn-danger float-right'>Excluir</button>";							
							echo "<a href='ControleQuartoFormulario.php?idQuarto={$registro['idQuarto']}' class='btn btn-warning float-right mr-1'> Editar</a> </td>";
							echo "</tr>"; 
						} 
					?>
	            </tbody>
	        </table>
			<div class="row form-group">
						<div class="col-md-12">
							<a href="../System-Template/dashboard.php" class="btn btn-primary float-right mr-2">Voltar</a>											
						</div>	
            </div>
	    </div>
	    <script type="text/javascript" src="js/jquery.js"></script>
	    <script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript" src="js/datatables.js"></script>
		<script type="text/javascript" src="js/ControleQuartoTabela.js"></script>
	</body>

	</html>