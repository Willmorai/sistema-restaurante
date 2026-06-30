<?php

require_once 'Pagamento.php';

class PagamentoDinheiro implements Pagamento
{
    public function calcularPagamento(float $valor): float
    {
        // Sem desconto
        return $valor;
    }

    public function getTipo(): string
    {
        return "Dinheiro";
    }
}