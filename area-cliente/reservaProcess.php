<?php
    session_start();
    if(isset($_SESSION['cliente'])){
        $cliente = $_SESSION['cliente'];
          
        }else{
          session_destroy();
          header('Location: login.php');
        }
    require_once('../dao/ReservaDao.php');
    require_once('../dao/QuartoDao.php');
    require_once('../model/Reserva.php');
    $dataTratada = $_POST['data']." ".$_POST['hora'].":00";
    $horasTratado = str_replace("H", "", $_POST['horas']);
    if($horasTratado<10){
        $horasTratado = "0".$horasTratado.":00:00";
    }else{
        $horasTratado = $horasTratado.":00:00";
    }
    
    
    $reserva = new Reserva();
    $reserva->setQtdHoras($horasTratado);
    $reserva->setDataHora($dataTratada);
    $reserva->setValorTotal($_POST['valorTotal']);
    $reserva->setStatus("Pendente");
    
    $reserva->setCodCliente($cliente['codCliente']);
    $codCategoria =explode(",",$_POST['categoria']);

    $quartosDaCategoria = QuartoDao::selectByCodCategoria($codCategoria[0]);
    $i=0;
    $codQuarto=null;
    
    while($i<=count($quartosDaCategoria)){
        if($vaga = ReservaDao::verificaReserva($dataTratada, $quartosDaCategoria[$i][0])){
            $codQuarto =  $quartosDaCategoria[$i][0];
            $i = count($quartosDaCategoria);
        }
        $i++;
    }



    if($codQuarto==null){
        header('Location: home.php?naoHaQuartos');
    }else{
    $reserva->setCodQuarto($codQuarto);
    if(ReservaDao::insert($reserva)){
        $maxCodReserva = ReservaDao::selectMaxCod();
        ReservaDao::lancaEvento($maxCodReserva[0]);
        header('Location: home.php?sucesso');
        
    }
}


?>