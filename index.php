<?php
require_once 'Produto.php';
require_once 'Cliente.php';
require_once 'Garcom.php';
require_once 'Mesa.php';
require_once 'Pedido.php';

$pedido = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $cliente = new Cliente(
        $_POST['cliente_nome'] ?? '',
        $_POST['cliente_telefone'] ?? ''
    );

    $garcom = new Garcom(
        $_POST['garcom_id'] ?? 0,
        $_POST['garcom_nome'] ?? ''
    );

    $mesa = new Mesa(
        $_POST['mesa_id'] ?? 0,
        $_POST['mesa_numero'] ?? 0
    );

    $pedido = new Pedido(
        $cliente,
        $garcom,
        $mesa,
        $_POST['data'] ?? '',
        $_POST['hora'] ?? ''
    );

    if (!empty($_POST['produtos']) && !empty($_POST['precos'])) {

        foreach ($_POST['produtos'] as $i => $nome) {
            $preco = $_POST['precos'][$i] ?? null;

            if (!empty($nome) && is_numeric($preco)) {
                $pedido->addProduto(new Produto($nome, (float)$preco));
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pedido Restaurante</title>
</head>
<body>

<h1>📋 Fazer Pedido</h1>

<form method="POST">

<h2>Cliente</h2>
<input type="text" name="cliente_nome" placeholder="Nome" required><br>
<input type="text" name="cliente_telefone" placeholder="Telefone" required><br>

<h2>Garçom</h2>
<input type="number" name="garcom_id" placeholder="ID" required><br>
<input type="text" name="garcom_nome" placeholder="Nome" required><br>

<h2>Mesa</h2>
<input type="number" name="mesa_id" placeholder="ID da mesa" required><br>
<input type="number" name="mesa_numero" placeholder="Número da mesa" required><br>

<h2>Data e Hora</h2>
<input type="date" name="data" required><br>
<input type="time" name="hora" required><br>

<h2>Produtos</h2>

<input type="text" name="produtos[]" placeholder="Produto"><br>
<input type="number" step="0.01" name="precos[]" placeholder="Preço"><br><br>

<input type="text" name="produtos[]" placeholder="Produto"><br>
<input type="number" step="0.01" name="precos[]" placeholder="Preço"><br><br>

<input type="text" name="produtos[]" placeholder="Produto"><br>
<input type="number" step="0.01" name="precos[]" placeholder="Preço"><br>

<br>
<button type="submit">Enviar Pedido</button>

</form>

<hr>

<?php if ($pedido): ?>

<h1>🧾 Detalhes do Pedido</h1>

<h2>Cliente</h2>
<p>Nome: <?= htmlspecialchars($pedido->getCliente()->getNome()); ?></p>
<p>Telefone: <?= htmlspecialchars($pedido->getCliente()->getTelefone()); ?></p>

<h2>Garçom</h2>
<p>ID: <?= $pedido->getGarcom()->getIdGarcom(); ?></p>
<p>Nome: <?= htmlspecialchars($pedido->getGarcom()->getNome()); ?></p>

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

foreach ($pedido->getProdutos() as $produto):
    $total += $produto->getPreco();
?>
    <li>
        <?= htmlspecialchars($produto->getNome()); ?> - 
        R$ <?= number_format($produto->getPreco(), 2, ',', '.'); ?>
    </li>
<?php endforeach; ?>
</ul>

<h2>💰 Total: R$ <?= number_format($total, 2, ',', '.'); ?></h2>

<?php endif; ?>

</body>
</html>