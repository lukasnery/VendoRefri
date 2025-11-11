<?php include __DIR__ . '/../layout/header.php'; ?>
<h2>Dashboard - Painel Administrativo</h2>
<div class="dash-cards">
  <div class="card">Produtos: <?= $totalProdutos ?></div>
  <div class="card">Clientes: <?= $totalClientes ?></div>
  <div class="card">Pedidos: <?= $totalPedidos ?></div>
  <div class="card">Faturamento: R$ <?= number_format($faturamento, 2, ',', '.') ?></div>
</div>

<canvas id="chartVendas"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('chartVendas');
new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai'],
    datasets: [{ label: 'Faturamento', data: [1200,2300,1800,2900,3100] }]
  }
});
</script>
<?php include __DIR__ . '/../layout/footer.php'; ?>
