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
    $email = $_POST['email'];
    $senha = $_POST['senha'];
// Consulta o banco de dados para verificar o usuário
    $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch();
// Verifica se o usuário existe e a senha está correta
    if ($user && password_verify($senha, $user['senha'])) {
// Inicia a sessão
        session_start();
// Salva os dados do usuário na sessão
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['nome'] = $user['nome'];
// Redireciona para a página de dashboard (ou qualquer outra página desejada)
        header('Location: ../index.php');
        exit;
    } else {
    // Exibe uma mensagem de erro se o login falhar
        echo 'E-mail ou senha inválidos.';
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

    <!-- Login form -->
    <form method="POST">

      <h1 class="text-center mb-4 mt-4">Login</h1>

      <!-- Email input -->
      <div class="form-outline mb-4">
        <label class="form-label" for="email">Email:</label>
        <input type="email" id="email" name="email" class="form-control" />
      </div>

      <!-- Password input -->
      <div class="form-outline mb-4">
        <label class="form-label" for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" class="form-control" />
      </div>

      <!-- 2 column grid layout -->
      <div class="row mb-4">
        <div class="col-md-6 d-flex justify-content-center">
          <!-- Checkbox -->
          <div class="form-check mb-3 mb-md-0">
            <input class="form-check-input" type="checkbox" value="" id="lembrar-me" name="lembrar-me" />
            <label class="form-check-label" for="lembrar-me"> Lembrar-me</label>
          </div>
        </div>

        <div class="col-md-6 d-flex justify-content-center">
          <!-- Simple link -->
          <a href="#!">Esqueceu a senha?</a>
        </div>
      </div>

      <!-- Submit button -->
      <div class="d-grid gap-2 col-6 mx-auto">
        <button type="submit" class="btn btn-primary">Entrar</button>
      </div>

      <!-- Register buttons -->
      <div class="text-center mt-4">
        <p>Não possui uma conta? <a href="cadastro.php">Criar conta</a></p>
        <div class="text-center mb-3">
          <p>Continuar com: <span class="badge bg-info">Em breve</span></p>
          <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-facebook-f"></i>
          </button>

          <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-google"></i>
          </button>

          <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-twitter"></i>
          </button>

          <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-github"></i>
          </button>
        </div>
      </div>
    </form>
  </div>
</body>

</html>