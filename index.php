<?php

require_once 'Pessoa.php';
require_once 'PessoaJuridica.php';
require_once 'Garcom.php';
require_once 'Mesa.php';
require_once 'Produto.php';
require_once 'Pedido.php';
require_once 'PagamentoCartao.php';
require_once 'PagamentoDinheiro.php';

$pedido = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $cliente = new Pessoa(
        $_POST['pessoa_nome'], '734628768'
    );
    
    $pessoaJuridica = new PessoaJuridica(
        $_POST['pessoaJuridica_nome'],$_POST['CNPJ']
    );

    $garcom = new Garcom(
        (int)$_POST['garcom_id'],
        $_POST['garcom_nome']
    );

    $mesa = new Mesa(
        (int)$_POST['mesa_id'],
        (int)$_POST['mesa_numero']
    );

    if ($_POST['tipo_pagamento'] == "cartao") {
        $pagamento = new PagamentoCartao();
    } else {
        $pagamento = new PagamentoDinheiro();
    }

    $pedido = new Pedido(
        $pessoaJuridica,
        $garcom,
        $mesa,
        $_POST['data'],
        $_POST['hora'],
        $pagamento
    );

    foreach ($_POST['produtos'] as $i => $nome) {

        if ($nome != "" && is_numeric($_POST['precos'][$i])) {

            $produto = new Produto(
                $nome,
                (float)$_POST['precos'][$i]
            );

            $pedido->addProduto($produto);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Sistema Restaurante</title>
</head>
<body>

<h1>Cadastro de Pedido</h1>

<form method="POST">

<h2>Cliente</h2>

<input
type="text"
name="pessoa_nome"
placeholder="Nome do Cliente"
required>

<h2>Empresa</h2>

<input
type="text"
name="pessoaJuridica_nome"
placeholder="Nome da Empresa"
required>

<input
type="text"
name="CNPJ"
placeholder="CNPJ da Empresa"
required>

<h2>Garçom</h2>

<input
type="number"
name="garcom_id"
placeholder="ID"
required>

<input
type="text"
name="garcom_nome"
placeholder="Nome"
required>

<h2>Mesa</h2>

<input
type="number"
name="mesa_id"
placeholder="ID"
required>

<input
type="number"
name="mesa_numero"
placeholder="Número"
required>

<h2>Data</h2>

<input
type="date"
name="data"
required>

<input
type="time"
name="hora"
required>

<h2>Pagamento</h2>

<select name="tipo_pagamento">
    <option value="dinheiro">Dinheiro</option>
    <option value="cartao">Cartão</option>
</select>

<h2>Produtos</h2>

<?php for($i=0;$i<3;$i++): ?>

<input
type="text"
name="produtos[]"
placeholder="Produto">

<input
type="number"
step="0.01"
name="precos[]"
placeholder="Preço">

<br><br>

<?php endfor; ?>

<button type="submit">Cadastrar Pedido</button>

</form>

<?php if($pedido): ?>

<hr>

<h1>Pedido</h1>

<p><strong>Cliente:</strong>
<?= $pedido->getCliente()->getNome(); ?>
</p>
<p><strong>Empresa:</strong>
<?= $pedido->getCliente()->getNome(); ?>
</p>

<p><strong>Garçom:</strong>
<?= $pedido->getGarcom()->getNome(); ?>
</p>
<p><strong>ID Garçom:</strong>
<?= $pedido->getGarcom()->getIdGarcom(); ?>
</p>
<p><strong>Mesa:</strong>
<?= $pedido->getMesa()->getNumero(); ?>
</p>
<p><strong>Data:</strong>
<?= $pedido->getData(); ?>
</p>
<p><strong>Hora:</strong>
<?= $pedido->getHora(); ?>
</p>
<h2>Produtos</h2>
<ul>
<?php foreach($pedido->getProdutos() as $produto): ?>
<li>
<?= $produto->getNome(); ?>
- R$
<?= number_format($produto->getPreco(),2,',','.'); ?>
</li>
<?php endforeach; ?>
</ul>
<p>
<strong>Total:</strong>
R$ <?= number_format($pedido->getTotal(),2,',','.'); ?>
</p>
<p>
<strong>Forma de Pagamento:</strong>
<?= $pedido->getPagamento()->getTipo(); ?>
</p>
<p>
<strong>Valor Final:</strong>
R$ <?= number_format($pedido->getValorFinal(),2,',','.'); ?>
</p>
<?php endif; ?>
</body>
</html>