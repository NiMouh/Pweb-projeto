<?php
// include header.php
include("header.php");

// echo container div with margin-top of 100px
echo '<div class="container" style="margin-top:100px;">';

// declares number of questions and sets it to 16
$num_questions = 16;


/* DECLARAR UM ARRAY BI-DIMENSIONAL ONDE VOU BUSCAR O TITULO E O TÓPICO DO QUIZ E DEPOIS PRINTA-LO NO CARD */

// for loop to create a table with 16 questions
for ($i = 0; $i < $num_questions; $i++) {
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
                    <h5 class="card-title">Escrever aqui titulo</h5>
                    <p class="card-text">Escrever aqui descrição</p>
                    <a href="play.php" class="btn btn-primary">Jogar</a>
                    <a href="#" class="btn btn-secondary">Pontuações</a>
                </div>
          </div>';

    // close column div
    echo '</div>';
}

// Close last colum div
echo '</div>';

// row to a white-box div
echo '<div class="row white-box"></div>';


// close container div
echo '</div>';


// include footer.php
include("footer.php");