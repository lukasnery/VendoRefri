<?php include __DIR__ . '/../layout/header.php'; ?>
<h2>Cadastro de Cliente</h2>

<form method="post">
    <label>Nome: <input type="text" name="nome" required></label><br>
    <label>Email: <input type="email" name="email" required></label><br>
    <label>Senha: <input type="password" name="senha" required></label><br>
    <label>Telefone: <input type="text" name="telefone"></label><br>
    <button type="submit">Cadastrar</button>
</form>

<?php include __DIR__ . '/../layout/footer.php'; ?>
