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
    $cep = Sanitizer::limpar_dado($_POST["cep"]);

    try {
        $sql = "INSERT INTO responsaveis (nome, telefone, email, cpf, cnpj, endereco, numero, complemento, bairro, cidade, estado, cep)
        VALUES (:nome, :telefone, :email, :cpf, :cnpj, :endereco, :numero, :complemento, :bairro, :cidade, :estado, :cep)";
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
        $stmt->execute();

        echo "Responsável cadastrado com sucesso!";
        header('Location: index.php');
    } catch (PDOException $e) {
        echo "Erro ao cadastrar responsável: " . $e->getMessage();
    }
}