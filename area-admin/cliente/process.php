<?php
require_once '../../model/Cliente.php';
require_once '../../dao/ClienteDao.php';
  
  

  if(isset($_POST['acao'])){
    $acao = $_POST['acao'];
  }else{
    $acao = "INSERIR";
  }
  echo $acao;

  switch($acao){
    case "SELECTID":
      try{
        $infosDoCliente = ClienteDao::selectCod($_POST['cod']);
        include('./register.php');
      } catch(Exception $e) {
        header('Location: index.php?=erro');
      }
        break;
    case "INSERIR":
      $cliente = new Cliente();
      $cliente->setNomeCliente($_POST['nome']);
      $cliente->setEmailCliente($_POST['email']);
      $cliente->setSenhaCliente($_POST['senha']);
      $cliente->setCpfCliente($_POST['cpf']);
      if(ClienteDao::insert($cliente)){
        header('Location: index.php?=sucesso');
      }else{
        header('Location: index.php?=erro');
      }
        break;
      case "ATUALIZAR":
        $cliente = new Cliente();
        $cliente->setNomeCliente($_POST['nome']);
        $cliente->setEmailCliente($_POST['email']);
        $cliente->setSenhaCliente($_POST['senha']);
        $cliente->setCpfCliente($_POST['cpf']);
        $cod = $_POST['cod'];
        if(ClienteDao::update($cliente, $cod)){
          header('Location: index.php');
        }else{
          header('Location: register.php?=erro');
        }
        break;
      case "DELETAR":
        if(ClienteDao::delete($_POST['codDeletar'])) {
          header('Location: index.php?=sucessoDeletar');
        } else {
          header('Location: index.php?=erroDeletar');
        }
        break;

  }





?>