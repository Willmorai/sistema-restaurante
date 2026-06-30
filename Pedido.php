<?php

require_once 'Pessoa.php';
require_once 'Garcom.php';
require_once 'Mesa.php';
require_once 'Produto.php';
require_once 'Pagamento.php';

class Pedido
{
    private Pessoa $cliente;
    private Garcom $garcom;
    private Mesa $mesa;
    private string $data;
    private string $hora;
    private array $produtos;
    private Pagamento $pagamento;

    public function __construct(
        Pessoa $cliente,
        Garcom $garcom,
        Mesa $mesa,
        string $data,
        string $hora,
        Pagamento $pagamento
    ) {
        $this->cliente = $cliente;
        $this->garcom = $garcom;
        $this->mesa = $mesa;
        $this->data = $data;
        $this->hora = $hora;
        $this->pagamento = $pagamento;
        $this->produtos = [];
    }

    public function addProduto(Produto $produto): void
    {
        $this->produtos[] = $produto;
    }
    public function getProdutos(): array
    {
        return $this->produtos;
    }
    public function getCliente(): Pessoa
    {
        return $this->cliente;
    }
    public function setCliente(Pessoa $cliente): void
    {
        $this->cliente = $cliente;
    }
    public function getGarcom(): Garcom
    {
        return $this->garcom;
    }
    public function setGarcom(Garcom $garcom): void
    {
        $this->garcom = $garcom;
    }
    public function getMesa(): Mesa
    {
        return $this->mesa;
    }
    public function setMesa(Mesa $mesa): void
    {
        $this->mesa = $mesa;
    }
    public function getData(): string
    {
        return $this->data;
    }
    public function setData(string $data): void
    {
        $this->data = $data;
    }
    public function getHora(): string
    {
        return $this->hora;
    }
    public function setHora(string $hora): void
    {
        $this->hora = $hora;
    }
    public function getPagamento(): Pagamento
    {
        return $this->pagamento;
    }
    public function setPagamento(Pagamento $pagamento): void
    {
        $this->pagamento = $pagamento;
    }
    public function getTotal(): float
    {
        $total = 0;

        foreach ($this->produtos as $produto) {
            $total += $produto->getPreco();
        }

        return $total;
    }
    public function getValorFinal(): float
    {
        return $this->pagamento->calcularPagamento($this->getTotal());
    }
}