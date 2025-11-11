<?php
require_once __DIR__ . '/../app/config/database.php';


// roteamento simples via parâmetro ?route=
$route = $_GET['route'] ?? 'produtos';

switch ($route) {
    case 'produtos':
    case 'produtos/index':
        require __DIR__ . '/../app/controllers/ProdutoController.php';
        break;

    case 'produtos/create':
        $_GET['action'] = 'create';
        require __DIR__ . '/../app/controllers/ProdutoController.php';
        break;

    case 'produtos/edit':
        $_GET['action'] = 'edit';
        require __DIR__ . '/../app/controllers/ProdutoController.php';
        break;

    case 'produtos/delete':
        $_GET['action'] = 'delete';
        require __DIR__ . '/../app/controllers/ProdutoController.php';
        break;

    case 'admin/dashboard':
        require __DIR__ . '/../views/admin/dashboard.php';
        break;

    case 'cliente/login':
        require __DIR__ . '/../app/controllers/LoginController.php';
        break;

    case 'pedido':
    case 'pedido/adicionar':
        require __DIR__ . '/../app/controllers/PedidoController.php';
        break;

    default:
        echo "<h2>404 - Página não encontrada</h2>";
        break;
}
