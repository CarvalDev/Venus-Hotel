<?php 
  require_once '../../dao/ClienteDao.php';
  require_once '../../model/Cliente.php';
  if(isset($_POST['acao'])){
      $cliente = new Cliente();
      $cliente->setStatusCliente($_POST['acao']);
      $cliente->setCodCliente($_POST['codCliente']);
      if(ClienteDao::updateStatus($cliente->getCodCliente(), $cliente->getStatusCliente())){
        header('Location: index.php?=sucesso');
      }else{
        header('Location: index.php?=erro');
      }
  }
  
?>