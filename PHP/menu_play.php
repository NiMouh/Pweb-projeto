<?php
// include header.php
include("header.php");


// if session is not set redirect to the login page
if (!isset($_SESSION['username'])) {
    header("Location:index.php");
    exit;
} else {

    // echo container div with margin-top of 100px
    echo '<div class="container" style="margin-top:100px;">';

    // Get the url request
    $url = "http://localhost:8000/quizes";
    $response = json_decode(file_get_contents($url), true);

    // Declare $i
    $i = 0;

    // For each quiz in the response
    foreach($response as $quiz){
        // Check if $i is 1
        if ($i == 0) {
            // echo first row
            echo '<div class="row">';
        }

        // Check if $i is divisible by 4
        if ($i % 4 == 0) {
            // close the previous row
            echo '</div>';

            // echo a new row
            echo '<div class="row">';
        }

        // echo new column with margin-top of 30px
        echo '<div class="col-md-3" style="margin-top:30px;">';

        // echo card div
        echo '<div class="card">
                <div class="card-body">
                    <h5 class="card-title">'.$quiz['titulo'].'</h5>
                    <p class="card-text">'.$quiz['designacao'].'</p>
                <div class="card-buttons">
                    <button class="btn btn-primary"><a class="btn-text" href="play.php">Jogar</a></button>
                    <form action="menu_play.php" method="post">
                        <input type="hidden" name="pontuacoes" value="'.$quiz['IDQuiz'].'">
                        <button type="submit" class="btn btn-secondary">Pontuações</button>
                    </form>
                </div>
                </div>
          </div>';

        // close column div
        echo '</div>';

        // increment $i
        $i++;
    }

    // if is posted pontuacoes (incompleta)
    /*
    if (isset($_POST['pontuacoes'])) {
        // Get the quiz id
        $quiz_id = $_POST['pontuacoes'];

        // Get the url request
        $url = "http://localhost:8000/pontuacoes?IDQuiz=" . $quiz_id;
        $response = json_decode(file_get_contents($url), true);

        // declare FPDF class
        require_once('fpdf/fpdf.php');

        // declare FPDF object
        $pdf = new FPDF();

        // Transfer $response to a table and print it on the pdf
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(40, 10, 'Pontuações');
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


    }
    */

    // Close last colum div
    echo '</div>';

    // row to a white-box div
    echo '<div class="row white-box"></div>';


    // close container div
    echo '</div>';


    // include footer.php
    include("footer.php");
}