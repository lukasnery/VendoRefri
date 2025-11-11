<?php
// app/models/Cliente.php
class Cliente {
private $pdo;
public function __construct($pdo) { $this->pdo = $pdo; }


public function inserir($dados) {
$sql = "INSERT INTO clientes (nome,email,senha,telefone) VALUES (?,?,?,?)";
$stmt = $this->pdo->prepare($sql);
return $stmt->execute([$dados['nome'],$dados['email'],password_hash($dados['senha'], PASSWORD_DEFAULT),$dados['telefone']]);
}


public function buscarPorEmail($email) {
$stmt = $this->pdo->prepare("SELECT * FROM clientes WHERE email = ?");
$stmt->execute([$email]);
return $stmt->fetch();
}
}