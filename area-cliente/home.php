<?php  

require_once('../dao/QuartoDao.php');
require_once('../dao/CategoriaDao.php');

session_start();

if(isset($_SESSION['cliente'])){
$cliente = $_SESSION['cliente'];
  
}else{
  session_destroy();
}

$infoQuarto = QuartoDao::selectAll();
$infoCategoria = CategoriaDao::selectAll();



?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Venus Hotel</title>
  <link rel="short icon" href="./../img/client/logo1.png" />
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- icon Booststrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <!-- CSS Projeto -->
  <script src="https://kit.fontawesome.com/d5ea0dfb99.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="../css/swiper-bundle.css">
  
   <link rel="stylesheet" href="../css/slider.css">

   <link rel="stylesheet" href="../css/Home.css"  >
  
</head>

<body>
<div style="background-color:#3D3933; height:100vh" >
          <?php include('../componentes/navbar.inc') ?>
  
    <div id="fundo" class=" w-100  m-0  m-0 mt-0 d-flex flex-column  justify-content-start align-items-center" style="background-color: #3D3933; height:85%">

              

            <div class="carousel slide   m-0 " style="height: 100%; width:100%; margin:0" data-bs-ride="carousel">
              <div class="carousel-inner w-100 h-100">
                    <div class=" w-100 h-100  carousel-item active" alt="First slide">
                        <img class="w-100 h-100 imagemFundo" src="../img/client/quartoAmarelo.jpg" alt="">
                    </div>
                    <div class="carousel-item w-100 h-100" alt="Second slide">
                      <img class="h-100 w-100 imagemFundo" src="../img/client/quartoVermelho.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item h-100 w-100" alt="Second slide">
                      <img class="h-100 w-100 imagemFundo" src="../img/client/quartoAzul.jpg" alt="Second slide">
                    </div>

              </div>
              <div class="w-100 h-100   d-flex justify-content-center align-items-center   " style="position:absolute; top:0">
                      <div id="areaCel" class="row  m-0 container  " style="height:100%">
                        <div id="foto" class="col-md-6   h-100">
                                  <div class="h-100   d-flex justify-content-end align-items-center " style="width: 100%;">
                                          <div id="areaFoto" class="h-100 " style="width: 100%;" >
                                          
                                          <div id="divFoto" class="h-100 d-flex flex-column justify-content-center align-items-end"id="imageFundoLogo" style="width: 100%;" >
                                              <img src="../img/client/logo1.png"  class="img-fluid  " alt="">
                                            </div>
                                            <div id="msgCel" class="">
                                      <span id="titulo" class="text-white text-center w-100    " style="opacity:unset; font-family:fonteNormal">Priorizamos seu Conforto</span>
                            
                                      <button id="sobrenos" class="mt-2">Reserve Agora</button>
                            
                                      </div>
                                        
                                        
                                               
                                          </div>
                                         

                                          
                                           
                                  </div>
                        </div>
                        <div id="initialMsgArea" class="col-md-6     h-100" style="color:#e9e9e9">
                            <div class="h-100 w-100  d-flex justify-content-center flex-column align-items-start">
                             <div id="initialMsg" class="d-flex justify-content-center align-items-center flex-column w-100" style="padding:50px;  ">
                              <span id="titulo" class="display-3 text-center w-100 " style="opacity:unset; font-family:fonteNormal">Priorizamos seu Conforto</span>
                              
                              <button id="sobrenos" onclick="abreModal(<?=isset($cliente)?true:false?>)" class="mt-2">Reserve Agora</button>
                              
                              </div>
                            </div>

                        </div>
                        </div>
            </div>
    </div>
    </div>



    



    
    <div class="w-100" id="sobreNosArea" style=" background-color:#2b2d42">
          <div class="container  d-flex   h-100">
                <div class="h-100 w-100 row m-0   d-flex flex-row justify-content-center align-items-center">
                  
                <div id="espacoSobreNos" class=""style=""></div>
                    <div class="col-md-4  d-flex justify-content-center align-items-center " id="blocoSobreNos">
                        <div class="h-100  d-flex flex-column justify-content-center align-items-center  cardSobre"  style="width:100%">
                            <div class="imgCard w-100 " style="height: 80%; background: url(../img/client/sp.webp)"></div>
                            <div class="d-flex flex-column justify-content-center align-items-center w-100" style="height:40%">
                                <div class=" w-100 d-flex align-items-center justify-content-center bg-dark" style="height: 40%">
                                  <span class="fs-4 text-white">+100 Unidades</span>
                                </div>
                                <div class=" d-flex text-white text-center justify-content-center align-items-center w-100" style="height:60%">
                                  <span style="font-size:15px">Temos diversas unidades, em boas localidades para facilitar sua busca por nossos serviços</span>
                                </div>
                            </div>
                            </div>
                    </div>
                    <div class="col-md-4  d-flex justify-content-center align-items-center " id="blocoSobreNos">
                        <div class="h-100  d-flex flex-column justify-content-center align-items-center  cardSobre"  style="width:100%">
                            <div class="imgCard w-100 " style="height: 80%; background: url(../img/client/custo.jpg)"></div>
                            <div class="d-flex flex-column justify-content-center align-items-center w-100" style="height:40%">
                                <div class=" w-100 d-flex align-items-center justify-content-center bg-dark" style="height: 40%">
                                  <span class="fs-4 text-white">Melhor Custo</span>
                                </div>
                                <div class=" d-flex text-white text-center justify-content-center align-items-center w-100" style="height:60%">
                                  <span style="font-size:15px">Trazemos os melhores custos do mercado para nosso hotel</span>
                                </div>
                            </div>
                            </div>
                    </div>
                    <div class="col-md-4  d-flex justify-content-center align-items-center " id="blocoSobreNos">
                        <div class="h-100  d-flex flex-column justify-content-center align-items-center  cardSobre"  style="width:100%">
                            <div class="imgCard w-100 " style="height: 80%; background: url(../img/client/conforto.webp)"></div>
                            <div class="d-flex flex-column justify-content-center align-items-center w-100" style="height:40%">
                                <div class=" w-100 d-flex align-items-center justify-content-center bg-dark" style="height: 40%">
                                  <span class="fs-4 text-white">Conforto</span>
                                </div>
                                <div class=" d-flex text-white text-center justify-content-center align-items-center w-100" style="height:60%">
                                  <span style="font-size:15px">Nosso lema é proporcionar o maior conforto possivel</span>
                                </div>
                            </div>
                            </div>
                    </div>
                    <div id="espacoSobreNos" class="w-100" ></div>
                </div>
          </div>

            
  
   </div>

   <div class="d-flex flex-column" id="quartos" >
       <div class="swiper container sliderQuartos    ">
               
                <div class="swiper-wrapper cardQuartoAbraco   ">

                <?php  foreach($infoQuarto as $info){ ?>
                        <div class="swiper-slide  cardQuarto rounded swiper-slide">
                          <div class="image-cont-quarto   ">
                              <div class="imageQuarto  ">
                                <img src="../img/quartos/<?=$info['fotoQuarto']?>" alt="">
                              </div>
                          </div> 
                        <div class="textoCardQuarto p-5 ">
                          <span class="" style="font-size:1.8rem"><?=$info['nomeQuarto']?></span>
                          <span>de <span class="antigoPreco"><?=number_format($info['valorHoraCategoriaQuarto']+ ($info['valorHoraCategoriaQuarto']*0.50), 2)?>R$</span> por</span>
                          <span class="fs-3"><?=number_format($info['valorHoraCategoriaQuarto'],2)?>R$</span>
                          <span>Categoria: <?=$info['nomeCategoriaQuarto']?></span>
                        </div>
                        </div> 
                        <?php
                } ?>
                        
                       
                     
              </div>
              <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-scrollbar"></div>
    
    
              </div>
        <div id="linhaBotaoReserva" class="w-100  mt-3 d-flex justify-content-center align-items-center" style="height:15%">
            <button id="reservaBtn" onclick="abreModal(<?=isset($cliente)?'true':'false'?>)" name="reservar" >Fazer Minha Reserva</button>
          </div>

        </div>
         

        <div class="w-100 d-flex align-items-center justify-content-center" id="ladoPremiere" style="background-color: #3F3E46;">
      <div class="h-100 gap-5 flex-column  " id="containerPremiere" >
        <div class="" id="titulo">
            <p class=" text-white fw-bold fs-3" id="tituloExperiencia" >Uma experiência única e inesquecível</p>
             <div class="area2 d-flex flex-column gap-5 " id="area2">
               <div class="linha mt-1" id="linhaR"></div>
               <p class="titulo2 text-white" style="font-size: larger;">E não para por ai! Além de tudo isso, temos opções de quartos com combos imperdíveis! Clique aqui para saber mais!</p>
             </div>
        </div>

        <div class="Luxo border-0 rounded-4 bg-white" id="Luxo">
            <img class="d-flex rounded-4" id="imgPremiere" src="../img/site/MOTEL PRETO.jpg">
            <div class="descLuxo m-4">
              <p class="text-uppercase" style="color:#6E57BF;">Tudo em luxo</p>
              <p class="fs-4 fw-bold text-dark" >Venus oferece seu lado mais chique!</p>
              <p class="fs-5 " style="width: 80%;">Para os mais exigentes, temos nosso lado Premiere, que oferece tudo do mais caro e luxuoso que qualquer motel pode oferecer, incluindo os melhores quartos, que podem vir com mais de 2 piscinas, mais de 3 varandas, mais de 2 suítes.</p>
            </div>
        </div>
      </div>
    </div>

    <div class="w-100 d-flex bg-black" id="comentariosAba" >
      <div class="conteudo w-100 d-flex flex-column d-flex align-items-center vh-100 justify-content-evenly" id="contComment">
        <img class="h-100 w-100 position-absolute z-0" style="background-blend-mode: hard-light;" src="../img/site//what.jpg">
          <h1 class="tituloComenta z-1 text-white my-5">O que as pessoas falam?</h1>
            <div class="comentarios z-1 d-flex gap-2 p-4 text-white" id="comentarios" >
              <div class="coment1 border border-5 rounded-4 h-50 d-flex align-items-center justify-content-center" id="comentario1" ><p class="" id="textoComentario1">“Excelentes quartos, o atendimento impecável, ótima carisma no serviço de quarto, fora que tudo isso saiu no precinho papai.”</p></div>
              <div class="coment2 border border-5 rounded-4 h-75 d-flex align-items-center justify-content-center" id="comentario2" ><p class="" id="textoComentario2">“É perfeito! Estava com muita dúvida em qual lugar levar minha namorada no dia dos namorados e me deparei com este hotel aqui, simplesmente magífico! Tive uma das melhores experiências aqui, sem sombra de dúvidas.”</p></div>
            </div>
      </div>
    </div>

    <div class="d-flex"  id="AbaExperiencia">
      <div class="d-flex gap-5 py-4 " id="containerExperiencia">
        <h1 class="my-5 text-white" id="tituloBrinquedo">Grande Experiência está sempre incluída</h1>
        <div class="imagem1 d-flex  gap-5" id="conteudoExperiencia">
          <img src="../img/site/brinquedo sexual.jpg" class="rounded-4" id="imagemExperiencia1">

          <div class="d-flex flex-column h-100 gap-5 " id="sobreExperiencia1">
            <div class="linha mt-4" id="linhaExperiencia"></div>
              <p class="text-white fs-4">Experiência sexual sem limite</p>
              <div class="">
               <p class="" id="gostos">Para um casal com gostos “peculiares” temos os melhores “brinquedos sexuais”</p>
                 <ul class="w-50 fs-5" style="color: rgb(199, 186, 186);">
                  <li>Chicote</li>
                  <li>Cana</li>
                  <li>Gag</li>
                  <li>Máscara/ Capuz</li>
                </ul>
              </div>
          </div>
        </div>
        <div class="imagem2 d-flex gap-5 mb-5" id="conteudoExperiencia2">
          <img src="../img/site/MotelX.jpg" class="rounded-4" id="imagemExperiencia2" >

          <div class="brinquedos d-flex  gap-5 text-white" id="sobreExperiencia2">
            <div class="linha mt-4" id="linhaExperiencia2"></div>
            <p class="fs-5" style="color: rgb(199, 186, 186);">
              Além das opções acima, temos diversos outros “brinquedos”, infelizmente só disponibilizamos para a visualização no dia em que os hospedes pisam no hotel, para nossa própria segurança.
            </p>
            <p class="fs-5" style="color: rgb(199, 186, 186);">
              Mas, você pode entrar em contato conosco para ver algumas das opções a mais que temos para oferecer.
            </p>
          </div>
        </div>
      </div>
    </div>


    <footer class="d-flex w-100 flex-column gap-2" style="background-color: #302D28;">
      <div class="infos d-flex text-white p-4 " id="infoFooter">
        <div id="junta">
        <div class="Inicio d-flex" id="InicioFooter">
          <h3 class="">Inicio</h4>
          <a href="#" class="text-decoration-none text-white">Home</a>
          <a href="" class="text-decoration-none text-white">Quartos</a>
          <a href="" class="text-decoration-none text-white">Depoimentos</a>
        </div>

        <div class="AboutUs d-flex" id="AboutUsFooter">
          <h3 class="">Sobre nós</h4>
          <a href="" class="text-decoration-none text-white">Quem somos?</a>
          <a href="" class="text-decoration-none text-white">Avaliações</a>
          <a href="" class="text-decoration-none text-white">Contato</a>
        </div>
        </div>
        <div class="Infos d-flex" id="contatoFooter">
          <h3 class="">Informações</h4>
          <p class="" id="contatoInfo">
            Se você deseja anunciar algum de nossos quartos ou adquirir algum grau de parceria conosco, contate-nos imediatamente por esse número <a href="" class="text-decoration-none text-white flex-row"><strong>(11) 9802-9000.</strong></a>
          </p>
        </div>
      </div>
        <div class="final d-flex px-3 " id="finalFooter">
          <img src="../img/client/logo1.png" id="logoFooter">
          <div id="redes">
            <img src="../img/site/icons8-twitter-48.png">
            <img src="../img/site/icons8-facebook-48.png">
            <img src="../img/site/icons8-instagram-48.png">
          </div>
        </div>
    </footer>
   </div>

            <!-- DIALOG  -->
           
        <dialog id="reservaModal" style="background-color: #2b2d42;">
          <span id="closeBtn" class="fs-1"><i class="fa-solid fa-xmark"></i></span>
        <form action="reservaProcess.php" class="w-100 h-100 d-flex justify-content-center align-items-center" method="post">
          <div  class="w-100 h-100 d-flex text-white flex-column justify-content-center align-items-center">
           <div id="selectArea" class="d-flex flex-row  justify-content-between align-items-center" style="height:15%; width:90%"> 
         
           <select  name="categoria" id="categoria" style="background-color: #8d99ae;color:#fff">
            <option selected value="Nenhum">Selecione uma categoria</option>
            <?php foreach($infoCategoria as $categoria){ ?>
            <option name="" value="<?=$categoria[0]?>,<?=$categoria[1]?>,<?=$categoria[2]?>,<?=$categoria[3]?>"><?=$categoria[1]?></option>
            
            <?php

          } ?>
          </select>
         
        </div>
        <div id="contModal" class="d-flex row flex-row justify-content-between align-items-center " style="height:70%; width:90%">
          <div id="infos" class=" col-md-5 d-flex flex-column p-4 justify-content-between rounded align-items-center" style="height:90%; background-color:#8d99ae">
                <div class=" d-flex flex-column justify-content-center align-items-center w-100" style="height: 70%;">
                      <span id="categoriaPreco" class="w-100 text-center fs-5 mb-2">Selecione a categoria</span>
                      <input type="date" name="data" class="form-control w-75 mb-1">
                      <select class="form-control w-75 mb-2" name="horas" onchange="renderTotal()" id="qtdHoras">
                        <option  selected value="">Qtd Horas</option>
                        <option value="1">1H</option>
                        <option value="2">2H</option>
                        <option value="6">6H</option>
                        <option value="12">12H</option>
                      </select>
                      <input type="time" name="hora" class="form-control w-75 mb-1">
                      <input type="hidden" name="valorTotal" id="valorTotal">
                      
                </div>
                <div class=" w-100" style="height:27%">
                  <span id="itensNoQuarto" class="w-100 h-100" style="font-size:100%"></span>                
                </div>
          </div>
          <div id="fotoQuarto" class=" col-md-6 d-flex justify-content-center align-items-center" style="height:80%">
            <img id="imgQuarto" src="../img/client/quartoAzul.jpg" class="img-fluid" style="transform:scale(1.1) " alt="">
          </div>
      </div>
        <div id="buttonModalArea" class="d-flex flex-column  justify-content-center align-items-center" style="height:15%; width:90%">
          <button id="reservaBtnCrud" >Reservar</button>   
          <?php if(isset($_GET['naoHaQuartos'])){ ?>
          <span id="total">Não há quartos disponiveis nessa categoria para esse horario e data especifica</span>
          <?php } else{?>
            <span id="total"></span>
            <?php } ?>
      </div>
        
      </form>
    </dialog>

    
  

  <link rel="stylesheet" href="../css/slider.css">
    <link rel="stylesheet" href="../css/navCss.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
   
  <script src="../js/jquery-3.0.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script>
        $('.carousel').carousel({
        interval: 200
        })

        var collapseElementList = [].slice.call(document.querySelectorAll('.collapse'))
var collapseList = collapseElementList.map(function (collapseEl) {
  return new bootstrap.Collapse(collapseEl)
})
        
  </script>
   <script src="../css/swiper-bundle.min.js"></script>
   <script src="../js/slider.js"></script>
  
   <?php if(isset($_GET['naoHaQuartos'])){
                ?>
                <script>abreModal(<?=isset($cliente)?true:false?>)</script>
              <?php }?>


</body>

</html>