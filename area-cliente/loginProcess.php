<?php
require_once('../dao/ClienteDao.php');
require_once('../model/Cliente.php');


    if(isset($_POST['cadastrar'])) {
        $cliente = new Cliente();
        $cliente->setNomeCliente($_POST['nome']);
        $cliente->setCpfCliente($_POST['cpf']);
        $cliente->setEmailCliente($_POST['email']);
        $cliente->setSenhaCliente($_POST['senha']);
        if(ClienteDao::checkCredentials($cliente->getCpfCliente(), $cliente->getEmailCliente()) == false) {
            $cliente->setFotoDocumento($cliente->saveImage($_POST['nomeFoto']));
            if(ClienteDao::insert($cliente)){
                header('Location:login.php?sucessoMenor');
            }
        }else{
            header('Location: login.php?erroEmailEmUso');
        }
    }

    if(isset($_POST['logar'])) {
        $cliente = new Cliente();
        $cliente->setEmailCliente($_POST['email']);
        $cliente->setSenhaCliente($_POST['senha']);
        $status = ClienteDao::logar($cliente->getEmailCliente(), $cliente->getSenhaCliente());
        if($status==false){
            header('Location: login.php?erroSenhaEmail');
        }
        else{
        if($status['statusCliente']=="Aprovado"){
            session_start();
            $_SESSION['cliente'] = $status;
            header('Location: home.php?LoginSucesso');
        }else if($status['statusCliente']=="Analise") {
            header('Location: login.php?erroAnalise');
        }else if($status['statusCliente']=="Reprovado"){
            header('Location: login.php?erroReprovado');
        }
    }

        
    }


?>