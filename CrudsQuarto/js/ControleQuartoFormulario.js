$(document).ready(function(){
	$('#preco').mask("###.00", {reverse: true});
});

$("#formulario").validate(
	{
		rules:{
			tpquarto:{
				required:true	   
			},
			nivelquarto:{
				required:true   
			},
			tpcama:{
				required:true   
			},
			descricao:{
				required:true   
			},
            preco:{
				required:true   
			}					
		}, 
		messages:{
			tpquarto:{
				required:"Campo obrigatório"
			},
			nivelquarto:{
				required:"Campo obrigatório"
			},
			tpcama:{
				required:"Campo obrigatório"
			},
			descricao:{
				required:"Campo obrigatório"
			},	
            preco:{
				required:"Campo obrigatório"
			}			   
		}
	}
);