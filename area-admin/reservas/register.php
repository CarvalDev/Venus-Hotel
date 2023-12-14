
<?php
  require_once '../../componentes/verificaAcesso.php';
  require_once '../../dao/QuartoDao.php';
  
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
  require_once '../../dao/ReservaDao.php';
  if(!empty($_POST)){
    $codReserva = $infoReserva['codReserva'];
    $dataAgenda = $infoReserva['dataHoraReserva'];
    $codQuarto = $infoReserva['codQuarto'];
    $codCliente = $infoReserva['codReserva'];
    $statusReserva = $infoReserva['statusReserva'];
    }else{
      $codReserva = '';
      $dataAgenda = '';
      $codQuarto = '';
      $codCliente = '';
      $statusReserva = '';
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
              <input type="hidden" name="cod" id="cod" placeholder="id" value="<?=$codReserva?>">
              <input type="hidden" value="<?=$codReserva?'ATUALIZAR':'INSERIR'?>" name="acao" > 
              <strong>INFORMAÇÕES DA RESERVA</strong>
            </div>
            <div class="card-body row justify-content-center align-items-center">
              
              <div class=" col-md-10">
                <div class="row">
                  <div class="col-md-5 mb-3">
                    <label for="nome" class="col-form-label">Data de Agendamento:</label>
                    <input type="text" class="form-control" data-mask="0000-00-00 00:00:00" name="agenda" maxlength="50" value="<?=$dataAgenda?>" id="agenda"required >
                    <div class="invalid-feedback">
                      Preencha este campo
                    </div>
                  </div>
                  <div class="col-md-5">
                  <label for="codQuarto" class="col-form-label">Código do Quarto:</label>
                    <input type="number" class="form-control" name="quarto" maxlength="100" value="<?=$codQuarto?>" id="quarto" required>
                    <div class="invalid-feedback">
                      Preencha este campo
                    </div>
                  </div>
                  
                </div>
                <div class="col-md-10">
                <div class="row">
                  <div class="col-md-5 mb-3">
                    <label for="senha" class="col-form-label">Código do Cliente</label>
                    <input type="number" class="form-control" name="cliente" maxlength="100" value="<?=$codCliente?>" id="cliente" required>
                    <div class="invalid-feedback">
                      Preencha este campo
                    </div>
                  </div>
                  <div class="col-md-5">
                    <label for="cpf" class="col-form-label">Status do Pagamento:</label>
                    <input type="text" value="<?=$statusReserva?>" <?php if($statusReserva == "Pendente"){?> class="form-control text-danger" <?php } else {?>  class="form-control text-success" <?php } ?> name="status" id="status" required>
                    <div class="invalid-feedback">
                      Preencha este campo
                    </div>
                    
                  </div>
                  </div>
                </div>
                 <div class="row mt-1">
                 <div class="col-md-3 mb-3">
                    <label for="senha" class="col-form-label">Qtd Horas</label>
                    <input type="number" class="form-control" name="cliente" maxlength="100" value="<?=$codCliente?>" id="cliente" required>
                    <div class="invalid-feedback">
                      Preencha este campo
                    </div>
                  </div>
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