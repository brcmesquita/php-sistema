<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $paciente_id = $_POST["paciente_id"];
    $terapeuta = $_POST["terapeuta"];
    $data_hora = $_POST["data_hora"];
    $tipo_atendimento = $_POST["tipo_atendimento"];
    $prontuario = $_POST["prontuario"];
    $realizado = isset($_POST["realizado"]) ? 1 : 0;

    try {
        $stmt = $conn->prepare("INSERT INTO sessoes (paciente_id, terapeuta, data_hora, tipo_atendimento, prontuario, realizado) VALUES (:paciente_id, :terapeuta, :data_hora, :tipo_atendimento, :prontuario, :realizado)");
        $stmt->bindParam(':paciente_id', $paciente_id);
        $stmt->bindParam(':terapeuta', $terapeuta);
        $stmt->bindParam(':data_hora', $data_hora);
        $stmt->bindParam(':tipo_atendimento', $tipo_atendimento);
        $stmt->bindParam(':prontuario', $prontuario);
        $stmt->bindParam(':realizado', $realizado);
        $stmt->execute();

        echo "Sessão cadastrada com sucesso!";
    } catch(PDOException $e) {
        echo "Erro ao cadastrar sessão: " . $e->getMessage();
    }
}
?>