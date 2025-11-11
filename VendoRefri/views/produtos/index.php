<?php include __DIR__ . '/../layout/header.php'; ?>

<h2>Produtos em Destaque</h2>
<div class="produtos-grid">
<?php foreach ($produtos as $p): ?>
    <div class="produto">
        <img src="/VendoRefri/public/img/<?= htmlspecialchars($p['imagem'] ?? 'semfoto.png') ?>" alt="">
        <h3><?= htmlspecialchars($p['nome']) ?></h3>
        <p><?= htmlspecialchars($p['descricao']) ?></p>
        <strong>R$ <?= number_format($p['preco'], 2, ',', '.') ?></strong>
        <form method="post" action="/VendoRefri/public/index.php?route=pedido/adicionar">
            <input type="hidden" name="produto_id" value="<?= $p['id'] ?>">
            <button type="submit">Adicionar ao Carrinho</button>
        </form>
    </div>
<?php endforeach; ?>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
