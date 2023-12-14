<?php
require_once '../../model/Quarto.php';
require_once '../../dao/QuartoDao.php';
  
  

  if(isset($_POST['acao'])){
    $acao = $_POST['acao'];
  }else{
    $acao = "INSERIR";
  }

  switch($acao){
    case "SELECTID":
        $infoQuarto = QuartoDao::selectCod($_POST['cod']);
        include('./register.php');
        break;
    case "INSERIR":
        $quarto = new Quarto();
        $quarto->setNomeQuarto($_POST['nome']);
        $quarto->setCodCategoriaQuarto($_POST['categoria']);
        $quarto->setDescQuarto($_POST['desc']);
        $quarto->setfotoQuarto($quarto->saveImage($_POST['nomeFoto']));
        echo $_POST['nomeFoto'];
        
         if(QuartoDao::insert($quarto)){
           header('Location: index.php?=sucesso');
         }else{
           header('Location: index.php?=erro');
         }

        break;
      case "ATUALIZAR":
        $quarto = new Quarto();
        $quarto->setNomeQuarto($_POST['nome']);
        $quarto->setCodCategoriaQuarto($_POST['categoria']);
        $quarto->setDescQuarto($_POST['desc']);
        $quarto->setfotoQuarto($quarto->saveImage($_POST['nomeFoto']));
        if(QuartoDao::update($quarto, $_POST['codQuarto'])){
         header('Location: index.php?=sucesso');
         echo $quarto->getfotoQuarto();
        }else{
          header('Location: index.php?=erro');
        }
        break;
      case "DELETAR":
        if(QuartoDao::delete($_POST['codDeletar'])) {
          header('Location: index.php?=sucessoDeletar');
        } else {
          header('Location: index.php?=erroDeletar');
        }
        break;

  }

?>