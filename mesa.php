<?php
class Mesa {
    private $id_mesa;
    private $numero;

    public function __construct($id_mesa, $numero) {
        $this->id_mesa = $id_mesa;
        $this->numero = $numero;
    }

    public function getIdMesa() {
        return $this->id_mesa;
    }

    public function setIdMesa($id) {
        $this->id_mesa = $id;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }
}