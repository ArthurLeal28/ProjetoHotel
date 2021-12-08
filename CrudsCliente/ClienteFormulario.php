<?php	
        session_start();
        include_once('verifica.php');
        include_once "ClienteCRUD.php";

        $idUsuario = 0 ;
        
		$nome = "";
        $telefone = "";
        $cpf = "";
		$tdNascimento = "";

        $idEndereco = 0;
        $cidade="";
        $bairro="";
        $rua="";
        $numero="";
        $complemento="";

		if(isset($_GET['idUsuario'])){
			$idUsuario = $_GET['idUsuario'];

            $registro = recuperarClientePorId($idUsuario);
            
			$nome = $registro['nome'];
            $telefone = $registro['telefone'];
            $cpf = $registro['cpf'];
            $tdNascimento = $registro['tdNascimento'] ;

		}

        if(isset($_GET['idEndereco'])){
            $idEndereco = $_GET['idEndereco'];
            $registro1 = recuperarEnderecoPorId($idEndereco);
            
			$cidade = $registro1['cidade'];
            $bairro = $registro1['bairro'];
            $rua = $registro1['rua'];
            $numero = $registro1['numero'] ;
            $complemento= $registro1['complemento'];
        }
	?>
<html>

<head>
    <meta charset="utf-8" />
    <title>  Hotel </title>
    <link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="css/estilos.css" />
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
					<a class="dropdown-item" href="ClienteTabela.php">Clientes</a>
					<a class="dropdown-item" href="../CrudsQuarto/ControleQuartoTabela.php">Quartos</a>
					</div>
				</li>
				</ul>
			</div>
		</nav> 
    <div class="container tabela">
        <form id="formulario" action="ClienteSalvar.php" method="post">
            <h1 class="text-white">Dados pessoais <i class="fa-regular fa-face-smile"></i></h1>
		    <hr class="border-bottom border-white">

            <div class="row form-group">
                <input class="form-control" id="idUsuario" name="idUsuario" value="<?php echo $idUsuario; ?>" type="hidden">
		        <input class="form-control" id="idEndereco" name="idEndereco" value="<?php echo $idEndereco; ?>" type="hidden">
            </div>

            <div class="row form-group">
                <div class="col-md-12">
                    <label class="text-white"for="nome">Nome Completo</label>
                    <input class="form-control" id="nome" name="nome" value="<?php echo $nome; ?>" type="text">
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-4">
                    <label class="text-white" for="cpf">Cpf</label>
                    <input class="form-control" id="cpf" name="cpf" value="<?php echo $cpf; ?>" type="text">
                </div>
                <div class="col-md-4">
                    <label class="text-white" for="tdNascimento">Data de nascimento</label>
                    <input class="form-control" id="tdNascimento" name="tdNascimento" value="<?php echo $tdNascimento; ?>" type="text">
                </div>
                <div class="col-md-4" >
                    <label class="text-white" for="telefone">Telefone</label>
                    <input class="form-control" id="telefone" name="telefone" value="<?php echo $telefone; ?>" type="text">
                </div>
            </div>

		    <h1 class="text-white" >Endereço</h1>
		    <hr class="border-bottom border-white">
		    <div class="row form-group">
                <div class="col-md-6">
                    <label class="text-white" for="cidade">Cidade</label>
                    <input class="form-control" id="cidade" name="cidade" value="<?php echo $cidade; ?>" type="text">
                </div>
				<div class="col-md-6">
                    <label class="text-white" for="bairro">Bairro</label>
                    <input class="form-control" id="bairro" name="bairro" value="<?php echo $bairro; ?>" type="text">
                </div>
            </div>

			<div class="row form-group">
                <div class="col-md-6">
                    <label class="text-white" for="rua">Rua</label>
                    <input class="form-control" id="rua" name="rua" value="<?php echo $rua; ?>" type="text">
                </div>
				<div class="col-md-3">
                    <label class="text-white" for="numero">Numero</label>
                    <input class="form-control" id="numero" name="numero" value="<?php echo $numero; ?>" type="text">
                </div>
                <div class="col-md-3">
                    <label class="text-white" for="complemento">Complemento</label>
                    <input class="form-control" id="complemento" name="complemento" value="<?php echo $complemento; ?>" type="text">
                </div>    
            </div>
            
            <div class="row form-group">
                <div class="col-md-12">
                    <a type="button" href="../System-Template/dashboard.php" class="btn btn-primary float-left">Voltar</a>
                    <button type="submit" class="btn btn-success float-right">Salvar</button>                
                </div>
            </div>
        </form>
        
    </div>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/jquery.validate.js"></script>		
	<script type="text/javascript" src="js/jquery.mask.js"></script>				
	<script type="text/javascript" src="js/ClienteFormulario.js"></script>	
</body>

</html>