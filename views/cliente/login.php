<?php include __DIR__ . '/../layout/header.php'; ?>
<h2>Login de Cliente</h2>

<form method="post" action="/VendoRefri/public/index.php?route=login/entrar">
    <label>Usuário: <input type="text" name="usuario" required></label><br>
    <label>Senha: <input type="password" name="senha" required></label><br>
    <button type="submit">Entrar</button>
</form>

<?php include __DIR__ . '/../layout/footer.php'; ?>
