<?php
class Quarto{
    public $codQuarto;
    public $nomeQuarto;
    public $descQuarto;
    public $fotoQuarto;
    public $codCategoriaQuarto;

    public function setCodQuarrto($codQuarto){
        $this->codQuarto = $codQuarto;
    }
    public function getCodQuarto(){
       return $this->codQuarto;
    }
    public function setNomeQuarto($nomeQuarto){
        $this->nomeQuarto = $nomeQuarto;
    }
    public function getNomeQuarto(){
        return $this->nomeQuarto;
    }
    public function setDescQuarto($descQuarto){
        $this->descQuarto = $descQuarto;
    }
    public function getDescQuarto(){
        return $this->descQuarto;
    }
    public function setfotoQuarto($fotoQuarto){
        $this->fotoQuarto = $fotoQuarto;
    }
    public function getfotoQuarto(){
        return $this->fotoQuarto;
    }
    public function getcodCategoriaQuarto(){
        return $this->codCategoriaQuarto;
    }
    public function setCodCategoriaQuarto($codCategoriaQuarto){
        $this->codCategoriaQuarto = $codCategoriaQuarto;
    }

    public function saveImage($uriImage){
        if(empty($_FILES['foto']['size']) != 1){
            if($uriImage==""){
                $uriImage = md5(time()).".jpg";
            }
            $diretory = '../../img/quartos/';
            $completeName = $diretory.$uriImage;
            move_uploaded_file($_FILES['foto']['tmp_name'], $completeName);
            return $uriImage;
        }else{
            return $uriImage;
        }
    }




}






?>