<?php
include_once('verifica.php');
include('servicosCrud.php');
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
        <div class="container tabela">
            <h1 class="text-white">Gerenciamento de Serviços <i class="fas fa-concierge-bell"></i></h1>
            <hr class="border-bottom text-white">
            <div class="row form-group">
						<div class="col-md-12">
							<a href="servicosFormulario.php" class="btn btn-primary float-right mr-2">Cadastrar</a>											
						</div>	
            </div>
            <table id="tabelaServicos" class="table">
					<thead class="thead-dark">
						<tr>
							<th>Serviço</th>
							<th>Descrição</th>
                            <th>Preço($)</th>
                            <th>Qtd</th>
                            <th>Tempo Médio Gasto(Min)</th>
                        
                            <th></th>
                            
						</tr>
					</thead>
					<tbody>
                       <?php
                        $registros =  tabelaServicos();
                        foreach($registros as $registros):
                            if($registros['tempo']==0){
                               $tempo="N/A";
                            }else{
                                $tempo = $registros['tempo'];
                            }
                            if($registros['quantidade']==0){
                                $qtd = "N/A";
                            }else{
                                $qtd = $registros['quantidade'];
                            }

                            if($registros['disponibilidade']== 0){
                                $apagar = "<del>";
                                $dispo = "<i class='fas fa-check-circle'></i> -Habilitar-";
                               
                            }else{
                                $apagar = null;
                                $dispo = "<i class='fas fa-times-circle'></i>Desabilitar";
                                
                            }

                            echo "<tr>";
                            echo "<td>".$apagar. $registros['servico']. "</td>";
							echo "<td>".$apagar. $registros['descricao'] . "</td>";
                            echo "<td>".$apagar."R$ ". $registros['preco'] . "</td>";
                            echo "<td>".$apagar. $qtd . "</td>";
                            echo "<td>".$apagar. $tempo."</td>";


                            if($registros['disponibilidade']== 1){
                            echo "<td>
                                        
                                      <a href='servicosExcluir.php?servico={$registros['idServico']}' class='btn btn-danger float-right'  onclick=\"return confirm('Tem certeza que deseja deletar esse registro?'); return false;\"'><i class='fas fa-trash'></i>Excluir</a >
                                      <a href='servicosFormulario.php?servico={$registros['idServico']}' class='btn btn-warning float-right mr-2'><i class='fas fa-edit'></i>Editar</a>";
                            }else{
                                echo "<td>
                                      <a href='#' class='btn btn-dark float-right'  onclick=\" alert('Esse produto esta desabilitado');\"'><i class='fas fa-trash'></i>Excluir</a >
                                      <a href='#' class='btn btn-dark float-right mr-2 'onclick=\" alert('Esse produto esta desabilitado');\"><i class='fas fa-edit'></i>Editar</a>";
                            }
                            echo"
                                <a href='servicosDesabilitar.php?servico={$registros['idServico']}&disponibilidade={$registros['disponibilidade']}' class='btn btn-dark float-right mr-2' onclick=\"return confirm('Tem certeza que deseja desativar/ativar esse registro?'); return false;\">$dispo</a>
                                </td>";
                           echo"</tr>";
                        

                        endforeach;

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
        <script type="text/javascript" src="js/datatables.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/servicoTabela.js"></script>
    </body>

</html>