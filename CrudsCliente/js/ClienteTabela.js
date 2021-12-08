
$(document).ready(function () {
	$('#tabela').DataTable({
		language: {
			url: 'js/dataTables.pt_br.json'
		}
	});
});

function confirmarExclusao(idUsuario) {
	var resposta = confirm('Confirma a exclusão do registro?');

	if (resposta) {		
		//realiza uma requisição remota (assíncrona) 
		$.ajax({
			url  : 'ClienteExcluir.php',
			type : 'post',
			data : {
				idUsuario : idUsuario
			}
		})
		.done(function(resultado){
			if(resultado == 1){
				alert('Registro excluído com sucesso!');
				window.location.replace('ClienteTabela.php');
			}else{
				alert('Erro ao excluir o registro');
			}
		});  		
	}
}