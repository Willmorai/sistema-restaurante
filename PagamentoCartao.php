<?php

require_once 'Pagamento.php';

class PagamentoCartao implements Pagamento
{
    public function calcularPagamento(float $valor): float
    {
        // Sem acréscimo
        return $valor;
    }

    public function getTipo(): string
    {
        return "Cartão";
    }
}