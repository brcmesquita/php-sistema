<?php
require 'config.php';
require 'tfpdf/tfpdf.php'; // Certifique-se de fornecer o caminho correto para a biblioteca FPDF

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $responsavel_id = $_POST["responsavel_id"];
    $mes = $_POST["mes"];
    $mes = substr($mes, 5);

    // Obter os dados do responsável
    $stmt = $conn->prepare("SELECT nome, email FROM responsaveis WHERE id = :responsavel_id");
    $stmt->bindParam(':responsavel_id', $responsavel_id);
    $stmt->execute();
    $responsavel = $stmt->fetch(PDO::FETCH_ASSOC);

    // Obter as sessões realizadas no mês para o responsável selecionado
    $stmt = $conn->prepare("SELECT pacientes.nome AS paciente, data_hora, tipo_atendimento FROM sessoes INNER JOIN pacientes ON sessoes.paciente_id = pacientes.id WHERE paciente_id IN (SELECT id FROM pacientes WHERE responsavel_id = :responsavel_id) AND MONTH(data_hora) = :mes");
    $stmt->bindParam(':responsavel_id', $responsavel_id);
    $stmt->bindParam(':mes', $mes);
    $stmt->execute();
    $sessoes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Gerar o PDF da fatura
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'Fatura - ' . $mes, 0, 1, 'C');
    $pdf->Cell(0, 10, 'Responsável: ' . $responsavel['nome'], 0, 1, 'C');
    $pdf->Cell(0, 10, 'E-mail: ' . $responsavel['email'], 0, 1, 'C');
    $pdf->Ln(15);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(80, 10, 'Paciente', 1);
    $pdf->Cell(60, 10, 'Data e Hora', 1);
    $pdf->Cell(50, 10, 'Tipo de Atendimento', 1);
    $pdf->Ln();

    $pdf->SetFont('Arial', '', 12);
    foreach ($sessoes as $sessao) {
        $pdf->Cell(80, 10, $sessao['paciente'], 1);
        $pdf->Cell(60, 10, $sessao['data_hora'], 1);
        $pdf->Cell(50, 10, $sessao['tipo_atendimento'], 1);
        $pdf->Ln();
    }

    // Exibir ou salvar o PDF (de acordo com a necessidade)
    $pdf->Output(); // Exibe o PDF no navegador
    // $pdf->Output('D', 'fatura.pdf'); // Para fazer o download do PDF
}
?>