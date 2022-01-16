<?php
        include_once('bancoDeDados.php');
        $conexao = criarConexao();
       
        
        $query_events = "SELECT * FROM tbCliente c, reserva r WHERE c.idUsuario = r.idUsuario";
        $resultado_events = $conexao->prepare($query_events);
        $resultado_events->execute();
       
        $eventos = [];

        while($row = $resultado_events->fetch(PDO::FETCH_ASSOC)){
        $id = $row['idReserva'];
        $title = 'Reserva-'.$row['nome'];
        $color = 'green';
        $start = $row['dtEntrada'].'T'.$row['start'];
        $end = $row['dtSaida'].'T'.$row['end'];
       
       
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