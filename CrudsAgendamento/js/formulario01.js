$(document).ready(function(){
	$('#valor').mask("#0", {reverse: true});		
	$('#juros').mask('0##', {reverse: true});
	$('#meses').mask('0##', {reverse: true});
	
	$('.moeda').mask("#.##0,00", {reverse: true});

});

$("#formulario").validate(
	{
		rules:{
			valor:{
				required:true	   
			},
			juros:{
				required:true   
			},
			meses:{
				required:true   
			}				
		}, 
		messages:{
			valor:{
				required:"Campo obrigatório"
			},
			juros:{
				required:"Campo obrigatório"
			},
			meses:{
				required:"Campo obrigatório"
			}					   
		}
	}
);