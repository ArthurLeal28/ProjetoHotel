
$(document).ready(function(){
	

});

function mudarValor(){
    var preco = document.getElementById("preco");
    
}

function validaDatas(){
    var dataInicial = new Date($("input[name='dtEntrada']").val());
    var dataFinal = new Date($("input[name='dtSaida']").val());
    if (!dataInicial || !dataFinal) return false;
    if (dataInicial >= dataFinal) {
        alert("A data de entrada nao pode ser maior que a de saida!");
        return false;
    } else {
        return true
    }
}


$("#formulario").validate(
	{

		rules:{
			state:{
				required:true	   
			},
			cliente:{
				required:true	   
			},
			pagamento:{
				required:true   
			},
			quarto:{
				required:true   
			},
            qtdA:{
				required:true  
			},
            end:{
				required:true 
			},
			start:{
				required:true
			},
			dtEntrada:{
				required:true
			},
			dtSaida: { 
				required:true
			}
							
		}, 
		messages:{
			state:{
				required:"Campo obrigatório"
			},
			cliente:{
				required:"Campo obrigatório"
			},
			dtEntrada:{
				required:"Campo obrigatório"
			},
			pagamento:{
				required:"Campo obrigatório"
			},
			quarto:{
				required:"Campo obrigatório"
			},
            qtdA:{
				required:"Campo obrigatório"
			},	
            end:{
				required:"Campo obrigatório"
			},
			start:{
				required:"Campo obrigatório"
			},
			dtSaida:{
				required:"Campo obrigatório",
				
			}
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


