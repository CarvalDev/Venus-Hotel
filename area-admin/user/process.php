<?php
require_once '../../model/Adm.php';
require_once '../../dao/AdmDao.php';
  
  

  if(isset($_POST['acao'])){
    $acao = $_POST['acao'];
  }else{
    $acao = "INSERIR";
  }
  echo $acao;

  switch($acao){
    case "SELECTID":
        $infosDoUser = AdmDao::selectCod($_POST['cod']);
        include('./register.php');
        break;
    case "INSERIR":
      $adm = new Adm();
      $adm->setNome($_POST['nome']);
      $adm->setEmail($_POST['email']);
      $adm->setSenha($_POST['senha']);
      $adm->setToken($adm->generateToken());
      if(AdmDao::insert($adm)){
        header('Location: register.php?=sucesso');
      }else{
        header('Location: register.php?=erro');
      }
        break;
      case "ATUALIZAR":
        $adm = new Adm();
        $adm->setNome($_POST['nome']);
        $adm->setEmail($_POST['email']);
        $adm->setSenha($_POST['senha']);
        $codAdm = $_POST['codAdm'];
        if(AdmDao::update($codAdm, $adm)){
          header('Location: register.php?=sucesso');
        }else{
          header('Location: register.php?=erro');
        }
        break;
      case "DELETAR":
        if(AdmDao::delete($_POST['codDeletar'])) {
          header('Location: index.php?=sucessoDeletar');
        } else {
          header('Location: index.php?=erroDeletar');
        }
        break;

  }

// echo $_POST['email'];
 
  // $adm = new Adm();

  // $adm->setNome($_POST['nome']);
  // $adm->setEmail($_POST['email']);
  // $adm->setSenha($_POST['senha']);
  // $adm->setToken($adm->generateToken());

  // if(AdmDao::insert($adm)){
  //   header('Location: register.php?=sucesso');
  // }else{
  //   header('Location: register.php?=erro');
  // }



?>