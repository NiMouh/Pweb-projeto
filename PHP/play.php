<?php session_start();

// if session is not set redirect to the login page
if (!isset($_SESSION['username'])) {
    header("Location:index.php");
    exit;
} else {
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

    // link to main.css
    echo "<link rel='stylesheet' href='main.css'>";


    // div for play-background
    echo '<div class="play-background">';

    // div for container
    echo '<div class="container">';

    // echo for the button
    echo '<div class="d-flex justify-content-center align-items-center vh-100" id="start">
            <div class="play-button" id="play_button">
                <button type="button" class="btn btn-light btn-lg play-button">Jogar</button>
            </div>
            <div class="exit-button" id="exit_button">
                <button type="button" class="btn btn-light btn-lg exit-button">Sair</button>
            </div>';

    // If exit button is clicked then redirect to menu_play.php
    echo '<script>
    $(".exit-button").click(function(){
        window.location.href = "menu_play.php";
    });
</script>';


    // If play button is clicked then hide the play button and show the info box
    echo '<script>
    $(document).ready(function(){
        $("#play_button").click(function(){
            $("#play_button").hide();
            $("#exit_button").hide();
            $("#info_box").show();
        });
    });
</script>';

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
                    <button type="button" id="back-game" class="btn btn-secondary btn-lg">Voltar</button>
                    <button type="button" id="start-game" class="btn btn-primary btn-lg">Começar</button>
                </div>
      </div>';

    // If back game button is clicked then hide the info box and show the play button
    echo '<script>
    $(document).ready(function(){
        $("#back-game").click(function(){
            $("#info_box").hide();
            $("#play_button").show();
            $("#exit_button").show();
        });
    });
</script>';


    // If start game button is clicked then hide the info box and show the quiz box
    echo '<script>
    $(document).ready(function(){
        $("#start-game").click(function(){
            $("#info_box").hide();
            $("#quiz_box").show();
        });
    });
</script>';

    // Quiz Script
    echo '<script>
    // Declare Start game button
    let start_game = document.queryCommandIndeterm("#start-game");

    // Declare time variable
    let time = document.queryCommandIndeterm("#perguntas-tempo");
    
    // Declare questions and answers variables
    let question = document.queryCommandIndeterm("#question");
    let option1 = document.queryCommandIndeterm("#option1");
    let option2 = document.queryCommandIndeterm("#option2");
    let option3 = document.queryCommandIndeterm("#option3");
    let option4 = document.queryCommandIndeterm("#option4");
    
    // Declare next button
    let next_button = document.queryCommandIndeterm("#next-button");
    
    // Declare answer questions variable
    let answer_question = document.queryCommandIndeterm("#perguntas-respondidas");
    
    // Declare score variable
    let score = document.queryCommandIndeterm(".result_value");
    
    
    let index = 0;
    let timer = 0;
    let interval = 0;
    let correct_answer = 0;
    
    // Store answer value
    let userAnswer = undefined;
    
    // When button start game is clicked then start the game
    let countDown = ()=>{
        if(time === 20){
            clearInterval(interval);
        }else{
            time++;
            console.log(time);
        }
    }
    
    setInterval(countDown, 1000);
    
    </script>';


    // echo for the quiz box
    echo '<div class="quiz_box" id="quiz_box">';

    // Start score at 0
    $score = 0;

    // Echo top of the quiz
    echo '<div class="quiz_box_top d-flex justify-content-between align-items-center">
                    <h1>Quiz - "Nome Inventado"</h1>
                    <div class="timer_box">
                        <div class="timer_text">Tempo</div>
                        <div class="timer_value" id="perguntas-tempo"></div>
                    </div>
      </div>'; // End of quiz_box_top

    // Echo mid of the quiz
    echo '<div class="quiz_box_mid">';

    // Echo question
    echo '<div class="question_box"><h1 id="question"></h1></div>';

    // Echo form
    echo '<form id="quiz_form">';

    echo '<div class="answer_item">
                    <input type="radio" name="answer" id="option-1" style="display: none;">
                    <label class="option" for="option-1">Opção 1</label>
          </div>';

    echo '<div class="answer_item">
                    <input type="radio" name="answer" id="option-2" style="display: none;">
                    <label class="option" for="option-2">Opção 2</label>
            </div>';

    echo '<div class="answer_item">
                    <input type="radio" name="answer" id="option-3" style="display: none;">
                    <label class="option" for="option-3">Opção 3</label>
            </div>';

    echo '<div class="answer_item">
                    <input type="radio" name="answer" id="option-4" style="display: none;">
                    <label class="option" for="option-4">Opção 4</label>
            </div>';


    echo '</div>'; // End of quiz_box_mid


    // Echo bottom of the quiz
    echo '<div class="quiz_box_bottom d-flex justify-content-between align-items-center">
           <p id="perguntas-respondidas" style="margin: 0;">Perguntas respondidas - 2 de 10</p>
           <button type="submit" id="next-question" class="next-button btn btn-primary btn-lg">
               Próxima Pergunta
           </button>';

    echo '</form>'; // End of form

    echo '</div>'; // End of quiz_box_bottom

    // If the time limit is 0 or button next question is clicked then go to the next question

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
}