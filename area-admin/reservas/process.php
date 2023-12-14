<?php
require_once '../../model/Reserva.php';
require_once ('../../dao/ReservaDao.php');
  
  

  if(isset($_POST['acao'])){
    $acao = $_POST['acao'];
  }else{
    $acao = "INSERIR";
  }


  switch ($acao) {

    case "SELECTID":
      $infoReserva = ReservaDao::selectCod($_POST['cod']);
      include '../reservas/register.php';
    break;
    case "DELETE": 
      if(ReservaDao::delete($_POST['cod'])) {
        header('Location: index.php?=Deletado');
      } else {
        header('Location: index.php?=ErroDelete');
      }
      break;
    case "ATUALIZAR":
        $reserva = new Reserva();
        $reserva->setDataHoraReserva($_POST['agenda']);
        $reserva->setStatusReserva($_POST['status']);
        $cod = $_POST['cod'];
        if(ReservaDao::update($reserva, $cod)){
          header('Location: index.php');
        }else{
          header('Location: register.php?=erro');
        }
      break;
  }
 




?>