<?php
  require_once '../../componentes/verificaAcesso.php';
?>

<?php
  require_once '../../dao/AdmDao.php';
  
  
  $infosAdm = AdmDao::selectAll();
  if($infosAdm==false){
    $false = false;
  }
 

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Venus Hotel</title>
  <link rel="short icon" href="../../img/client/logo1.png" />
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- icon -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"> <!-- CSS Projeto -->
  <link rel="stylesheet" href="css/style.css">
  <script src="https://kit.fontawesome.com/d5ea0dfb99.js" crossorigin="anonymous"></script>
</head>

<body style="justify-content: center; align-items: center; height: 100vh ">
  <?php 
      include('./../../componentes/header-adm.php');
  ?>
  <div class="container-fluid" style="height: 90vh">
    <div class="row h-100">
      <?php 
      include('./../../componentes/menu-adm.php');
      ?>
      <div class="col-md-10  p-4 borber">
        <div class="row align-items-center mb-4">
          <div class="col fs-3 fw-semibold">
            Lista de Usuário
          </div>
          <div class="col text-end ">
            <a class="btn btn-success px-3" role="button" aria-disabled="true" href="register.php"><i
                class="fas fa-plus" aria-hidden="true"></i></a>
          </div>
        </div>
        <div class=" row">
          <table class="table table-hover">
            <thead>
              <tr>
                <th class="col-md-1">ID</th>
                <th class="col-md-3">Nome </th>
                <th class="col-md-3">E-mail</th>
                <th class="text-center col-md-1">Alterar</th>
                <th class="text-center col-md-1">Excluir</th>
              </tr>

              <?php if(isset($false)){ // se o metodo de dar select nao retornou nenhuma linhas vai aparecer essa parte DAQUI
                ?> <td></td><td>Não há administradores</td><td></td><td></td><td></td><td></td><td></td>
              <?php } //ate aqui
                else{ foreach($infosAdm as $info){?> <!-- SE RETORNOU LINHAS IREMOS EXIBIR NA TELA -->
              <tr>
                <td><?=$info['codAdm']?></td>
                <td><?=$info['nomeAdm']?></td>
                <td><?=$info['emailAdm']?></td>
               
                <td class="text-center">
                  <form action="./process.php" method="POST">
                    <input type="hidden" value="<?=$info['codAdm']?>" name="cod">
                    <button type="submit" value="SELECTID" name="acao" class="dropdown-item"><i class="fas fa-edit fa-lg text-secondary"></i>
                    </button>
                  </form>
                </td>
                <td class="text-center">
                  <a class="dropdown-item" onclick="modalRemover(<?=$info['codAdm']?>,'codDeletar')">
                    <i class="fas fa-trash-alt fa-lg text-danger"></i>
                  </a>
                </td>
                </tr>
                <?php }} ?>


            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="modalExcluir" role="dialog">
    <div class=" modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir Usuário</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body  ">
          <form action="process.php" method="post">
            <input type="hidden" class="form-control"  id="codDeletar" name="codDeletar" type="text">
            <p>Tem certeza que deseja excluir o item selecionado?
            <div class=" text-end">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Não</button>
              <button type="submit" class="btn btn-warning ms-3" value="DELETAR" name="acao">Sim </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?= require './../../componentes/modal.php'?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
  </script>
  <script src='../../js/personalizar.js'></script>
</body>

</html>