<?php
session_start();
require_once '../dao/ClienteDao.php';
    if(isset($_SESSION['cliente'])) {
        $cliente = $_SESSION['cliente'];
        $infosCliente = ClienteDao::selectCod($cliente['codCliente']);

        if(!empty($_POST)) { //se nao tiver vazio
          $cod = $infosCliente['codCliente'];
          $nome = $infosCliente['nomeCliente'];
          $email = $infosCliente['emailCliente'];
          $senha = $infosCliente['senhaCliente'];
        } else {
          $cod = '';
          $nome = '';
          $email = '';
          $senha = '';
        }
    } else {
    }
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- icon Booststrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/navCss.css">
    <link rel="stylesheet" href="../css/infoReserva.css">
    <title>Venus Hotel</title>
  <link rel="short icon" href="./../img/client/logo1.png" />

</head>
<body>
    <div class="conteudo w-100" style="height: 100vh;">
    <?php include('../componentes/navbar.inc');?>

         <main class="d-flex w-100" id="conteudo" style="background-color:#a1a09e; height: 90%;">
            <div class="navbar-lateral px-3 py-3 gap-4" id="nav-lateral">
                <div class="elementos gap-3" id="elementosN">
                    <a href="info.php" class="text-decoration-none text-black-50 fw-bold"><img src="../img/client/iconPessoa.png"><span id="infoP"> Informações Pessoais</span></a>
                    <a href="reserva.php" class="text-decoration-none text-black-50 fw-bold "><img style="width: 30px;" src="../img/client/list.png"> <span id="reservaP"> Minhas Reservas </span></a>
                </div>
            </div>
            <div class="" id="main">
            <div class="card" id="carde">
                <form class="w-100 h-100" method="POST" action="./infoProcess.php">
                    <div class="card-header fw-bold text-uppercase" style="">Informações Registradas</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                <div class="">
                                    <label class="">Nome:</label>
                                    <input type="text" class="form-control " name="nome" value="<?=$infosCliente['nomeCliente']?>"/>
                                </div>
                                <div class="mt-4">
                                    <label class="">Senha:</label>
                                    <input type="text" class="form-control " name="senha" value="<?=$infosCliente['senhaCliente']?>"/>
                                </div>
                                <div class="mt-4">
                                    <label class="">Cpf:</label>
                                    <input type="text" class="form-control" data-mask="000.000.000-00" name="cpf" value="<?=$infosCliente['cpfCliente']?>" maxlength="14"/>
                                </div>
                                </div>
                                <div class="col-md-6 border-start border-black border-2">
                                <div class="">
                                    <label class="">Email:</label>
                                    <input type="text" class="form-control " name="email" value="<?=$infosCliente['emailCliente']?>"/>
                                </div>
                                
                                <div class="mt-4">
                                    <label class="">Status:</label>
                                    <div name="status" <?php if($infosCliente['statusCliente'] != "Aprovado" ){?> class="form-control text-danger"<?php } else{?>class="form-control text-success"<?php }?>>
                                    <?=$infosCliente['statusCliente']?>
                                    </div>
                                </div>
                                </div>
                            </div>
                          </div>
                          <div class="text-end px-5 align-items-end">
                              <input type="hidden" value="<?=$infosCliente['codCliente']?>" name="cod">
                              <input type="hidden" name="acao" id="acao" value="<?=$infosCliente['codCliente']?"ATUALIZAR":""?>" >
                              <a class="btn px-3 " href="home.php" role="button" aria-disabled="true" style="background-color: gray;">Voltar</a>
                              <button type="submit" class="btn px-3"  aria-disabled="true" style="background-color: rgb(207, 176, 37)">Salvar</button>
                         </div>
                </form>
            </div>
         </div>
         </main>
    </div>
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
  
</html>