$(document).ready(function(){
	$('#preco').mask("#.##0.00", {reverse: true});

	
});

$("#formulario").validate(
	{

		rules:{
			servico:{
				required:true	   
			},
			desc:{
				required:true   
			},
			preco:{
				required:true   
			},
            qtd:{
				required:true  
			},
            tempo:{
				required:true 
			},
			gridRadios:{
				required:true
			},
			gridRadios2:{
				required:true
			}
							
		}, 
		messages:{
			servico:{
				required:"Campo obrigatório"
			},
			desc:{
				required:"Campo obrigatório"
			},
			preco:{
				required:"Campo obrigatório"
			},
            qtd:{
				required:"Campo obrigatório"
			},	
            tempo:{
				required:"Campo obrigatório"
			},
			gridRadios:{
				required:"Campo obrigatório"
			},
		}
		
	}
);


function verifica(value){
	var tempo = document.getElementById("tempo");
	var qtd = document.getElementById("qtd");
	
  if(value == 1){
	tempo.disabled = true;
    qtd.disabled = false;
  }else if(value == 2){
	qtd.disabled = true;
    tempo.disabled = false;
  }
};


