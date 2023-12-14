<?php
require_once(__DIR__ . '../../model/Conexao.php');
class QuartoDao{


    public static function insert($quarto) {
        $pdo = Conexao::conexao();
        $com = "INSERT INTO tbquarto VALUES(NULL,:nq, :fq, :dq, :ccq)";
        $stmt = $pdo->PREPARE($com);
        $stmt->bindValue(':nq',$quarto->getNomeQuarto());
        $stmt->bindValue(':fq',$quarto->getfotoQuarto());
        $stmt->bindValue(':dq',$quarto->getDescQuarto());
        $stmt->bindValue(':ccq',$quarto->getcodCategoriaQuarto());
        $stmt->EXECUTE();
        $rows = $stmt->rowCount();
        if($rows>0) {
            return true;
        } else {
            return false;
        }

    }

    public static function contaQuarto() {
        $pdo = Conexao::conexao();
        $query = "SELECT COUNT(codQuarto) FROM tbquarto";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $rows = $stmt->rowCount();
        if($rows>0) {
            return $stmt->fetchAll();
        } else {
            return false;
        }
    }
    public static function selectAll(){
        $pdo = Conexao::conexao();
        $com = "SELECT codQuarto, nomeQuarto, descQuarto, fotoQuarto, nomeCategoriaQuarto, valorHoraCategoriaQuarto FROM tbquarto as q
        INNER JOIN tbcategoriaquarto c
        ON q.codCategoriaQuarto = c.codCategoriaQuarto";
        $stmt = $pdo->PREPARE($com);
        $stmt->EXECUTE();
        return $stmt->fetchAll();


    }

    public static function selectCod($cod){
        $pdo = Conexao::conexao();
        $com = "SELECT * FROM tbquarto WHERE codQuarto = :codQ";
        $stmt = $pdo->prepare($com);
        $stmt->bindParam(':codQ', $cod);
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function delete($cod){
        $pdo = Conexao::conexao();
        $com = "DELETE FROM tbquarto WHERE codQuarto = :codQ";
        $stmt = $pdo->PREPARE($com);
        $stmt->bindParam(':codQ', $cod);
        $stmt->EXECUTE();
        $rows = $stmt->rowCount();
        if($rows>0){
            return true;
        }else{
            return false;
        }
    }

    

    public static function update($quarto, $cod){
        $pdo = Conexao::conexao();
        $com = "UPDATE tbquarto 
        SET nomeQuarto = :nq,
        fotoQuarto = :fq,
        descQuarto = :dq,
        codCategoriaQuarto = :ccq
        WHERE codQuarto = :codq";
        $stmt = $pdo->PREPARE($com);
        $stmt->bindValue(':nq',$quarto->getNomeQuarto());
        $stmt->bindValue(':fq',$quarto->getfotoQuarto());
        $stmt->bindValue(':dq',$quarto->getDescQuarto());
        $stmt->bindValue(':ccq',$quarto->getcodCategoriaQuarto());
        $stmt->bindValue(':codq',$cod);
        $stmt->EXECUTE();
        $rows = $stmt->rowCount();
        if($rows>0){
            return true;
        }else{
            return false;
        }
    }

    public static function selectByCodCategoria($codCategoria){
        $pdo = Conexao::conexao();
        $com = "SELECT * FROM tbquarto WHERE codCategoriaQuarto = :cc";
        $stmt = $pdo->PREPARE($com);
        $stmt->bindParam(':cc', $codCategoria);
        $stmt->EXECUTE();
        if($stmt->rowCount()>0){
            return $stmt->fetchAll();
        }else{
            return false;
        }

    }

    
}








?>