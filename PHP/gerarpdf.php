<?php session_start();

if (isset($_POST['pontuacoes'])) {
    // Get the quiz id
    $quiz_id = $_POST['pontuacoes'];

    // Get the url request
    $url = "http://localhost:8000/quiz_scores?IDQuiz=" . $quiz_id;
    $response = json_decode(file_get_contents($url), true);


    ob_start();
    // declare FPDF class
    require_once('fpdf/fpdf.php');

    // declare FPDF object
    $pdf = new FPDF();

    // Transfer $response to a table and print it on the pdf
    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(40, 10, 'Pontuacoes');
    $pdf->Ln();
    $pdf->Cell(40, 10, 'IDLogin');
    $pdf->Cell(40, 10, 'IDQuiz');
    $pdf->Cell(40, 10, 'Pontos');
    $pdf->Ln();
    foreach ($response as $pontuacao) {
        $pdf->Cell(40, 10, $pontuacao['IDLogin']);
        $pdf->Cell(40, 10, $pontuacao['IDQuiz']);
        $pdf->Cell(40, 10, $pontuacao['pontos']);
        $pdf->Ln();
    }
    // Output the pdf
    $pdf->Output();

    ob_end_flush();
}
