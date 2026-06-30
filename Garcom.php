<?php

class Garcom
{
    private int $idGarcom;
    private string $nome;

    public function __construct(int $idGarcom, string $nome)
    {
        $this->idGarcom = $idGarcom;
        $this->nome = $nome;
    }

    public function getIdGarcom(): int
    {
        return $this->idGarcom;
    }

    public function setIdGarcom(int $idGarcom): void
    {
        $this->idGarcom = $idGarcom;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }
}

