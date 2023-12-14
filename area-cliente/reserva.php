<?php
require_once '../dao/ReservaDao.php';
require_once '../dao/ClienteDao.php';
session_start();
if(isset($_SESSION['cliente'])) {
  $cliente = $_SESSION['cliente'];
  $infosReserva = ReservaDao::selectAllReservaCliente($cliente['codCliente']);
} else {

}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Venus Hotel</title>
  <link rel="short icon" href="./../img/client/logo1.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- icon Booststrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/navCss.css">
    <link rel="stylesheet" href="../css/reserva.css">
    <link rel="stylesheet" href="../css/infoReserva.css">
  
</head>
<body class="d-flex w-100 vh-100">
  <div id="fade" class="hide"></div>  
    <div class="d-flex w-100 flex-column">
    <?php include('../componentes/navbar.inc');?>
    <main class="d-flex w-100 border-dark" id="conteudo">
         <div class="navbar-lateral px-3 py-3 gap-4" id="nav-lateral">
                <div class="elementos gap-3" id="elementosN">
                    <a href="info.php" class="text-decoration-none text-black-50 fw-bold"><img src="../img/client/iconPessoa.png"><span id="infoP"> Informações Pessoais</span></a>
                    <a href="reserva.php" class="text-decoration-none text-black-50 fw-bold "><img style="width: 30px;" src="../img/client/list.png"> <span id="reservaP"> Minhas Reservas </span></a>
                </div>
          </div>
            <div class="d-flex gap-4 border border-dark" id="reservaMain">
                    <h4 class="px-5" style="padding-top: 20px;">Minhas Reservas</h4>
                    <div class="barra border border-2 align-self-center" style="width: 90%;"></div>
                <div class="reservas d-flex w-100 flex-column" style="background-color: #d6d6d4;">
                <?php
                  if($infosReserva!=false){
                for($i=0;$i<count($infosReserva);$i++){ ?>
                    <div class="reserva w-100 d-flex flex-row py-3" style="border-bottom: 1px solid #a1a09e;">
                      <div class="infoReserva d-flex flex-row align-items-center   w-50 gap-3">
                        <label class="fw-bold"></label>
                        <div class="form-control text-danger" id="suite"><?=$infosReserva[$i]['nomeQuarto']?></div>
                      </div>

                      <div class="infoReservas d-flex gap-3" id="precoReserva">
                        <label class="fw-bold " id="precoDesc" >Preço Total:</label>
                        <div class="form-control text-danger" id="rsPreco">R$<?=$infosReserva[$i]['valorTotalReserva']?></div>
                      </div>

                      <input type="hidden" name="infos" value="<?=$infosReserva[$i]['nomeQuarto']?>,<?=$infosReserva[$i]['valorTotalReserva']?>,<?=$infosReserva[$i]['nomeCategoriaQuarto']?>,<?=$infosReserva[$i]['valorHoraCategoriaQuarto']?>,<?=$infosReserva[$i]['qtdHorasReserva']?>,<?=$infosReserva[$i]['dataHoraReserva']?>,<?=$infosReserva[$i]['fotoQuarto']?>,<?=$infosReserva[$i]['codReserva']?>,<?=$infosReserva[$i]['statusReserva']?>">
                      
                      <button type="submit" onclick="toggleModal(<?=$i?>)" name="openModal" class="openModal border-0 rounded-3">Ver</button>
                    </div>

                    
                    <?php }}else{
                     ?>
                          <span>Não há reservas</span>
                   <?php } ?>
                    <div id="modal" class="hide">
                      <div class="w-100 d-flex justify-content-end mb-2">
                         <img src="../img/client/fechar.png" name="closeModal" onclick="toggleModal(null)">
                      </div>

                      <div class="conteudoModal w-100 px-2 py-2 d-flex flex-column gap-4">
                        <div class="d-flex gap-2" id="tituloM">
                          <div class="title rounded-3 fs-4 fw-bold" id="catSele">Categoria selecionada</div>
                          <div class="text-white rounded-1 py-1" id="nomeSele"></div>
                        </div>

                        <div class="descModal rounded-4 p-4 gap-3" id="descModal1">
                          <div class="areaFoto rounded-2" id="aFoto">
                            <img src="../img/quartos/" id="ftQt" class="rounded-2 img-fluid">
                          </div>

                          <div class="detalhesReserva d-flex gap-4" id="dtReserva">
                          <div class="conteudo1 d-flex flex-column gap-4">
                          <div class="" id="desc1">
                              <label class="py-2" ><strong id="desc1In" style="color: black;">Quarto:</strong> </label>
                            </div>
                            <div class="" id="desc1">
                              <label class="py-2" id="desc2In"><strong style="color: black;">Valor:</strong> R$</label>
                            </div>
                            <div class="d-flex px-3" id="desc2" style="background-color: #D9D9D9;">
                            <?php   ?>
                              <label class=" py-2"  style="color: gray;"><strong id="horas" style="color: black;">Horas:</strong></label>
                            </div>
                          </div>

                            <div class="gap-2" id="conteudo2">
                              <div class="d-flex px-3" id="desc3" style="background-color: #D9D9D9;">
                                 <?php    ?>
                                <label class="py-2" style="color: gray;"><strong id="data" style="color: black;">Data:</strong></label>
                              </div>
                                <div class="" id="desc4"></div>
                                <label id="vt" class="fw-bold px-2">Valor Total: R$</label>
                                <form action="pagarProcess.php" method="post">
                                  <input type="hidden" id="codReserva" name="codReserva">
                                <button type="submit" id="pagar" class="btn w-100 btn-outline-light text-dark">Pagar</button>
                                </form>
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>  
         </main>
    </div>
    <script src="../js/modalReserva.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../js/jquery.mask.min.js"></script>
  <script type="text/javascript" src="../js/personalizar.js"></script>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
   
  <script src="../js/jquery-3.0.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  
</body>
</html>