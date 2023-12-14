<?php

class Reserva{
    private $cod;
    private $qtdHoras;
    private $dataHora;
    private $valorTotal;
    private $status;
    private $codQuarto;
    private $codCliente;

    public function setCod($cod){
        $this->cod = $cod;
    } 
    public function getCod(){
        return $this->cod;
    } 
    public function setQtdHoras($qtdHoras){
        $this->qtdHoras = $qtdHoras;
    } 
    public function getQtdHoras(){
        return $this->qtdHoras; 
    }
    public function setDataHora($dataHora){
        $this->dataHora = $dataHora;
    } 
    public function getDataHora(){
        return $this->dataHora;
    } 
    public function setValorTotal($valorTotal){
        $this->valorTotal = $valorTotal;
    } 
    public function getValorTotal(){
        return $this->valorTotal;
    } 
    public function setStatus($status){
        $this->status = $status;
    } 
    public function getStatus(){
        return $this->status;
    } 
    public function setCodQuarto($codQuarto){
        $this->codQuarto = $codQuarto;
    } 
    public function getCodQuarto(){
        return $this->codQuarto;
    } 
    public function setCodCliente($codCliente){
        $this->codCliente = $codCliente;
    } 
    public function getCodCliente(){
        return $this->codCliente;
    }

}

?>