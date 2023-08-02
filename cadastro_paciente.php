<!DOCTYPE html>
<html lang="pt-BR">

<?php include_once 'dependencias.php'; ?>

<title>Cadastro de Paciente</title>

<body>
  <?php include_once 'menu.php'; ?>
  <div class="container mt-4">
    <h1>Cadastro de Paciente</h1>
    <form action="salvar_paciente.php" method="post">
      <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" class="form-control" id="nome" name="nome" required>
      </div>
      <div class="form-group">
        <label for="data_nascimento">Data Nascimento:</label>
        <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
      </div>
      <div class="form-group">
        <label for="responsavel_id">Responsável:</label>
        <select class="form-control" id="responsavel_id" name="responsavel_id" required>
          <option value="" disabled selected>Selecione um responsável</option>
          <?php
            require 'config.php';
            $stmt = $conn->query("SELECT id, nome FROM responsaveis");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<option value="' . $row['id'] . '">' . $row['nome'] . '</option>';
            }
            ?>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
  </div>

  <?php include_once 'footer.php'; ?>
</body>

</html>