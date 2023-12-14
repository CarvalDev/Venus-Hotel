<?php
class Conexao{
    public $pdo;

    public static function conexao(){
        try{
        $pdo = new PDO('mysql:host=localhost;dbname=dbhotel', 'root', '');
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    return $pdo;
    }
}

?>