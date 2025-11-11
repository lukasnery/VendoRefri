<?php include __DIR__ . '/../layout/header.php'; ?>

<h2>Seu Carrinho</h2>
<?php if (empty($carrinho)): ?>
    <p>O carrinho está vazio.</p>
<?php else: ?>
<table>
    <tr><th>Produto</th><th>Qtd</th><th>Preço</th><th>Total</th></tr>
    <?php $total=0; foreach ($carrinho as $item): 
        $subtotal = $item['preco'] * $item['quantidade'];
        $total += $subtotal;
    ?>
    <tr>
        <td><?= htmlspecialchars($item['nome']) ?></td>
        <td><?= $item['quantidade'] ?></td>
        <td>R$ <?= number_format($item['preco'],2,',','.') ?></td>
        <td>R$ <?= number_format($subtotal,2,',','.') ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<p><strong>Total: R$ <?= number_format($total,2,',','.') ?></strong></p>
<form method="post" action="/VendoRefri/public/index.php?route=pedido/finalizar">
    <button type="submit">Finalizar Pedido</button>
</form>
<?php endif; ?>

<?php include __DIR__ . '/../layout/footer.php'; ?>
