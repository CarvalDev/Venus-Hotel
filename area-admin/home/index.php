<?php
  require_once '../../componentes/verificaAcesso.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
<?php
require_once '../../dao/ClienteDao.php';
require_once '../../dao/QuartoDao.php';
require_once '../../dao/ReservaDao.php';
require_once '../../dao/AdmDao.php';
require_once '../../dao/CategoriaDao.php';
$tudo = ClienteDao::contaCliente();
$tudo1 = QuartoDao::contaQuarto();
$tudo2 = ReservaDao::contaReserva();
$tudo3 = AdmDao::contaAdm();
$tudo4 = CategoriaDao::contaCategoria();

?>
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
            Dashboard - Home
          </div>
        </div>
        <div class=" row gap-5 align-items-center justify-content-center">
        <div class="border shadow p-2 rounded-2 w-25 bg-light" >
           <div class="image d-flex align-items-center justify-content-center py-5">
            <img src="../../img/site/estatistic.png">
           </div>
           <a href="../cliente" style="text-decoration: none;" class="text-dark"><div class="d-flex w-100 justify-content-center align-items-center flex-column" style="background-color: rgb(213, 209, 219); border-top-left-radius: 3%;border-top-right-radius: 3%;height: 30vh;">
            <span class="fs-2 fw-bold"><?= $tudo[0][0] ?></span>
            <label class="fs-5">Clientes Cadastrados</label>
           </div></a>
        </div>
        <div class="border shadow p-2 rounded-2 w-25 bg-light" >
           <div class="image d-flex align-items-center justify-content-center py-5">
            <img src="../../img/site/bed.png" style="width: 26%;">
           </div>
           <a href="../quartos" style="text-decoration: none;" class="text-dark"><div class="d-flex w-100 justify-content-center align-items-center flex-column" style="background-color: rgb(213, 209, 219); border-top-left-radius: 3%;border-top-right-radius: 3%;height: 30vh;">
            <span class="fs-2 fw-bold"><?=$tudo1[0][0]?></span>
            <label class="fs-5">Quartos Existentes</label>
           </div>
           </a>
        </div>
        <div class="border shadow p-2 rounded-2 w-25 bg-light" >
           <div class="image d-flex align-items-center justify-content-center py-5">
            <img src="../../img/site/door.png" style="width: 26%;">
           </div>
           <a href="../reservas" style="text-decoration: none;" class="text-dark"><div class="d-flex w-100 justify-content-center align-items-center flex-column" style="background-color: rgb(213, 209, 219); border-top-left-radius: 3%;border-top-right-radius: 3%;height: 30vh;">
            <span class="fs-2 fw-bold"><?=$tudo2[0][0]?></span>
            <label class="fs-5">Reservas Realizadas</label>
           </div>
           </a>
        </div>
        <div class="border shadow p-2 rounded-2 w-25 bg-light" >
           <div class="image d-flex align-items-center justify-content-center py-5">
            <img src="../../img/site/admin.png" style="width: 26%;">
           </div>
           <a href="../user" style="text-decoration: none;" class="text-dark"><div class="d-flex w-100 justify-content-center align-items-center flex-column" style="background-color: rgb(213, 209, 219); border-top-left-radius: 3%;border-top-right-radius: 3%;height: 30vh;">
            <span class="fs-2 fw-bold"><?=$tudo3[0][0]?></span>
            <label class="fs-5">Adm's Cadastrados</label>
           </div>
           </a>
        </div>
        <div class="border shadow p-2 rounded-2 w-25 bg-light" >
           <div class="image d-flex align-items-center justify-content-center py-5">
            <img src="../../img/site/sacola.png"style="width: 27%;">
           </div>
           <a href="../categorias" style="text-decoration: none;" class="text-dark"><div class="d-flex w-100 justify-content-center align-items-center flex-column" style="background-color: rgb(213, 209, 219); border-top-left-radius: 3%;border-top-right-radius: 3%;height: 30vh;">
            <span class="fs-2 fw-bold"><?=$tudo4[0][0]?></span>
            <label class="fs-5">Categorias Cadastrados</label>
           </div>
           </a>
        </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
  </script>
</body>

</html>