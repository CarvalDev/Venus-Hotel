<nav class="navbar sticky-top navbar-expand-lg  d-flex justify-content-center align-items-center   " style="background-color:#3D3933; height:10%">
                <div class="container  sticky-top  d-flex align-items-center   " style="height:120% ;background-color:#3D3933;">
                  
                    
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#itens" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                     </button>
                     <a class="navbar-brand  d-flex justify-content-center align-items-center" style=" width: 150px; height: 100%;  " href="">
                      <img src="../img/client/logo1.png"   class="img-fluid p-2 m-0 " style="" alt="">
                    </a>
                    <div class="collapse navbar-collapse  h-100  w-100 align-items-center justify-content-between" style="z-index: 10; background-color:#3D3933; " id="itens">
                      
                    <ul class="navbar-nav  w-100 h-100 align-items-center justify-content-between" style="background-color:#3D3933">
                    <div style="width:2%"></div>
                    
                    <div  class="" id="ancoras" style=" background-color:#3D3933">
                      <li  class="nav-item">
                        <a class="nav-link" href="">Quartos</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="">Contato</a>
                      </li>
                      <li class="nav-item">
                        
                      <a class="nav-link" href="">Depoimentos</a>
                    </li>
                    </div>
                    <?php if(isset($cliente)){
                            ?>
                            <div class=" d-flex justify-content-center align-items-center">
                                <div class="dropdown d-flex flex-row">
                                    <a href="#" class="text-white   text-decoration-none dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <span><?=$cliente['nomeCliente']?></span>
                                    </a>
                                    <ul class="dropdown-menu text-small">
                                    <li><a class="dropdown-item" href="./home.php">Home</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="./info.php">Perfil/Reservas</a>
                                    <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="./logout.php">Sign out</a></li>
                                    </ul>
                                </div>
                                </div>
                            <?php
                    }else{ ?>
                    <div id="buttons" style="">
                            <button class="me-2" id="cadastrar" ><a href="./login.php" class="text-decoration-none text-white">Login</a></button>
                            <button id="entrar">Sign In</button>
                    </div>
                    <?php }
                    ?> 
                    </div>
                  </ul>
                </div>
             </nav>