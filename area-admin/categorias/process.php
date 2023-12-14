<?php
require_once('../../dao/CategoriaDao.php');
require_once('../../model/Categoria.php');

echo $_POST['acao'];

switch($_POST['acao']) {
  case "INSERIR":
    $itensCategoria ="";
    
    if(count ($_POST['itens']) > 1 ) {
      foreach($_POST['itens'] as $item )
      {
        $itensCategoria =$itensCategoria."#".$item;
      } 
    } else {
      $array = $_POST['itens'];
      $itensCategoria = $array[0];
    }
    $categoria = new Categoria();
    $categoria->setNomeCategoria($_POST['nomeCat']);
    $categoria->setValorHoraCategoria(str_replace(',', '.',$_POST['valorHora']));
    $categoria->setItensCategoria($itensCategoria);
    
    if(CategoriaDao::insert($categoria)) {
      header('Location: index.php?=Sucesso');
    } else {
      header('Location: index.php?=erro');
    }
    break;
    case "DELETAR":
      if(CategoriaDao::delete($_POST['codCat'])){
        header('Location: index.php?=Sucesso');
    } else {
      header('Location: index.php?=erro');
    }
    break;
    case "SELECTID":
      $categoria = CategoriaDao::selectId($_POST['codCat']);
      include('./register.php');
      break;
    case "ATUALIZAR":
      $categoria = new Categoria();
      $categoria->setNomeCategoria($_POST['nomeCat']);
      $categoria->setValorHoraCategoria(str_replace(',', '.',$_POST['valorHora']));
      $categoria->setItensCategoria($itensCategoria);
      if(CategoriaDao::update($_POST['codCategoria'], $categoria)){
        header('Location: index.php?=Sucesso');
       } else {
       header('Location: index.php?=erro');
       }
      
    
}

?>