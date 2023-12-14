<?php
class Categoria {
    public $codCategoria;
    public $nomeCategoria;
    public $itensCategoria;
    public $valorHoraCategoria;

    public function getCodCategoria() {
        return $this->codCategoria;
    }
    public function getNomeCategoria() {
        return $this->nomeCategoria;
    }
    public function getItensCategoria() {
        return $this->itensCategoria;
    }
    public function getValorHoraCategoria() {
        return $this->valorHoraCategoria;
    }

    public function setCodCategoria($codCategoria) {
        $this->codCategoria = $codCategoria;
    }
    public function setNomeCategoria($nomeCategoria) {
        $this->nomeCategoria = $nomeCategoria;
    }
    public function setItensCategoria($itensCategoria) {
        $this->itensCategoria = $itensCategoria;
    }
    public function setValorHoraCategoria($valorHoraCategoria) {
        $this->valorHoraCategoria = $valorHoraCategoria;
    }

}



?>