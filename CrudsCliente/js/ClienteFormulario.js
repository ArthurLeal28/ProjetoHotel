$(document).ready(function(){
	$('#tdNascimento').mask("99/99/9999", {reverse: true});
	$('#cpf').mask('999.999.999-99', {reverse: true});
	$('#telefone').mask('99 99999-9999', {reverse: true});

});

$("#formulario").validate(
	{
		rules:{
			nome:{
				required:true	   
			},
			cpf:{
				required:true,
				remote: {
					url: "ClienteVerificarCPF.php",
					type: "post",
					data: {
						idUsuario: function() {
							return $("#idUsuario").val();
					  	}
					}
				}
			},
			telefone:{
				required:true   
			},
			dtNascimento:{
				required:true
			},
			sexo:{
				required:true   
			},
			cidade:{
				required:true
			},
			bairro:{
				required:true
			},
			rua:{
				required: true
			},
			numero:{
				required:true
			},
			complemento:{
				required:true
			}

		}, 
		messages:{
			nome:{
				required:"Campo obrigatório"
			},
			cpf:{
				required:"Campo obrigatório",
				remote:"já existe um cliente cadastrado com esse cpf",
			},
			telefone:{
				required:"Campo obrigatório"
			},
			dtNascimento:{
				required:"Campo obrigatório"
			},
			sexo:{
				required:"Campo obrigatório"
			},	
			cidade:{
				required:"Campo Obrigatório"
			},
			bairro:{
				required:"Campo Obrigatório"
			},
			rua:{
				required:"Campo Obrigatório"
			},
			numero:{
				required:"Campo Obrigatório"
			},	
			complemento:{
				required:"Campo Obrigatório"
			}		   
		}
	}
);