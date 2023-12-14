<?php
class Cliente{
    public $codCliente, $nomeCliente, $emailCliente, $senhaCliente, $cpfCliente, $fotoDocumento, $statusCliente = "Analise";

    public function getCodCliente() {
        return $this->codCliente;
    }
    public function getNomeCliente() {
        return $this->nomeCliente;
    }
    public function getEmailCliente() {
        return $this->emailCliente;
    }
    public function getSenhaCliente() {
        return $this->senhaCliente;
    }
    public function getCpfCliente() {
        return $this->cpfCliente;
    }
    public function getFotoDocumento() {
        return $this->fotoDocumento;
    }
    public function getStatusCliente() {
        return $this->statusCliente;
    }

    public function setCodCliente($codCliente) {
        $this->codCliente = $codCliente;
    }
    public function setNomeCliente($nomeCliente) {
        $this->nomeCliente = $nomeCliente;
    }
    public function setEmailCliente($emailCliente) {
        $this->emailCliente = $emailCliente;
    }
    public function setSenhaCliente($senhaCliente) {
        $this->senhaCliente = $senhaCliente;
    }
    public function setCpfCliente($cpfCliente) {
        $this->cpfCliente = $cpfCliente;
    }
    public function setFotoDocumento($fotoDocumento) {
        $this->fotoDocumento = $fotoDocumento;
    }
    public function setStatusCliente($statusCliente) {
        $this->statusCliente = $statusCliente;
    }

    public function saveImage($uriImage){
        if(empty($_FILES['foto']['size']) != 1){
            if($uriImage==""){
                $uriImage = md5(time()).".jpg";
            }
            $diretory = '../img/docs/';
            $completeName = $diretory.$uriImage;
            move_uploaded_file($_FILES['foto']['tmp_name'], $completeName);
            return $uriImage;
        }else{
            return $uriImage;
        }
    }


}


?>