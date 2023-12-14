<?php
require_once(__DIR__ . '../../model/Conexao.php');

class ReservaDao{
    

    public static function insert($reserva){
        $pdo = Conexao::conexao();
        $com = "INSERT INTO tbreserva VALUES (NULL, :h, :dthr, :vt, :sts, :cq, :cc)";
        $stmt = $pdo->prepare($com);
        $stmt->bindValue(":h", $reserva->getQtdHoras());
        $stmt->bindValue(":dthr", $reserva->getDataHora());
        $stmt->bindValue(":vt", $reserva->getValorTotal());
        $stmt->bindValue(":sts", $reserva->getStatus());
        $stmt->bindValue(":cq", $reserva->getCodQuarto());
        $stmt->bindValue(":cc", $reserva->getCodCliente());
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
        $query = "DELETE FROM tbreserva WHERE codReserva = :cd";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":cd", $cod);
        $stmt->execute();
        $rows = $stmt->rowCount();
        if($rows>0){
        return true;
        }else{
        return false;
        }
    }

    public static function pagarReserva($cod){
        $pdo = Conexao::conexao();
        $com = "UPDATE tbreserva SET statusReserva = 'Paga' WHERE codReserva = :cr";
        $stmt = $pdo->prepare($com);
        $stmt->bindParam(':cr', $cod);
        $stmt->execute();
    }

    public static function contaReserva() {
        $pdo = Conexao::conexao();
        $query = "SELECT COUNT(codReserva) FROM tbreserva";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $rows = $stmt->rowCount();
        if($rows>0) {
            return $stmt->fetchAll();
        } else {
            return false;
        }
    }
    public static function selectAllReservaCliente($cod) {
        $pdo = Conexao::conexao();
        $query = "SELECT nomeQuarto, valorTotalReserva, nomeCategoriaQuarto,  valorHoraCategoriaQuarto, qtdHorasReserva, dataHoraReserva, fotoQuarto, codReserva, statusReserva FROM tbreserva as r
        INNER JOIN tbquarto q 
        ON r.codQuarto = q.codQuarto
        INNER JOIN tbcategoriaquarto c
        ON q.codCategoriaQuarto = c.codCategoriaQuarto
        WHERE codCliente = :cd AND statusReserva != 'Disponivel'";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':cd', $cod);
        $stmt->execute();
        $rows = $stmt->rowCount();
        if($rows>0) {
            return $stmt->fetchAll();
        } else {
            return false;
        }

    }
    public static function update($reserva, $cod) {
        $pdo = Conexao::conexao();
        $query = "UPDATE tbreserva SET dataHoraReserva = :dR, statusReserva = :sR WHERE codReserva = :cr";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':dR', $reserva->getDataHoraReserva());
        $stmt->bindParam(':sR', $reserva->getStatusReserva());
        $stmt->bindParam(':cr', $cod);
        $stmt->execute();
    }

    public static function selectCod($cod) {
        $pdo = Conexao::conexao();
        $query = "SELECT * FROM tbreserva WHERE codReserva = :cr";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":cr", $cod);
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function selectAll() {
        $pdo = Conexao::conexao();
        $query = "SELECT codReserva, qtdHorasReserva, dataHoraReserva, valorTotalReserva, statusReserva, q.codQuarto, c.codCliente FROM tbreserva r
        INNER JOIN tbquarto as q ON 
        r.codQuarto = q.codQuarto
        INNER JOIN tbclientes as c ON
        r.codCliente = c.codCliente
        ";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $rows = $stmt->rowCount();
        if($rows>0) {
            return $stmt->fetchAll();
        } else {
            return false;
        }

    }

    public static function lancaEvento($codReserva){
        $pdo = Conexao::conexao();
        $com = "CREATE EVENT verifica_reserva_$codReserva 
        ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 5 MINUTE  
        DO
        UPDATE tbreserva SET statusReserva = 'Disponivel'
        WHERE codReserva = :cr AND statusReserva = 'Pendente'";
        $stmt = $pdo->PREPARE($com);
        $stmt->bindParam(':cr', $codReserva);
        $stmt->EXECUTE();
    }

    public static function selectMaxCod(){
        $pdo = Conexao::conexao();
        $com = "SELECT MAX(codReserva) FROM tbreserva";
        $stmt = $pdo->prepare($com);
        $stmt->EXECUTE();
        return $stmt->fetch();
    }

    public static function verificaReserva($dataHora, $codQuarto){
        $pdo = Conexao::conexao();
        $com = "SELECT codQuarto FROM tbreserva WHERE dataHoraReserva = :dthr AND codQuarto = :cq AND statusReserva != 'Disponivel' ";
        $stmt = $pdo->prepare($com);
        $stmt->bindParam(':dthr',$dataHora);
        $stmt->bindParam(':cq',$codQuarto);
        $stmt->EXECUTE();
        if($stmt->rowCount()>0){
            return false;
        }else{
            return true;
        }
    }
}

?>