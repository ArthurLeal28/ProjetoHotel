<?php
include('AgendamentoCrud.php');
    $conexao = criarConexao();
    $idReserva = $_POST['idReserva'];
    $dtEntrada = $_POST['dtEntrada'];
    $dtSaida = $_POST['dtSaida'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $idCliente = $_POST['idCliente'];
    $qtdA = $_POST['qtdA'];
    $qtdC = $_POST['qtdC'];
    $idQuarto = $_POST['idQuarto'];
    $pagamento = $_POST['pagamento'];
    $preco = $_POST['preco'];
    if(empty($_POST['qtdC'])){
        $qtdC = 0;
    }else{
        $qtdC = $_POST['qtdC'];
    }
     salvarReserva($idReserva,$dtEntrada,$dtSaida,$start,$end,$idCliente,$qtdA,$qtdC,$idQuarto,$pagamento,$preco);

?>
    <script>window.location.replace("AgendamentoTabela.php");</script>