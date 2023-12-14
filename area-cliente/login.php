<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FilmeOn - Adm</title>
  <link rel="short icon" href="./../img/site/logo.png" />
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- icon -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"> <!-- CSS Projeto -->
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/modalLogin.css">
  
</head>

<body style="justify-content: center; align-items: center; height: 100vh; background:url(../img/site/loginScreen.png); background-size: cover ; background-repeat: no-repeat; " class="">
<div id="fade" class="hide"></div>  
  <div class="container  align-items-center justify-content-center col-xl-10 col-xxl-8 " style="height: 95vh; padding:8% 30px; background-color:'#ccc'">
    <div class="row align-items-center justify-content-center    g-lg-5 py-4  ">
      <div id="loginImg" class="col-lg-7 justify-content-center align-items-center text-center text-lg-start">
        <img src="./../img/client/logo1branco.png" class="rounded mx-auto d-block" alt="..." style="width:80%">
        
      </div>
      <div  id="login" class="col-md-10 mx-auto col-lg-5 ">
        <form  class="p-4 p-md-5 rounded-3 bg-dark" method="post" action="loginProcess.php" style="color:aliceblue"   class="needs-validation" novalidate>
          <div class="form-floating mb-3">
            <input type="text" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label class="text-dark" for="floatingInput " nam>Email</label>
          </div>
          <div class="form-floating ">
            <input type="password" name="senha" class="form-control" id="floatingPassword" placeholder="Password">
            <label class="text-dark" for="floatingPassword">Password</label>
          </div>
          <div class="checkbox mt-3 mb-2">
            <label>
              <input type="checkbox" value="remember-me"> Lembre de mim
            </label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" name="logar" style="background-color: #E48F4F; border: none;" id="" type="submit">Logar</button>
          <hr class="my-4">
          <small class="text-white">Ao clicar em Logar, você concorda com os termos de uso.</small>
          <div class="mt-3">
          <span class="mt-3">Ainda nao tem uma conta? <span  id="cadastrar" class="" style="text-decoration:underline">Cadastrar</span></span>
          </div>
          
          

        </form>
      </div>
      <div id="cadastroImg" class="col-lg-4  h-100  justify-content-center align-items-center text-center text-lg-start">
        <img src="./../img/client/logo1branco.png" class="rounded mx-auto d-block" alt="..." style="width:100%">
        
      </div>
      <div  id="cadastro" class="col-md-10 justify-content-center align-items-center col-lg-8 " style="height: 77vh">
        <form id="formCadastro" enctype="multipart/form-data" class="p-4 p-md-5 h-100  w-75 rounded-3 bg-dark" method="post" action="loginProcess.php" style="color:aliceblue"   class="needs-validation" novalidate>
        <div class="row "> 
        <input type="hidden" name="nomeFoto" id="nomeFoto" placeholder="nome foto" value=""> 
        <div class="form-group mb-2 col-md-4">
          <label class="form-text text-white" for="floatingInput ">Nome</label>
            <input type="text" name="nome" class="form-control" id="" >
          </div>
          <div class="form-group mb-2 col-md-8">
          <label class="form-text text-white" for="floatingInput ">CPF</label>
            <input type="text" name="cpf" class="form-control" id="" data-mask="000.000.000-00">
          </div>
          </div>
          <div class="form-group mb-2 ">
            <label class="text-white" for="floatingPassword">Email</label>
            <input type="email" name="email" class="form-control" id="floatingPassword" placeholder="">
          </div>
          <div class="form-group mb-2">
            <label class="text-white" for="floatingPassword">Senha</label>
            <input type="password" name="senha" class="form-control" id="floatingPassword" placeholder="">
          </div>
          <div class="form-group col-md-6">
                <label  class="w-100 mb-1" for="">Foto do Documento:</label>    
                <input type="file" id="fotoDoc" name="foto" accept="image/*" class="custom-file-input">
                  </div>
          <div class="checkbox mt-3 mb-2">
            <label>
              <input type="checkbox" value="remember-me"> Lembre de mim
            </label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" name="cadastrar" style="background-color: #E48F4F; border: none;" type="submit">Cadastrar</button>
          <hr class="my-4">
          <small class="text-white">Ao clicar em Logar, você concorda com os termos de uso.</small>
          <div class="mt-3">
          <span class="mt-3">Tem uma conta? <span id="logar"style="text-decoration:underline">Logar</span></span>
         </div>
        </form>
      </div>
      </div>
    </div>
  </div>
    
  <div class="hide" id="modal">
        <div class="image w-100 h-50 d-flex justify-content-evenly align-items-center  d-flex flex-column">
          <div class="borda w-25 d-flex justify-content-center align-items-center mt-3" id="bordaI">
            <img src="../img/site/alerta.png" class="w-100">
          </div>
          <span class="fw-bold fs-4">Deseja Continuar?</span>
        </div>
        <div class="footer d-flex align-items-center justify-content-between w-100 flex-column" style="background-color: #D9D9D9; ">
        <?php if(isset($_GET['erroAnalise'])){ ?>
          <span class="fs-6 w-75 text-center py-3" style="    background-color: #D9D9D9; ">Sua conta ainda não foi aprovada, aguarde até que o Administrador a libere.</span>
          <?php }
          else if(isset($_GET['erroReprovado'])){ ?>
          <span class="fs-6 w-75 text-center py-3" style="    background-color: #D9D9D9; ">Sua conta foi reprovada.</span>
          <?php }
          else if(isset($_GET['erroEmailEmUso'])){ ?>
            <span class="fs-6 w-75 text-center py-3" style="    background-color: #D9D9D9; ">Este email ou cpf já esta cadastrado em nosso site.</span>
            <?php }else{
            ?>
            <span class="fs-6 w-75 text-center py-3" style="    background-color: #D9D9D9; ">Erro, email ou senha incorretos.</span>
          <?php } ?>
          <div class="botoes w-100 d-flex align-items-center justify-content-center gap-3 mt-3">
            <a class="fechar btn px-3 btn-primary fw-bold" id="closeModal" role="button" aria-disabled="true">Voltar</a>
          </div>
        </div>
    </div>           
    
  <link rel="stylesheet" href="../css/login.css">
  <script src="../js/modalLogin.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
  </script>
  <script src="../js/login.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.0.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous" defer>
  </script>
  <!-- Para usar Mascara  -->
  <script type="text/javascript" src="../js/jquery.mask.min.js"></script>
  <script type="text/javascript" src="../js/personalizar.js"></script>

</body>
<?php if(isset($_GET['erroAnalise']) || isset($_GET['erroReprovado']) || isset($_GET['erroSenhaEmail']) || isset($_GET['erroEmailEmUso'])){
      
    ?>
    <script>toggleModal()</script>
    <?php
  } ?>
</html>