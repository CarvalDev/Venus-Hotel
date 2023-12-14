<?php
  require_once '../../componentes/verificaAcesso.php';
?>

<?php
require_once '../../dao/ClienteDao.php';


$infosCliente = ClienteDao::selectAllAnalise();
$status = "Analise";
if (isset($_POST['troca'])) {
  $status = $_POST['troca'];
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
        <form action="" method="post" class="row align-items-center mb-4">
          <div class="col fs-3 fw-semibold">
            <select name="troca" class="form-select" id="">
              <option value="Analise"> Lista de Clientes a serem aprovados </option>
              <option value="Reprovado"> Lista de Clientes reprovados </option>
            </select>

          </div>
          <div class="col">
            <button name="btnTroca" class="btn btn-outline-dark">Trocar</button>
          </div>

        </form>
        <div class=" row">
          <?php if ($infosCliente == false) {

          ?>
            <div><span>Não há clientes em análise ou reprovados</span></div>
            <?php
          } else {
            $achados = 0;
            foreach ($infosCliente as $info) {
              if ($info['statusCliente'] == $status) {
                $achados++; ?>
                <div class="col-md-4 d-flex align-items-center justify-content-center " style="height: 45vh !important;">
                  <div class="card border border-light shadow" style="width: 80%; height: 100%;">
                    <div class="card-header" style="height: 70%;border:none !important">
                      <img width="100%" height="100%" src="../../img/docs/<?= $info['fotoDocumentoCLiente'] ?>">
                    </div>
                    <div class="card-footer d-flex flex-column align-items-center justify-content-center gap-3" style="height: 30%; border:none !important">
                      <div class="nomeCpfCliente d-flex flex-column justify-content-center align-items-center">
                        <span><strong>Nome:</strong> <?= $info['nomeCliente'] ?></span>
                        <span>Cpf: <?= $info['cpfCliente'] ?></span>
                      </div>
                      <form action="process.php" method="post" class="d-flex align-items-center justify-content-center gap-3 ">
                        <input type="hidden" name="codCliente" value="<?= $info['codCliente'] ?>">
                        <?php if ($info['statusCliente'] == "Analise") { ?>
                          <button name="acao" class="btn btn-danger" value="Reprovado" type="submit"><i class="fa-solid fa-x"></i></button>
                          <button name="acao" class="btn btn-success" value="Aprovado" type="submit"><i class="fa-solid fa-check"></i></button>
                        <?php } else {

                        ?>
                          <button name="acao" class="btn btn-success" value="Aprovado" type="submit"><i class="fa-solid fa-check"></i></button>


                        <?php } ?>
                      </form>
                    </div>
                  </div>
                </div>

              <?php
              }
            }
            if ($achados == 0) {
              ?>
              <div><span>Não há usuarios em status de <?= $status ?></span></div>
          <?php
            }
          } ?>

        </div>


      </div>
    </div>
  </div>



  <?= require './../../componentes/modal.php' ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
  </script>
  <script src='../../js/personalizar.js'></script>
</body>

</html>