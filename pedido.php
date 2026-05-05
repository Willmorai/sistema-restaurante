<?php
class Pedido {
    private $cliente;
    private $garcom;
    private $mesa;
    private $data;
    private $hora;
    private $produtos = [];

    public function __construct($cliente, $garcom, $mesa, $data, $hora) {
        $this->cliente = $cliente;
        $this->garcom = $garcom;
        $this->mesa = $mesa;
        $this->data = $data;
        $this->hora = $hora;
    }

    public function addProduto(Produto $produto) {
        $this->produtos[] = $produto;
    }

    public function getProdutos() {
        return $this->produtos;
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function getGarcom() {
        return $this->garcom;
    }

    public function getMesa() {
        return $this->mesa;
    }

    public function getData() {
        return $this->data;
    }

    public function getHora() {
        return $this->hora;
    }
}