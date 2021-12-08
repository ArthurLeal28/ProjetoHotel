<?php
include_once('verifica.php');
include('AgendamentoCrud.php');
?>
<html>
    <head>
        <meta charset="UTF-08">
        <title>Serviços</title>
        <link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>
		<link type="text/css" rel="stylesheet" href="css/estilos.css"/>	
        <link type="text/css" rel="stylesheet" href="css/datatables.css"/>	
    </head>
    <body class=>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">NOTEL Resorts</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="https://lealdigitalmarketing.000webhostapp.com/System-Template/dashboard.php">Home <span class="sr-only">(Página atual)</span></a>
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
                <a class="dropdown-item" href="../CrudsQuarto/ControleQuartoTabela.php">Quartos</a>
                </div>
            </li>
            </ul>
        </div>
    </nav>
        <div class="container tabela">
            <h1 class="text-white">Reservar Quartos <i class="fas fa-door-open"></i></h1>
            <hr class="border-bottom border-white">
            <div class="row form-group">
						<div class="col-md-12">
							<a href="AgendamentoFormulario.php" class="btn btn-primary float-right mr-2">Cadastrar</a>											
						</div>	
            </div>
            <table id="tabelaServicos" class="table">
					<thead class="thead-dark">
						<tr>
							<th>ID Reserva</th>
							<th>Data Entrada</th>
                            <th>Data Saida</th>
                            <th>Cliente</th>
                            <th>Nome</th>
                            <th>N°Quarto</th>
                            <th></th>
                            <th></th>
                            
						</tr>
					</thead>
					<tbody>
                        <?php	
                        $registros =  tabelaReserva();
						foreach($registros as $registro){
							echo "<tr>"; 
							echo "<td> {$registro['idReserva']} </td>";
							echo "<td> {$registro['dtEntrada']} </td>";
                            echo "<td> {$registro['dtSaida']} </td>";
							echo "<td> {$registro['idUsuario']} </td>";
							echo "<td> {$registro['nome']} </td>";
                            echo "<td> {$registro['nomeQ']} </td>";
							echo "<td><a href='AgendamentoExcluir.php?idReserva={$registro['idReserva']}'class='btn btn-danger float-right'  onclick=\"return confirm('Tem certeza que deseja deletar essa reserva?'); return false;\"'><i class='fas fa-trash'></i>Excluir</a ></td>";							
							echo "<td><a href='AgendamentoFormulario.php?idReserva={$registro['idReserva']}'class='btn btn-warning float-right mr-1'> Editar</a> </td>";
							echo "</tr>"; 
						} 
					?>
                    </tbody>
            </table>
            <div class="row form-group">
						<div class="col-md-12">
							<a href="https://lealdigitalmarketing.000webhostapp.com/System-Template/dashboard.php" class="btn btn-primary float-right mr-2">Voltar</a>											
						</div>	
            </div>
        </div>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/datatables.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/servicoTabela.js"></script>
    </body>

</html>