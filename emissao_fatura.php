<!DOCTYPE html>
<html lang="pt-BR">

<?php include_once 'dependencias.php'; ?>

<title>Emissão de Fatura</title>

<body>
  <?php include_once 'menu.php'; ?>

  <h1>Emissão de Fatura</h1>
  <form action="gerar_fatura.php" method="post">
    <label for="responsavel_id">Responsável:</label>
    <select name="responsavel_id" required>
      <?php
            require 'config.php';
            $stmt = $conn->query("SELECT id, nome FROM responsaveis");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<option value="' . $row['id'] . '">' . $row['nome'] . '</option>';
            }
            ?>
    </select>
    <br>
    <label for="mes">Mês (MM/YYYY):</label>
    <input type="month" name="mes" required>
    <br>
    <input type="submit" value="Gerar Fatura">
  </form>

  <?php include_once 'footer.php'; ?>
</body>

</html>