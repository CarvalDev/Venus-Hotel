<?php
session_start();

if(isset($_SESSION['adm'])){
$adm = $_SESSION['adm'];
  
}else{
  session_destroy();
  header('Location: ../index.php');
}


?>