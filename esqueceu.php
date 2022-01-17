<html>
		<head>
			<meta charset="utf-8"/>
			<title> Recuperação de senha </title>
			<link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>
			<link type="text/css" rel="stylesheet" href="css/estilos.css"/>	
		</head>
		<body>
						
			<div class="container">

				
				<form id="formulario" action="Recuperar.php" method="post" autocomplete="off">
					<div class="row form-group">
						<div class="col-md-12">
							<label for="email">Email</label>  
							<input class="form-control" name="email" id="email" type="text">
						</div>			
					</div>
					<div class="row form-group">		
					<div class="col-md-6"> 
							<a href="L.php" class="btn btn-primary float-left">Voltar</a>	
						</div>																							
						<div class="col-md-6"> 
							<button type="submit" class="btn btn-success float-right">Recuperar</button>	
						</div>											
					</div>	

				</form>			
			</div> 	
			<script type="text/javascript" src="js/jquery.js"></script>
			<script type="text/javascript" src="js/bootstrap.js"></script>
			<script type="text/javascript" src="js/jquery.validate.js"></script>		
			<script type="text/javascript" src="js/jquery.mask.js"></script>			
			<script type="text/javascript" src="js/login.js"></script>				
		</body>
	</html>