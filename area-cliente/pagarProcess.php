<?php
    require_once '../dao/ReservaDao.php';
    ReservaDao::pagarReserva($_POST['codReserva']);
    header('Location: reserva.php');

?>