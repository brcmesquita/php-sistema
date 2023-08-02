<?php

session_start();

include_once '../../database/Conexao.class.php';
include_once '../model/Manager.class.php';

$manager = new Manager();

?>
<!DOCTYPE html>
<html>

<head>
  <?php include_once '../../view/dependencias.php'; ?>
</head>

<body>
  <?php include_once "../../view/menu.php"; ?>

  <div class="container">

    <h2 class="text-center">
      List of Clients <i class="fa fa-list"></i>
    </h2>

    <h5 class="text-right">
      <a href="view/page_register.php" class="btn btn-primary btn-xs">
        <i class="fa fa-user-plus"></i>
      </a>
    </h5>

    <div class="table-responsive">
      <table class="table table-hover">
        <thead class="thead">
          <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>E-MAIL</th>
            <th>NÍVEL</TH>
            <th colspan="3">AÇÕES</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($manager->listClient("usuarios") as $user) : ?>
          <tr>
            <td><?php echo $user['id']; ?></td>
            <td><?php echo $user['nome']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td><?php echo $user['nivel']; ?></td>
            <td>
              <form method="POST" action="view/page_update.php">

                <input type="hidden" name="id" value="<?=$user['id']?>">

                <button class="btn btn-warning btn-xs">
                  <i class="fa fa-user-edit"></i>
                </button>

              </form>
            </td>
            <td>
              <form method="POST" action="controller/delete_client.php"
                onclick="return confirm('Você tem certeza que deseja excluir ?');">

                <input type="hidden" name="id" value="<?=$user['id']?>">

                <button class="btn btn-danger btn-xs">
                  <i class="fa fa-trash"></i>
                </button>

              </form>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

  </div>

</body>

</html>