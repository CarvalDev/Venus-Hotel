<?php

require_once(__DIR__ . '../../model/Conexao.php');

class AdmDao{
    public static function insert($adm) {
        
        $pdo = Conexao::conexao();
        $com = "INSERT INTO tbadm  VALUES (NULL, :n, :e, :s, :t)";
        
        $stmt = $pdo->PREPARE($com);
        $stmt->bindValue(":n", $adm->getNome());
        $stmt->bindValue(":e", $adm->getEmail());
        $stmt->bindValue(":s", $adm->getSenha());
        $stmt->bindValue(":t", $adm->getToken()); 
        $stmt->execute();
        $rows = $stmt->rowCount();
        if($rows>0){
            return true;
        }else{
            return false;
        }


     }
    public static function selectAll() {
        $pdo = Conexao::conexao(); 
        $com = "SELECT * FROM tbadm"; //COMANDO DO SEELECT GERAL
        $stmt = $pdo->PREPARE($com); //PREPARANDO O COMANDO, COMO SE TIVESSE ESCRITO NA QUERY
        $stmt->EXECUTE(); //EXECUTANDO O COMANDO
        $rows = $stmt->rowCount(); //CONTANDO LINHAS AFETADAS
        if($rows>0){
            return $stmt->fetchAll(); // trazendo as informações do banco em forma de matriz
        }else{
            return false;
        }
    }
    public static function contaAdm() {
        $pdo = Conexao::conexao();
        $query = "SELECT COUNT(codAdm) FROM tbadm";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $rows = $stmt->rowCount();
        if($rows>0) {
            return $stmt->fetchAll();
        } else {
            return false;
        }
    }

    public static function logar($emailAdm, $senha) {
        $pdo = Conexao::conexao();
        $com = "SELECT * FROM tbadm WHERE emailAdm = :email AND senhaAdm = :senha ";
        $stmt = $pdo->prepare($com);
        $stmt->bindParam(':email', $emailAdm);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        $rows = $stmt->rowCount();
        if($rows>0){
            return $stmt->fetch();
        }else{
            return false;
        }

    }
    public static function update($cod, $user) {
        $pdo = Conexao::conexao();
        $com = "UPDATE tbadm SET nomeAdm = :n, emailAdm = :e, senhaAdm =:s WHERE codAdm = :cod";
        $stmt = $pdo->PREPARE($com);
        $stmt->bindValue(':n', $user->getNome());
        $stmt->bindValue(':e', $user->getEmail());
        $stmt->bindValue(':s', $user->getSenha());
        $stmt->bindValue(':cod', $cod);
        $stmt->EXECUTE();
        $rows = $stmt->rowCount();
        if($rows>0){
            return true;
        }else{
            return false;
        }
    }
    public static function selectCod($cod) {

        $pdo = Conexao::conexao(); 
                $com = "SELECT * FROM tbadm WHERE codAdm = :cod"; //COMANDO DO SEELECT GERAL
                $stmt = $pdo->PREPARE($com); //PREPARANDO O COMANDO, COMO SE TIVESSE ESCRITO NA QUERY
                $stmt->bindParam(':cod', $cod);
                $stmt->EXECUTE(); //EXECUTANDO O COMANDO
                $rows = $stmt->rowCount(); //CONTANDO LINHAS AFETADAS
                if($rows>0){
                    return $stmt->fetch(); // trazendo as informações do banco em forma de matriz
                }else{
                    return false;
                }
            }
    
            public static function delete($cod) {
                $pdo = Conexao::conexao(); 
                $com = "DELETE FROM tbadm WHERE codAdm = :cod";
                $stmt = $pdo->PREPARE($com);
                $stmt->bindParam(':cod',$cod);
                $stmt->EXECUTE();
                $rows = $stmt->rowCount();
                if($rows>0) {
                    return true;
                } else {
                    return false;
                }
            }
}



?>