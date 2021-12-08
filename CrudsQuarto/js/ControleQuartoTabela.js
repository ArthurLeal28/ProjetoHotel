
$(document).ready(function () {
	$('#tabela').DataTable({
		language: {
			url: 'js/dataTables.pt_br.json'
		}
	});
});

function confirmarExclusao(idQuarto) {
	var resposta = confirm('Confirma a exclusão do registro?');

	if (resposta) {		
		//realiza uma requisição remota (assíncrona) 
		$.ajax({
			url  : 'ControleQuartoExcluir.php',
			type : 'post',
			data : {
				idQuarto : idQuarto
			}
		})
		.done(function(resultado){
			if(resultado == 1){
				alert('Registro excluído com sucesso!');
				window.location.replace('ControleQuartoTabela.php');
			}else{
				alert('Erro ao excluir o registro');
			}
		});  		
	}
}