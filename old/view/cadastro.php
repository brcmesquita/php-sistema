<?php

// Configuração do banco de dados
$host = 'localhost';
$db   = 'php_sistema_web';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
// Configuração da conexão PDO
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Verifica se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// Obtém os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
// Verifica se o email já está cadastrado
    $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    if ($user) {
    // Exibe uma mensagem de erro se o email já estiver cadastrado
        echo 'Este email já está cadastrado.';
    } else {
    // Insere o novo usuário no banco de dados
        $stmt = $pdo->prepare('INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)');
        $stmt->execute([$nome, $email, password_hash($senha, PASSWORD_DEFAULT)]);
    // Redireciona para a página de login (ou qualquer outra página desejada)
        header('Location: /view/login.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
  <?php include_once "dependencias.php"; ?>
  <style>
  form {
    width: 450px;
  }
  </style>
</head>

<body>

  <?php include_once "menu.php"; ?>

  <div class="container d-flex justify-content-center">

    <form method="POST">

      <h1 class="text-center mb-4 mt-4">Cadastro</h1>

      <div class="form-outline mb-3">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" class="form-control" id="nome" name="nome" required>
      </div>

      <div class="form-outline mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="email" required>
        <div id="email" class="form-text">Nós nunca vamos compartilhar o seu e-mail com ninguém.</div>
      </div>

      <div class="form-outline mb-4">
        <label for="senha" class="form-label">Senha: </label>
        <input type="password" class="form-control" id="senha" name="senha" required>
      </div>

      <div class="form-outline">
        <button type=" submit" class="btn btn-primary">Submit</button>
        <a href="/index.php" class="ms-3 link-primary">Voltar</a>
      </div>

    </form>

  </div>
</body>

</html>