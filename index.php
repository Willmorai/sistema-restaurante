<?php
require_once 'Produto.php';
require_once 'Cliente.php';
require_once 'Garcom.php';
require_once 'Mesa.php';
require_once 'Pedido.php';

$cliente = new Cliente("Lucas", "99999-9999");
$garcom = new Garcom(1, "Carlos");
$mesa = new Mesa(10, 5);

$pedido = new Pedido($cliente, $garcom, $mesa, "2026-05-05", "12:30");

$pedido->addProduto(new Produto("Carbonara", 50.0));
$pedido->addProduto(new Produto("Refrigerante", 8.0));
$pedido->addProduto(new Produto("Petit gâteau", 15.0));

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pedido Restaurante</title>
</head>
<body>

<h1> Detalhes do Pedido</h1>

<h2>Cliente</h2>
<p>Nome: <?= $pedido->getCliente()->getNome(); ?></p>
<p>Telefone: <?= $pedido->getCliente()->getTelefone(); ?></p>

<h2>Garçom</h2>
<p>ID: <?= $pedido->getGarcom()->getIdGarcom(); ?></p>
<p>Nome: <?= $pedido->getGarcom()->getNome(); ?></p>

<h2>Mesa</h2>
<p>ID: <?= $pedido->getMesa()->getIdMesa(); ?></p>
<p>Número: <?= $pedido->getMesa()->getNumero(); ?></p>

<h2>Data e Hora</h2>
<p>Data: <?= $pedido->getData(); ?></p>
<p>Hora: <?= $pedido->getHora(); ?></p>

<h2>Produtos</h2>
<ul>
<?php
$total = 0;
foreach ($pedido->getProdutos() as $produto) {
    echo "<li>" . $produto->getNome() . " - R$ " . number_format($produto->getPreco(), 2, ',', '.') . "</li>";
    $total += $produto->getPreco();
}
?>
</ul>

<h2>Total: R$ <?= number_format($total, 2, ',', '.'); ?></h2>

</body>
</html>