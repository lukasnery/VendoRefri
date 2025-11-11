<?php
// app/controllers/PedidoController.php
require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../models/Pedido.php';

session_start();

$conn = Database::getInstance();
$pedidoModel = new Pedido($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // cliente deve estar logado
    if (!isset($_SESSION['cliente_id'])) {
        header('Location: ../public/index.php?route=cliente/login');
        exit;
    }

    $cliente_id = $_SESSION['cliente_id'];
    $cart = $_SESSION['cart'] ?? [];
    if (empty($cart)) {
        die('Carrinho vazio');
    }

    // montar itens
    $itens = [];
    $total = 0;
    foreach ($cart as $item) {
        $itens[] = [
            'id'    => $item['id'],
            'nome'  => $item['nome'],
            'qtd'   => $item['qtd'],
            'preco' => $item['preco']
        ];
        $total += $item['preco'] * $item['qtd'];
    }

    try {
        $pedido_id = $pedidoModel->criar($cliente_id, $itens, $total);
        unset($_SESSION['cart']);
        header('Location: ../public/index.php?route=pedido/success&id=' . $pedido_id);
        exit;
    } catch (Exception $e) {
        die('Erro ao criar pedido: ' . $e->getMessage());
    }
}
