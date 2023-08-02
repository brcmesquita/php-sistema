<?php
require 'config.php';
require 'sanitizer.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obtém os valores do formulário e os limpa/sanitiza
  $nome = Sanitizer::limpar_dado($_POST["nome"]);
  $telefone = Sanitizer::limpar_dado($_POST["telefone"]);
  $email = Sanitizer::limpar_dado($_POST["email"]);
  $cpf = Sanitizer::limpar_dado($_POST["cpf"]);
  $cnpj = Sanitizer::limpar_dado($_POST["cnpj"]);
  $endereco = Sanitizer::limpar_dado($_POST["endereco"]);
  $numero = Sanitizer::limpar_dado($_POST["numero"]);
  $complemento = Sanitizer::limpar_dado($_POST["complemento"]);
  $bairro = Sanitizer::limpar_dado($_POST["bairro"]);
  $cidade = Sanitizer::limpar_dado($_POST["cidade"]);
  $estado = Sanitizer::limpar_dado($_POST["estado"]);
  $banco = Sanitizer::limpar_dado($_POST["banco"]);
  $agencia = Sanitizer::limpar_dado($_POST["agencia"]);
  $tipo_conta = Sanitizer::limpar_dado($_POST["tipo_conta"]);
  $conta = Sanitizer::limpar_dado($_POST["conta"]);
  $chavepix1 = Sanitizer::limpar_dado($_POST["chavepix1"]);
  $chavepix2 = Sanitizer::limpar_dado($_POST["chavepix2"]);

  try {
    $sql = "INSERT INTO terapeutas (nome, telefone, email, cpf, cnpj, cep, endereco, numero, complemento, bairro, cidade, estado, banco, agencia, tipo_conta, conta, chavepix1, chavepix2)
        VALUES (:nome, :telefone, :email, :cpf, :cnpj, :cep, :endereco, :numero, :complemento, :bairro, :cidade, :estado, :banco, :agencia, :tipo_conta, :conta, :chavepix1, :chavepix2)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':cnpj', $cnpj);
    $stmt->bindParam(':cep', $cep);
    $stmt->bindParam(':endereco', $endereco);
    $stmt->bindParam(':numero', $numero);
    $stmt->bindParam(':complemento', $complemento);
    $stmt->bindParam(':bairro', $bairro);
    $stmt->bindParam(':cidade', $cidade);
    $stmt->bindParam(':estado', $estado);
    $stmt->bindParam(':banco', $banco);
    $stmt->bindParam(':agencia', $agencia);
    $stmt->bindParam(':tipo_conta', $tipo_conta);
    $stmt->bindParam(':conta', $conta);
    $stmt->bindParam(':chavepix1', $chavepix1);
    $stmt->bindParam(':chavepix2', $chavepix2);
    $stmt->execute();

    echo "Terapeuta cadastrado com sucesso!";
  } catch (PDOException $e) {
    echo "Erro ao cadastrar terapeuta: " . $e->getMessage();
  }
}
?>