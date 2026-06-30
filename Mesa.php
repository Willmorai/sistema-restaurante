<?php

class Mesa
{
    private int $idMesa;
    private int $numero;

    public function __construct(int $idMesa, int $numero)
    {
        $this->idMesa = $idMesa;
        $this->numero = $numero;
    }

    public function getIdMesa(): int
    {
        return $this->idMesa;
    }

    public function setIdMesa(int $idMesa): void
    {
        $this->idMesa = $idMesa;
    }

    public function getNumero(): int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): void
    {
        $this->numero = $numero;
    }
}