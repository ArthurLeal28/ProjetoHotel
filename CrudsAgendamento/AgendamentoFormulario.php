<?php
    include('AgendamentoCrud.php');
    $idReserva = 0;
    $dtEntrada = "";
    $dtSaida = "";
    $qtdA = 0;
    $qtdCcinco =0; 
    $qtdConze = 0;
    $qtdCdezessete = 0;
    $start = ""; 
    $end ="";
    $cliente=0;
    $quartos = [1];
    $pagamento=0;
    $soma =0;
        if(isset($_GET['idReserva'])){ 
            $idReserva = $_GET['idReserva'];           
            $registro =  buscarReserva($idReserva);
            $dtEntrada = $registro['dtEntrada'];
            $dtSaida = $registro['dtSaida'];
            $qtdA = $registro['qtdA'];
            $qtdCcinco =$registro['qtdCcinco']; 
            //$qtdConze = $registro['qtdConze'];
           // $qtdCdezessete = $registro['qtdCdezessete'];
            $start = $registro['start']; 
            $end =$registro['end'];
            $cliente=$registro['idUsuario'];
            
            $pagamento=$registro['pagamento'];   
            
            $quartos= listarQuartosReservados($idReserva);
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
            <form id="formulario" action="AgendamentoSalvar.php" method="post">

                    <div class="row form-group">
                        <input type="hidden" id="idReserva"  name="idReserva" value="<?php echo"$idReserva"; ?>">

                        <div class="col-md-3">
							<label for="dtEntrada">Data de Entrada*</label>  
							<input class="form-control" id="dtEntrada" name="dtEntrada" value="<?php echo $dtEntrada ?>" 
							type="date" >
						</div>

                        <div class="col-md-3">
							<label for="dtSaida">Data de Saida*</label>  
							<input class="form-control" id="dtSaida" name="dtSaida" value="<?php echo $dtSaida ?>" 
							type="date" >
						</div>

                        <div class="col-md-3">
                                <label for="qtdA">Adultos*</label>
                                <input class="form-control tipos" id="qtdA" name="qtdA" value="<?php echo $qtdA ?>" 
                                type="number" min='1' placeholder="Informe a quantidade">
                        </div>
                        <div class="col-md-3">
                                <label for="qtdC">Crianças de 0 a 5 anos</label>
                                <input class="form-control tipos" id="qtdCcinco" name="qtdCcinco" value="<?php echo $qtdCcinco ?>" 
                                type="number" placeholder="Informe a quantidade">
                        </div>

                        <div class="col-md-3">
                                <label for="start">Hora de entrada*</label>
                                <input class="form-control" id="start" name="start" value="<?php echo $start ?>" 
                                type="time">
                        </div>
                            
                        
                        <div class="col-md-3">
                                <label for="preco">Hora de Saida*</label>
                                <input class="form-control" id="end" name="end" value="<?php echo $end ?>" 
                                type="time">
                        </div>

                        <div class="col-md-3">
                                <label for="qtdA">Crianças de 6 a 11 anos</label>
                                <input class="form-control tipos" id="qtdConze" name="qtdConze" value="<?php echo $qtdConze ?>" 
                                type="number"  placeholder="Informe a quantidade">
                        </div>
                        <div class="col-md-3">
                                <label for="qtdC">Crianças de 12 a 17 anos</label>
                                <input class="form-control tipos" id="qtdCdezessete" name="qtdCdezessete" value="<?php echo $qtdCdezessete ?>" 
                                type="number"' placeholder="Informe a quantidade">
                        </div>

                        <div class="col-md-12">
                                <label for="cliente">Cliente/CPF/Telefone*</label>
                                <select class="form-control" id='cliente'name="cliente" >
                                   <?php
                                   $clientes = listarUsuario();
                                   if($cliente==0){
                                    echo" <option value='' selected disabled >Selecione um cliente</option>";
                                    foreach($clientes as $client){
                                        echo"<option value='{$client['idUsuario']}'>{$client['nome']} | {$client['cpf']} | {$client['telefone']}</option>";

                                    }
                                   }else{
                                    foreach($clientes as $client){
                                        if($client['idUsuario']!=$cliente){
                                            echo"<option value='{$client['idUsuario']}'>{$client['nome']} | {$client['cpf']} | {$client['telefone']}</option>";
                                        }else{
                                            echo"<option value='{$client['idUsuario']}'selected >{$client['nome']} | {$client['cpf']} | {$client['telefone']}</option>";
                                        }

                                        } 
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
                        <div class="col-md-12 mt-2 float-right">
                                    <button type="submit" class="btn btn-success float-right">Salvar</button>											
                        </div>
                        	
                      
                        
                        
                </div>                   
            </form>
            <hr class="border-bottom border"> 
        </div>
       
        
        <div class='container forms'>
        <h4 class="text-white">Escolha dos Quartos <i class="fas fa-door-open"></i></h1>
        
            <hr class="border-bottom border-white"> 
            <form id="formulario2" action="AgendamentoQuartos.php" method="post">
            <fieldset <?php if($idReserva==0){echo"disabled";}?> >
                <div class="row form-group"> 
                    <input type="hidden" id="idReserva" name="idReserva" value="<?php echo"$idReserva";?>">
                    <div class="row col-md-12">   

                        <div class="col-md-11">
                                <label for="idQuarto">Quarto/Tipo/Nivel/Tipo de cama*</label>
                                <select class="form-control" id="idQuarto" name="idQuarto" >
                                    <?php
                                    $quartos = listarQuarto();
                                    
                                        echo" <option value='' selected disabled >Selecione um quarto</option>";
                                        foreach($quartos as $quarto){
                                            echo"<option value='{$quarto['idQuarto']}'>{$quarto['nomeQ']} | {$quarto['tpquarto']} | {$quarto['nivelquarto']} | {$quarto['tpcama']} | R$ {$quarto['preco']}</option>";

                                        }
                                    ?>
                                </select>
                        </div>
                        <div class="col-md-1 ">
                            <label > ⠀⠀⠀⠀⠀⠀⠀⠀⠀</label>
                            <button type="submit" class="btn btn-success float-rigth">Incluir +</button>											
                        </div>

                    </div>
                <div class="container mt-4">

                    <table class="table">
                    <thead class="thead-dark">
                    
                        <tr>
                            <th>Numero do quarto</th>
                            <th>Tipo do Quarto</th>
                            <th>Tipo da cama</th>
                            <th>Valor</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody calss="white">
                       
                    <?php
                        $registros = listarQuartosReservados($idReserva);
						foreach($registros as $registro){
                            $q = listaQuarto($registro['idQuarto']);
                            $soma = $soma+$q['preco'];
							echo "<tr>"; 
							echo "<td> {$q['nomeQ']} </td>";
							echo "<td> {$q['tpquarto']} </td>";
                            echo "<td> {$q['tpcama']} </td>";
							echo "<td> {$q['preco']} </td>";
							echo "<td><a href='AgendamentoExcluirQuarto.php?idReserva={$registro['idReserva']}'class='btn btn-danger float-right'  onclick=\"return confirm('Tem certeza que deseja deletar essa reserva?'); return false;\"'><i class='fas fa-trash'></i>Excluir</a ></td>";							
							echo "</tr>"; 
						} 
                        
                        //For para a quantidade de termos
                        echo"<tr> <td></td> <td></td>  <td class='float-right'><Strong>Total</ Strong></td>";//Coloca o nome SOMA na tabela
                        echo "<td>".$soma."</td>";//Coloca o Soma dos termos
                        echo"<td></td></tr>"
                    ?>
                    </tbody>
                    </table>
                </div>

                        
                            
                         
                </div>

                </form>
                <div class="row form-group">
                                <div class="col-md-6">
                                    <a type="button" href="AgendamentoTabela.php" class="btn btn-primary float-left">Voltar</a>											
                                </div>
                                <div class="col-md-6">
                                    <?php
                                        echo"<a type='button' href='AgendamentoQuartos.php?preco={$soma}&idReserva={$idReserva}' class='btn btn-success float-right'>Salvar</a>";
                                    ?>
                                    											
                                </div>
                               	
                                
                                
                </div>	
                </fieldset>
                <hr class="border-bottom border">   
        </div>
            <script type="text/javascript" src="js/jquery.js"></script>
			<script type="text/javascript" src="js/bootstrap.js"></script>
			<script type="text/javascript" src="js/jquery.validate.js"></script>		
			<script type="text/javascript" src="js/jquery.mask.js"></script>			
			<script type="text/javascript" src="js/validar.js"></script>	
    </body>
</html>
    