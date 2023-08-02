<?php
require 'config.php';
require 'sanitizer.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = Sanitizer::limpar_dado($_POST["nome"]);
    $data_nascimento = Sanitizer::limpar_dado($_POST["data_nascimento"]);
    $responsavel_id = Sanitizer::limpar_dado($_POST["responsavel_id"]);

    try {
        $stmt = $conn->prepare("INSERT INTO pacientes (nome, data_nascimento, responsavel_id) VALUES (:nome, :data_nascimento, :responsavel_id)");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':data_nascimento', $data_nascimento);
        $stmt->bindParam(':responsavel_id', $responsavel_id);
        $stmt->execute();

        echo "Paciente cadastrado com sucesso!";
        header('Location: index.php');
    } catch (PDOException $e) {
        echo "Erro ao cadastrar paciente: " . $e->getMessage();
    }
}
?>