<?php

class Adm {
    public $id, $nomeAdm, $emailAdm, $senhaAdm, $tokenAdm;

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id;
    }

    public function getNome() {
        return $this->nomeAdm;
    }
    public function setNome($nomeAdm) {
        $this->nomeAdm = $nomeAdm;
    }

    public function getEmail() {
        return $this->emailAdm;
    }
    public function setEmail($emailAdm) {
        $this->emailAdm = $emailAdm;
    }

    public function getSenha() {
        return $this->senhaAdm;
    }
    public function setSenha($senhaAdm) {
        $this->senhaAdm = $senhaAdm;
    }

    public function getToken() {
        return $this->tokenAdm;
    }
    public function setToken($token) {
        $this->tokenAdm = $token;
    }

    public function generateToken(){
        return bin2hex(random_bytes(16));
    }




}


?>