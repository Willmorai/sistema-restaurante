<?php
class Garcom {
    private $id_garcom;
    private $nome;

    public function __construct($id_garcom, $nome) {
        $this->id_garcom = $id_garcom;
        $this->nome = $nome;
    }

    public function getIdGarcom() {
        return $this->id_garcom;
    }

    public function setIdGarcom($id) {
        $this->id_garcom = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }
}