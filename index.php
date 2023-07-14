<?php

// Inicia a sessão
session_start();

// Verifica se o usuário está logado
// if (!isset($_SESSION['user_id'])) {
//     // Redireciona para a página inicial caso não esteja logado
//     header('Location: index.php');
//     exit;
// }

// Obtém o nome do usuário da sessão
$nome = '';
if (isset($_SESSION['user_id'])) {
    $nome = $_SESSION['nome'];
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <?php include_once "view/dependencias.php"; ?>
</head>

<body>
  <?php include_once "view/menu.php"; ?>

  <div class="container mt-5">
    <?php if ($nome) : ?>
    <h1>Bem-vindo, <?php echo $nome; ?>!</h1>
    <?php endif ?>
    <p>Seja bem-vindo ao Sistema Web Pessoal.</p>
  </div>

</body>

</html>