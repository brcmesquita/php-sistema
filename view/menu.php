<?php

// Inicia a sessão

// Obtém o nome do usuário da sessão
$nome = '';
if (isset($_SESSION['user_id'])) {
    $nome = $_SESSION['nome'];
}

// Adicionar regra para verificar qual página está e alterar o botão ativo

?>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
  <div class="container">
    <?php if ($nome) : ?>
    <a class="navbar-brand" href="/index.php">Sistema Web Pessoal</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
      aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/tarefas/view">Tarefas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/financeiro">Financeiro</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/os">Ordens de Serviço</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/contatos">Contatos</a>
        </li>
      </ul>
      <div class="d-flex gap-1">
        <a class="btn btn-warning" href="/view/editar_usuario.php">Perfil</a>
        <a class="btn btn-danger" href="/view/logout.php">Sair</a>
      </div>
    </div>
    <?php else : ?>
    <a class="navbar-brand" href="/index.php">Sistema Web Pessoal</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
      aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
      </ul>
      <div class="d-flex gap-1">
        <a class="btn btn-primary" href="/view/login.php">Login</a>
        <a class="btn btn-success" href="/view/cadastro.php">Cadastro</a>
      </div>
    </div>
    <?php endif ?>

  </div>
</nav>