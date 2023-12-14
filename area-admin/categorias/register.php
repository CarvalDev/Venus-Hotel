<?php
  require_once '../../componentes/verificaAcesso.php';
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
<?php 
  require_once("../../componentes/modal.php");
  require_once '../../dao/AdmDao.php';
  if(!empty($_POST)){
    $codCategoria = $categoria['codCategoriaQuarto'];
    $nomeCategoria =  $categoria['nomeCategoriaQuarto'];
    $valorHora = $categoria['valorHoraCategoriaQuarto'];
    $itensCategoria = $categoria['itensCategoriaQuarto'];
    }else{
    $codCategoria = '';
    $nomeCategoria =  '';
    $valorHora = '';
    $itensCategoria = '';
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
              <input type="hidden" name="codCategoria" id="codCategoria" placeholder="id" value="<?=$codCategoria?>">
              <input type="hidden" value="<?=$codCategoria?'ATUALIZAR':'INSERIR'?>" name="acao" > 
              <strong>INFORMAÇÕES DA CATEGORIA</strong>
            </div>
            <div class="card-body row justify-content-center align-items-center">
              
              <div class=" col-md-9">
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="nome" class="col-form-label">Nome:</label>
                    <input type="text" class="form-control" name="nomeCat" value="<?=$nomeCategoria?>" maxlength="50" id="nome"required >
                    <div class="invalid-feedback">
                      Preencha este campo
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="valor" class="col-form-label">Valor/Hora:</label>
                    <input type="text"  class="form-control"  onKeyUp="mascaraMoeda(this, event)" name="valorHora" value="<?=$valorHora?>" maxlength="50" id="money" required>
                    <div class="invalid-feedback">
                      Preencha este campo
                    </div>
                  </div>
                 
                </div>
                <div class="row ">
                
                  <div class="col-md-6 mb-3 d-flex flex-column">
                    <label class="mb-2" for="itens">Itens da categoria:</label>
                      <div class="form-check">
                      <input type="checkbox" class="form-check-input border border-dark" name="itens[]" value="Hidromassagem">
                      <label for="Hidromassagem" class="form-check-label">Hidromassagem</label>
                      </div>
                      <div class="form-check">
                      <input type="checkbox" class="form-check-input border border-dark" name="itens[]" value="ArCondicionado">
                      <label for="Ar" class="form-check-label">Ar condicionado</label>
                      
                      </div>
                      <div class="form-check">
                      <input type="checkbox" class="form-check-input border border-dark" name="itens[]" value="TvSmart">
                      <label for="Tv" class="form-check-label">Tv smart</label>
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
                  <input type="submit" class=" btn btn-success">
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
  

 
 <script>
    String.prototype.reverse = function(){
  return this.split('').reverse().join(''); 
};

function mascaraMoeda(campo,evento){
  var tecla = (!evento) ? window.event.keyCode : evento.which;
  var valor  =  campo.value.replace(/[^\d]+/gi,'').reverse();
  var resultado  = "";
  var mascara = "##.###.###,##".reverse();
  for (var x=0, y=0; x<mascara.length && y<valor.length;) {
    if (mascara.charAt(x) != '#') {
      resultado += mascara.charAt(x);
      x++;
    } else {
      resultado += valor.charAt(y);
      y++;
      x++;
    }
  }
  campo.value = resultado.reverse();
}
  </script>

</body>

</html>