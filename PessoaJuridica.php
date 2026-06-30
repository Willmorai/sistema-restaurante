<?php

require_once 'Pessoa.php';

class PessoaJuridica extends Pessoa
{
    private string $cnpj;

    public function __construct(string $nome, string $cnpj)
    {
        parent::__construct($nome);
        $this->cnpj = $cnpj;
    }

    public function getCNPJ(): string
    {
        return $this->cnpj;
    }

    public function setCNPJ(string $cnpj): void
    {
        $this->cnpj = $cnpj;
    }
}