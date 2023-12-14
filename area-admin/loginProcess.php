<?php
    require_once '../dao/AdmDao.php';
    session_start();
    $_SESSION['adm'] = AdmDao::logar($_POST['email'], $_POST['senha']);
    if($_SESSION['adm']!=false){
        header('Location: ./home');
    }else{
        header('Location: index.php?erro');
    }


?>