<?php
        include_once('bancoDeDados.php');
        $conexao = criarConexao();
        $query = "SELECT * FROM reserva";
        $result = $conexao->prepare($query);
        $result->execute();
        $conexao = null;
        $row = $result->fetchAll();
        print_r($row);
        
        $query_events = "SELECT idReserva FROM reserva";
        $resultado_events = $conn->prepare($query_events);
        $resultado_events->execute();

        $eventos = [];

        while($row_events = $resultado_events->fetch(PDO::FETCH_ASSOC)){
        $id = $row_events['idReserva'];
        $title = 'Seila';
        $color = 'green';
        $start = '2021-11-07T23:30:00';
        $end = '2021-11-08T23:30:00';
        
        $eventos[] = [
            'id' => $id, 
            'title' => $title, 
            'color' => $color, 
            'start' => $start, 
            'end' => $end, 
            ];
    }
    
    echo json_encode($eventos);
?>