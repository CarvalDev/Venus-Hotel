<?php
require_once(__DIR__. '../../model/Conexao.php');

class CategoriaDao {
    public static function insert($categoria) {
        $pdo = Conexao::conexao();
        $com = "INSERT INTO tbcategoriaquarto VALUES(NULL,:nc, :ic, :vh)";
        $stmt = $pdo->PREPARE($com);
        $stmt->bindValue(':nc',$categoria->getNomeCategoria());
        $stmt->bindValue(':ic',$categoria->getItensCategoria());
        $stmt->bindValue(':vh',$categoria->getValorHoraCategoria());
        $stmt->EXECUTE();
        $rows = $stmt->rowCount();
        if($rows>0) {
            return true;
        } else {
            return false;
        }

    }

    public static function contaCategoria() {
        $pdo = Conexao::conexao();
        $query = "SELECT COUNT(codCategoriaQuarto) FROM tbcategoriaquarto";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $rows = $stmt->rowCount();
        if($rows>0) {
            return $stmt->fetchAll();
        } else {
            return false;
        }
    }
    public static function selectAll() {
        $pdo = Conexao::conexao();
        $com = "SELECT * FROM tbcategoriaquarto";
        $stmt = $pdo->prepare($com);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function delete($cod){
        $pdo = Conexao::conexao();
        $com = "DELETE FROM tbcategoriaquarto WHERE codCategoriaQuarto = :codCat";
        $stmt = $pdo->PREPARE($com);
        $stmt->bindParam(':codCat', $cod);
        $stmt->EXECUTE();
        $rows = $stmt->rowCount();
        if($rows>0){
            return true;
        }else{
            return false;
        }
    }

    public static function selectId($cod){
        $pdo = Conexao::conexao();
        $com = "SELECT * FROM tbcategoriaquarto WHERE codCategoriaQuarto = :codCat";
        $stmt = $pdo->prepare($com);
        $stmt->bindParam(':codCat', $cod);
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function update($cod, $categoria){
        $pdo = Conexao::conexao();
        $com = "UPDATE tbcategoriaquarto SET nomeCategoriaQuarto = :ncq, itensCategoriaQuarto = :ic, valorHoraCategoriaQuarto = :vhc WHERE codCategoriaQuarto = :cod";
        $stmt = $pdo->PREPARE($com);
        $stmt->bindParam(':cod', $cod);
        $stmt->bindValue('ncq', $categoria->getNomeCategoria());
        $stmt->bindValue(':ic',$categoria->getItensCategoria());
        $stmt->bindValue(':vhc',$categoria->getValorHoraCategoria());
        $stmt->EXECUTE();
        $rows = $stmt->rowCount();
        if($rows>0){
            return true;
        }else{
            return false;
        }
    }
} 

?>