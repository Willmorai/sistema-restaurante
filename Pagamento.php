<?php

interface Pagamento
{
    public function calcularPagamento(float $valor): float;

    public function getTipo(): string;
}
