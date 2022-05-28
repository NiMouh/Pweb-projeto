<?php session_start();

echo "<head>

    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Play</title>
      
    <!-- Bootstrap CSS -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet'
          integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'
            integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo'
            crossorigin='anonymous'></script>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js'
            integrity='sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM'
            crossorigin='anonymous'></script>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js'
            integrity='sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM'
            crossorigin='anonymous'></script>
    </head>";

// Style the page
echo '<style>
        .play-background {
            background-color: rgb(0, 114, 187);
            height: 100vh;
        }

        .play-button {
            display: block;
            font-size: 25px;
            font-weight: 500;
            color: rgb(0, 114, 187);
        }

        .play-button button {
            padding: 15px 30px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),
            0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .info_box {
            display: none;
            background: white;
            border-radius: 5px;
        }

        .info_box .info_title h1 {
            font-size: 20px;
            font-weight: 600;
        }

        .info_box .info_title {
            height: 60px;
            border-bottom: 1px solid lightgray;
            display: flex;
            align-items: center;
            padding: 0 35px;
        }

        .info_box .info_list {
            padding: 15px 35px;
        }

        .info_box .info_list .info {
            margin: 5px 0;
            font-size: 15px;
        }

        .info_box .info_list .info span {
            font-weight: 600;
            color: #007bff;
        }

        .info_box .button_box {
            display: flex;
            justify-content: flex-end;
            padding: 15px 35px;
            border-top: 1px solid lightgray;
        }

        .info_box .button_box button {
            font-size: 15px;
            height: 40px;
            margin-left: 10px;
        }

        .quiz_box {
            display: none;
            background: white;
            border-radius: 5px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),
            0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .quiz_box .quiz_box_top {
            padding: 15px 35px;
            height: 70px;
            border-bottom: 1px solid lightgray;
        }

        .quiz_box .quiz_box_top h1 {
            font-size: 20px;
            font-weight: 500;
            margin: 0 100px 0 0;
        }

        .quiz_box .quiz_box_top .timer_box {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 140px;
            height: 45px;
            background: #cce5ff;
            border: 1px solid #b8daff;
            border-radius: 5px;
            padding: 0 8px;
        }

        .quiz_box .quiz_box_top .timer_box .timer_text {
            font-size: 17px;
            user-select: none;
            font-weight: 400;
        }

        .quiz_box .quiz_box_top .timer_box .timer_value {
            font-size: 16px;
            font-weight: 500;
            background: #343a40;
            color: white;
            height: 30px;
            width: 30px;
            text-align: center;
            line-height: 30px;
            border-radius: 5px;
            border: 1px solid #343a40;
        }

        .quiz_box .quiz_box_mid {
            padding: 25px 30px 20px 30px;
        }

        .quiz_box .quiz_box_mid .question_box h1 {
            font-size: 25px;
            font-weight: 600;
        }

        .hidebox {
            display: none;
        }

        .quiz_box_mid .answer_item {
            padding: 5px 0;
            display: block;
        }

        .answer_item .option {
            background: aliceblue;
            border: 1px solid #b8daff;
            border-radius: 5px;
            padding: 8px 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .answer_item .option:hover {
            color: #004085;
            background: #cce5ff;
            border-color: #cce5ff;
        }

        .answer_item input[type=radio]:checked + .option {
            background: #343a40;
            color: white;
            border-color: #343a40;
        }

        .quiz_box .quiz_box_bottom {
            height: 60px;
            padding: 0 30px;
        }

        .quiz_box .quiz_box_bottom .next-button {
            font-size: 15px;
            height: 40px;
        }

        .result_box {
            display: none;
            background: white;
            border-radius: 5px;
            text-align: center;
            padding: 30px 35px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),
            0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .result_box .icon {
            color: rgb(0, 114, 187);
            font-size: 60px;
            margin-bottom: 20px;
        }

        .result_box .result_text h1 {
            font-size: 25px;
            font-weight: 500;
        }

        .result_box .result_text p {
            margin: 15px 0;
            font-size: 16px;
        }

        .result_box .button_box {
            display: flex;
            justify-content: space-between;
        }

        .result_box .button_box .btn-primary {
            background: rgb(0, 114, 187);
            border: 1px solid rgb(0, 114, 187);
            color: white;
            font-size: 15px;
            font-weight: 500;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .result_box .button_box .btn-primary:hover {
            background: rgb(0, 94, 187);
            border: 1px solid rgb(0, 94, 187);
        }

        .result_box .button_box .btn-secondary {
            background: white;
            border: 1px solid rgb(0, 114, 187);
            color: rgb(0, 114, 187);
            font-size: 15px;
            font-weight: 500;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .result_box .button_box .btn-secondary:hover {
            background: rgb(0, 114, 187);
            border: 1px solid rgb(0, 114, 187);
            color: white;
        }
</style>';



// div for play-background
echo '<div class="play-background">';

// div for container
echo '<div class="container">';

// echo for the button
echo '<div class="d-flex justify-content-center align-items-center vh-100" id="start">
            <div class="play-button" id="play_button">
                <button type="button" class="btn btn-light btn-lg play-button">Jogar</button>
            </div>'; // onclick="hide('info_box','play_button')"

// echo for the info box
echo '<div class="info_box" id="info_box">
                <div class="info_title"><h1>Regras do Jogo</h1></div>
                <div class="info_list">
                    <div class="info">
                        1- Terá um timeout de <span>20 segundos</span>, depois a resposta é dada como
                        errada e continua o jogo.
                    </div>
                    <div class="info">
                        2- Cada pergunta terá 4 opções, onde <span>apenas uma</span> é certa.
                    </div>
                    <div class="info">
                        3- O resultado basea-se no número de respostas certas no menor espaço de tempo possível.
                    </div>
                    <div class="info">
                        4- Caso erre uma pergunta, não tem problema. O jogo continua.
                    </div>
                </div>
                <div class="button_box">
                    <button type="button" class="btn btn-secondary btn-lg">Voltar</button>
                    <button type="button" class="btn btn-primary btn-lg">Começar</button>
                </div>
      </div>';


// echo for the quiz box
echo '<div class="quiz_box" id="quiz_box">';

// Save the questions in a bidimensional array
$questions = array(
    array(
        'question' => 'Qual o nome do presidente do Brasil que foi eleito pela primeira vez em 1994?',
        'answers' => array(
            'a' => 'João Goulart',
            'b' => 'João Goulart',
            'c' => 'João Goulart',
            'd' => 'João Goulart'
        ),
        'correct' => 'a'
    ),
    array(
        'question' => 'Qual o nome do presidente do Brasil que foi eleito pela primeira vez em 1994?',
        'answers' => array(
            'a' => 'João Goulart',
            'b' => 'João Goulart',
            'c' => 'João Goulart',
            'd' => 'João Goulart'
        ),
        'correct' => 'a'
    ),
    array(
        'question' => 'Qual o nome do presidente do Brasil que foi eleito pela primeira vez em 1994?',
        'answers' => array(
            'a' => 'João Goulart',
            'b' => 'João Goulart',
            'c' => 'João Goulart',
            'd' => 'João Goulart'
        ),
        'correct' => 'a'
    ),
    array(
        'question' => 'Qual o nome do presidente do Brasil que foi eleito pela primeira vez em 1994?',
        'answers' => array(
            'a' => 'João Goulart',
            'b' => 'João Goulart',
            'c' => 'João Goulart',
            'd' => 'João Goulart'
        ),
        'correct' => 'a'
    ),
    array(
        'question' => 'Qual o nome do presidente do Brasil que foi eleito pela primeira vez em 1994?',
        'answers' => array(
            'a' => 'João Goulart',
            'b' => 'João Goulart',
            'c' => 'João Goulart',
            'd' => 'João Goulart'
        ),
        'correct' => 'a'
    ),
    array(
        'question' => 'Qual o nome do presidente do Brasil que foi eleito pela primeira vez em 1994?',
        'answers' => array(
            'a' => 'João Goulart',
            'b' => 'João Goulart',
            'c' => 'João Goulart',
            'd' => 'João Goulart'
        ),
        'correct' => 'a'
    ),
    array(
        'question' => 'Qual o nome do presidente do Brasil que foi eleito pela primeira vez em 1994?',
        'answers' => array(
            'a' => 'João Goulart',
            'b' => 'João Goulart',
            'c' => 'João Goulart',
            'd' => 'João Goulart'
        ),
        'correct' => 'a'
    ),
    array(
        'question' => 'Qual o nome do presidente do Brasil que foi eleito pela primeira vez em 1994?',
        'answers' => array(
            'a' => 'João Goulart',
            'b' => 'João Goulart',
            'c' => 'João Goulart',
            'd' => 'João Goulart'
        ),
        'correct' => 'a'
    ),
    array(
        'question' => 'Qual o nome do presidente do Brasil que foi eleito pela primeira vez em 1994?',
        'answers' => array(
            'a' => 'João Goulart',
            'b' => 'João Goulart',
            'c' => 'João Goulart',
            'd' => 'João Goulart'
        ),
        'correct' => 'a'
    ),
    array(
        'question' => 'Qual o nome do presidente do Brasil que foi eleito pela primeira vez em 1994?',
        'answers' => array(
            'a' => 'João Goulart',
            'b' => 'João Goulart',
            'c' => 'João Goulart',
            'd' => 'João Goulart'
        ),
        'correct' => 'a'
    ));

// Start score at 0
$score = 0;

// Set a time limit for the quiz
$time_limit = 20;

// Echo top of the quiz
echo '<div class="quiz_box_top d-flex justify-content-between align-items-center">
                    <h1>Quiz - "Nome Inventado"</h1>
                    <div class="timer_box">
                        <div class="timer_text">Tempo</div>
                        <div class="timer_value">'.$time_limit.'</div>
                    </div>
      </div>'; // End of quiz_box_top

// Echo mid of the quiz
echo '<div class="quiz_box_mid">';

// Loop through questions
foreach ($questions as $question) {
    // Echo question
    echo '<div class="question_box"><h1>'.$question['question'].'</h1></div>';

    // Echo answers
    foreach ($question['answers'] as $letter => $answer) {
        echo '<div class="answer_item">
                    <input type="radio" name="answer" id="option-'.$question['id'].'-'.$letter.'" value="'.$letter.'">
                    <label  class="option" for="option-'.$question['id'].'-'.$letter.'">'.$answer.'</label>
                </div>';
    }
}

echo '</div>'; // End of quiz_box_mid


// Echo bottom of the quiz
echo '<div class="quiz_box_bottom d-flex justify-content-between align-items-center">
           <p style="margin: 0;">Perguntas respondidas - 2 de 10</p>
           <button type="button" class="next-button btn btn-primary btn-lg" onclick="nextQuestion()">
               Próxima Pergunta
           </button>
      </div>'; // End of quiz_box_bottom


echo '</div>'; // End of quiz_box


// echo for the result box
echo '<div class="result_box" id="result-box">
                <div class="icon">
                    <i class="fa fa-child"></i>
                </div>

                <div class="result_text">
                    <h1>Resultado</h1>
                    <p>Você acertou <span class="result_value">2</span> de 10 perguntas.</p>
                </div>

                <div class="button_box">
                    <button type="button" class="btn btn-primary btn-lg">
                        Jogar novamente
                    </button>
                    <button type="button" class="btn btn-secondary btn-lg">
                        Voltar
                    </button>
                </div>

      </div>';


// close container
echo '</div>';
// close background
echo '</div>';