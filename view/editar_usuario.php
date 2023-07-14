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
    $id = $_POST['id'];

    // Atualiza os dados do usuário no banco de dados
    $stmt = $pdo->prepare('UPDATE usuarios SET nome = ?, email = ?, senha = ? WHERE id = ?');
    $stmt->execute([$nome, $email, password_hash($senha, PASSWORD_DEFAULT), $id]);

    // Redireciona para a página de perfil (ou qualquer outra página desejada)
    header('Location: /index.php');
    exit;
}

// Obtém os dados do usuário a ser editado do banco de dados
session_start();
$id = $_SESSION['user_id'];
$stmt = $pdo->prepare('SELECT * FROM usuarios WHERE id = ?');
$stmt->execute([$id]);
$user = $stmt->fetch();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Editar Perfil</title>
</head>
<body>
    <h1>Editar Perfil</h1>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $user['nome']; ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required><br>

        <label for="senha">Nova Senha:</label>
        <input type="password" id="senha" name="senha"><br>

        <input type="submit" value="Salvar Alterações">
        <a href="/index.php">Voltar</a>
    </form>
</body>
</html>
