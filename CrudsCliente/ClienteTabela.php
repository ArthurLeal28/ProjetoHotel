<?php
session_start();
		include_once('verifica.php');
		include_once "ClienteCRUD.php";

		$registros = listarCliente();
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
			<a class="navbar-brand" href="#">NOTEL</a>
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
					<a class="dropdown-item" href="ClienteFormulario.php">Clientes</a>
					<a class="dropdown-item" href="../CrudsQuarto/ControleQuartoTabela.php">Quartos</a>
					</div>
				</li>
				</ul>
			</div>
		</nav>
	    <div class="container tabela">
            <h1 class="text-white">Clientes <i class="fas fa-concierge-bell"></i></h1>
            <hr class="border-bottom border-white">
	        <a href="ClienteFormulario.php" class="btn btn-primary float-right mb-2">Cadastrar</a>
	        <table id="tabela" class="table">
	            <thead class="thead-dark">
	                <tr>
						<th>ID Cliente</th>
	                    <th>Nome Cliente</th>
						<th>CPF</th>
						<th>Data de Nascimento</th>
                        <th>Telefone</th>
						<th></th>
	                </tr>
	            </thead>
	            <tbody>
	                <?php	
						foreach($registros as $registro){
							echo "<tr>"; 
							echo "<td> {$registro['idUsuario']} </td>";
							echo "<td> {$registro['nome']} </td>";
                            echo "<td> {$registro['cpf']} </td>";
							echo "<td> {$registro['tdNascimento']} </td>";
                            echo "<td> {$registro['telefone']} </td>";
							echo "<td> <button type='button' onclick='confirmarExclusao({$registro['idUsuario']})' class='btn btn-danger float-right'>Excluir</button>";							
							echo "<a href='ClienteFormulario.php?idUsuario={$registro['idUsuario']}&idEndereco={$registro['idEndereco']}'class='btn btn-warning float-right mr-1'> Editar</a> </td>";
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
		<script type="text/javascript" src="js/ClienteTabela.js"></script>
	</body>

	</html>