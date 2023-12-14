<?php
require_once(__DIR__. '../../model/Conexao.php');

class ClienteDao {

    public static function insert($cliente) {
        $pdo = Conexao::conexao();
        $com = "INSERT INTO tbclientes VALUES(NULL,:nc, :ec, :sc, :cc, :fc, :stsc)";
        $stmt = $pdo->prepare($com);
        $stmt->bindValue(':nc', $cliente->getNomeCliente());
        $stmt->bindValue(':ec', $cliente->getEmailCliente());
        $stmt->bindValue(':sc', $cliente->getSenhaCliente());
        $stmt->bindValue(':cc', $cliente->getCpfCliente());
        $stmt->bindValue(':fc', $cliente->getFotoDocumento());
        $stmt->bindValue(':stsc', $cliente->getStatusCliente());
        $stmt->execute();
        $rows = $stmt->rowCount();
        if($rows>0){
            return true;
        }else{
            return false;
        }
    }

    public static function contaCliente() {
        $pdo = Conexao::conexao();
        $query = "SELECT COUNT(codCliente) FROM tbclientes";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $rows = $stmt->rowCount();
        if($rows>0) {
            return $stmt->fetchAll();
        } else {
            return false;
        }
    }
    public static function checkCredentials($cpfCliente, $emailCliente) {
        $pdo = Conexao::conexao();
        $com = "SELECT * FROM tbclientes WHERE cpfCliente = :cpf OR emailCliente = :email ";
        $stmt = $pdo->prepare($com);
        $stmt->bindParam(':cpf', $cpfCliente);
        $stmt->bindParam(':email', $emailCliente);
        $stmt->execute();
        $rows = $stmt->rowCount();
        if($rows>0){
            return true;
        }else{
            return false;
        }
    }

    public static function logar($emailCliente, $senha) {
        $pdo = Conexao::conexao();
        $com = "SELECT * FROM tbclientes WHERE emailCliente = :email AND senhaCliente = :senha ";
        $stmt = $pdo->prepare($com);
        $stmt->bindParam(':email', $emailCliente);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        $rows = $stmt->rowCount();
        if($rows>0){
            return $stmt->fetch();
        }else{
            return false;
        }

    }
    public static function selectCod($cod) {
        $pdo = Conexao::conexao();
        $query = "SELECT * FROM tbclientes where codCliente = :cc";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":cc", $cod);
        $stmt->execute();
        $rows = $stmt->rowCount();
        if($rows>0){
            return $stmt->fetch();
        }else{
            return false;
        }
    }

    public static function selectAll() {
        $pdo = Conexao::conexao();
        $query = "SELECT * FROM tbclientes";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $rows = $stmt->rowCount();
        if($rows>0) {
            return $stmt->fetchAll();
        } else {
            return false;
        }
    }

    public static function selectAllAnalise(){
        $pdo = Conexao::conexao();
        $com = "SELECT * FROM tbclientes WHERE statusCliente != 'Aprovado'";
        $stmt = $pdo->PREPARE($com);
        $stmt->EXECUTE();
        $rows = $stmt->rowCount();
        if($rows>0){
            return $stmt->fetchAll();
        }else{
            return false;
        }

    }

    public static function update($cliente, $cod) {
        $pdo = Conexao::conexao();
        $query = "UPDATE tbclientes SET
        nomeCliente = :nC,
        emailCliente = :eC,
        senhaCliente = :sC,
        cpfCliente = :cC
        WHERE codCliente = :cd";
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':nC', $cliente->getNomeCliente());
        $stmt->bindValue(':eC', $cliente->getEmailCliente());
        $stmt->bindValue(':sC', $cliente->getSenhaCliente());
        $stmt->bindValue(':cC', $cliente->getCpfCliente());
        $stmt->bindValue(':cd', $cod);
        $stmt->EXECUTE();
        $rows = $stmt->rowCount();
        if($rows>0) {
            return true;
        } else {
            return false;
        }
    }

    public static function updateStatus($cod, $status){
        $pdo = Conexao::conexao();
        $com = "UPDATE tbclientes SET statusCliente = :sts WHERE codCliente = :cod";
        $stmt = $pdo->PREPARE($com);
        $stmt->bindValue(':sts', $status);
        $stmt->bindParam(':cod', $cod);
        $stmt->EXECUTE();
        $rows = $stmt->rowCount();
        if($rows>0){
            return true;
        }else{
            return false;
        }

    }
    
    public static function delete($cod) {
        $pdo = Conexao::conexao();
        $query = "DELETE FROM tbclientes WHERE codCliente = :cd";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':cd', $cod);
        $stmt->execute();
        $rows = $stmt->rowCount();
        if($rows>0) {
            return true;
        } else {
            return false;
        }

    }
    }





?>