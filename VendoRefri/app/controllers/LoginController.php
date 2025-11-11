<?php
// app/controllers/LoginController.php
require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../models/Usuario.php';

session_start();

$conn = Database::getInstance();
$usuarioModel = new Usuario($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['usuario'] ?? '';
    $pass = $_POST['senha'] ?? '';

    $row = $usuarioModel->autenticar($user, $pass);

    if ($row) {
        $_SESSION['user'] = [
            'id'      => $row['id'],
            'usuario' => $row['usuario'],
            'tipo'    => $row['tipo']
        ];
        header('Location: ../public/index.php?route=admin/dashboard');
        exit;
    } else {
        $error = 'Usuário ou senha inválidos';
    }
}

require __DIR__ . '/../../views/cliente/login.php';
    