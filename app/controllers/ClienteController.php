<?php
// app/controllers/ClienteController.php
require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../models/Cliente.php';

session_start();

$conn = Database::getInstance();
$clienteModel = new Cliente($conn);

$action = $_GET['action'] ?? 'login';

switch ($action) {
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $senha = $_POST['senha'] ?? '';
            $cliente = $clienteModel->autenticar($email, $senha);

            if ($cliente) {
                $_SESSION['cliente_id'] = $cliente['id'];
                $_SESSION['cliente_nome'] = $cliente['nome'];
                header('Location: ../public/index.php?route=produtos');
                exit;
            } else {
                $error = 'Email ou senha inválidos';
            }
        }
        require __DIR__ . '/../../views/cliente/login.php';
        break;

    case 'logout':
        session_destroy();
        header('Location: ../public/index.php');
        exit;

    case 'register':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'nome'  => $_POST['nome'],
                'email' => $_POST['email'],
                'senha' => $_POST['senha']
            ];
            $clienteModel->inserir($dados);
            header('Location: ../public/index.php?route=cliente/login');
            exit;
        }
        require __DIR__ . '/../../views/cliente/register.php';
        break;
}
