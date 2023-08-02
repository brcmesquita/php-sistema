<!DOCTYPE html>
<html lang="pt-BR">

<?php include_once 'dependencias.php'; ?>

<title>Cadastro de Sessão</title>

<body>
  <?php include_once 'menu.php'; ?>

  <div class="container mt-4">
    <h1>Cadastro de Sessão</h1>
    <form action="salvar_sessao.php" method="post">
      <div class="form-group">
        <label for="paciente_id">Paciente:</label>
        <select class="form-control" id="paciente_id" name="paciente_id" required>
          <option value="" disabled selected>Selecione um paciente</option>
          <!-- Opções de pacientes podem ser populadas dinamicamente aqui -->
          <?php
          require 'config.php';
          $stmt = $conn->query("SELECT id, nome FROM pacientes");
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<option value="' . $row['id'] . '">' . $row['nome'] . '</option>';
          }
          ?>
        </select>
      </div>

      <div class="form-group">
        <label for="terapeuta_id">Terapeuta:</label>
        <select class="form-control" id="terapeuta_id" name="terapeuta_id" required>
          <option value="" disabled selected>Selecione um terapeuta</option>
          <!-- Opções de terapeutas podem ser populadas dinamicamente aqui -->
          <?php
          $stmt = $conn->query("SELECT id, nome FROM terapeutas");
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<option value="' . $row['id'] . '">' . $row['nome'] . '</option>';
          }
          ?>
        </select>
      </div>

      <div class="form-group">
        <label for="data_hora">Data e Hora:</label>
        <input type="datetime-local" class="form-control" id="data_hora" name="data_hora" required>
      </div>
      <div class="form-group">
        <label for="tipo_atendimento">Tipo de Atendimento:</label>
        <input type="text" class="form-control" id="tipo_atendimento" name="tipo_atendimento" required>
      </div>
      <div class="form-group">
        <label for="prontuario">Prontuário:</label>
        <textarea name="prontuario" class="form-control" id="prontuario"></textarea>
      </div>
      <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" role="switch" name="realizado" id="realizado" value="1">
        <label class="form-check-label" for="realizado">Atendimento Realizado:</label>
      </div>
      <button type="submit" class="btn btn-primary mt-3">Salvar</button>
    </form>
  </div>

  <?php include_once 'footer.php'; ?>
</body>

</html>