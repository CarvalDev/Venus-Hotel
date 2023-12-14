
<?php
  require_once '../../componentes/verificaAcesso.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <!-- ADICIONAR AS VERIFICAÇÕES DE UPDATE -->
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

<?php 
  require_once("../../componentes/modal.php");
  require_once '../../dao/AdmDao.php';
  if(!empty($_POST)){
    $codAdm = $infosDoUser['codAdm'];
    $nomeAdm =  $infosDoUser['nomeAdm'];
    $emailAdm = $infosDoUser['emailAdm'];
    $senhaAdm = $infosDoUser['senhaAdm'];
    }else{
      $codAdm = '';
    $nomeAdm =  '';
    $emailAdm = '';
    $senhaAdm = '';
    }


?>

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
        <div class="card">
          <form method="post" action="process.php" enctype="multipart/form-data" class="needs-validation" novalidate>

            <div class="card-header">
              <input type="hidden" name="codAdm" id="codAdm" placeholder="id" value="<?=$codAdm?>">
              <input type="hidden" value="<?=$codAdm?'ATUALIZAR':'INSERIR'?>" name="acao" > 
              <strong>INFORMAÇÕES DO USUÁRIO</strong>
            </div>
            <div class="card-body row justify-content-center align-items-center">
              
              <div class=" col-md-10">
                <div class="row">
                  <div class="col-md-3 mb-3">
                    <label for="nome" class="col-form-label">Nome:</label>
                    <input type="text" class="form-control" name="nome" maxlength="50" value="<?=$nomeAdm?>" id="nome"required >
                    <div class="invalid-feedback">
                      Preencha este campo
                    </div>
                  </div>
                 
                  
                </div>
                <div class="row">
                 
                 
                  <div class="col-md-6">
                    <label for="email" class="col-form-label">Email:</label>
                    <input type="email" class="form-control" name="email" maxlength="100" value="<?=$emailAdm?>" id="email" required>
                    <div class="invalid-feedback">
                      Preencha este campo
                    </div>
                  </div>
                  <div class="col-md-3">
                    <label for="senha" class="col-form-label">Senha:</label>
                    <input type="password" class="form-control" value="<?=$senhaAdm?>" name="senha" maxlength="10" id="senha" required>
                    <div class="invalid-feedback">
                      Preencha este campo
                    </div>
                  </div>
                </div>
                <div class="row mt-5">
                  <div class="col-md-3">
                    <input type="hidden" id="foto" name="foto" accept="image/*" class="custom-file-input">
                    
                  </div>
                </div>
                <div class=" text-end p-3">
                  <a class=" btn btn-primary px-3" role="button" aria-disabled="true" href="index.php">Voltar</i></a>
                  <input type="submit" class=" btn btn-success" value="Salvar" >
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.0.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous" defer>
  </script>
  <!-- Para usar Mascara  -->
  <script type="text/javascript" src="./../../js/jquery.mask.min.js"></script>
  <script type="text/javascript" src="./../../js/personalizar.js"></script>

</body>

</html>