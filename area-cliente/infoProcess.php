<?php
require_once '../dao/ClienteDao.php';
require_once '../model/Cliente.php';
$acao = $_POST['acao'];
$cliente = new Cliente();
switch($acao) {
    case "ATUALIZAR":
        $cliente->setNomeCliente($_POST['nome']);
        $cliente->setSenhaCliente($_POST['senha']);
        $cliente->setCpfCliente($_POST['cpf']);
        $cliente->setEmailCliente($_POST['email']);
        $cod = $_POST['cod'];
        if(ClienteDao::update($cliente, $cod)) {
            header('Location: info.php?=SucessoAtualizar');
        } else {
            header('Location: info.php?=ErroAtualizar');
        }
    break;
    case "DELETE":
        if(ClienteDao::delete($_POST['cod'])) {
            header('Location: home.php?=UsuarioDeletado');
        } else {
            header('Location: info.php?=erroDeletar');
        }
    break;
    
}

?>