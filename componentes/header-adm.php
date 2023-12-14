<header class="p-3 border-bottom bg-dark text-white shadow" style="height: 10vh">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="../index.php" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
        <img src="./../../img/client/logo1.png" width="50" height="50" class="d-inline-block align-top img-fluid" alt="">
      </a>
      <div class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 ms-3 fw-bold">
        Venus Hotel
      </div>

      <form action="../../componentes/logout.php" class="dropdown text-end">
        <a href="#" class="text-white d-block link-body-emphasis text-decoration-none dropdown-toggle"
          data-bs-toggle="dropdown" aria-expanded="false">
          <span><?=$adm['nomeAdm']?></span>
        </a>
        <ul class="dropdown-menu text-small">
          
          <li><button class="dropdown-item" href="./logout.php">Sign out</button></li>
        </ul>
</form>
    </div>
  </div>
</header>