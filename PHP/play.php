<?php session_start();

// if session is not set redirect to the login page
if (!isset($_SESSION['username'])) {
    header("Location:index.php");
    exit;
} else {
    if(isset($_POST['quiz-id']))
    {
        setcookie("quiz-id", $_POST['quiz-id'], time() + (86400 * 30), "/");
        setcookie("game", "0", time() + (86400 * 30), "/");
        setcookie("pontuacao", "0", time() + (86400 * 30), "/");
        header("Location:play.php");
    }

    if (isset($_POST['quiz-id']) || isset($_COOKIE['quiz-id'])) {

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


        echo '
            <div class="play-background">
                <div class="container">
                    <div class="d-flex justify-content-center align-items-center vh-100" id="start">
        ';


        if (isset($_POST['exit_game']))
        {
            setcookie("quiz-id", "", time() - 3600);
            setcookie("game", "", time() - 3600);
            setcookie("pontuacao", "", time() - 3600);
            setcookie("nr_q_atual", "", time() - 3600);
            setcookie("qtd_q", "", time() - 3600);
            unset($_POST['exit_game']);
            unset($_POST['quiz-id']);
            unset($_POST['repeat_game']);
            unset($_POST['back_game']);

            header('Location:menu_play.php');
        }

        if (isset($_POST['back_game']) || $_COOKIE['game'] == "0" || isset($_POST['repeat_game']))
        {
            setcookie("game", "1", time() + (86400 * 30), "/");
            echo '
                    <div class="play-button" id="play_button">
                        <form action="play.php" method="post">
                            <input type="submit" name="play" class="btn btn-light btn-lg play-button" value="Jogar">
                        </form>
                    </div>
                    <div class="exit-button" id="exit_button">
                        <form action="play.php" method="post">
                            <input type="submit" name="exit_game" class="btn btn-light btn-lg exit-button" value="Sair">
                        </form>
                    </div>
            ';
        }
        else if ($_COOKIE['game'] == 1)
        {
            setcookie("game", "2", time() + (86400 * 30), "/");
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
                            <form action="play.php" method="post">
                                <input type="submit" id="back-game" name="back-game" class="btn btn-secondary btn-lg" value="Voltar">
                            </form>
                            <br>
                            <form action="play.php" method="post">
                                <input type="submit" id="start-game" name="start-game" class="btn btn-primary btn-lg" value="Começar">                            
                            </form>
                        </div>
                    </div>';
        }
        else if ($_COOKIE['game'] == 2)
        {
            setcookie("game", "3", time() + (86400 * 30), "/");
            $url = "http://localhost:8000/quiz_questions?IDQuiz=" . $_COOKIE['quiz-id'];
            $response = json_decode(file_get_contents($url), true);


            setcookie("qtd_q", count($response), time() + (86400 * 30), "/");
            setcookie("nr_q_atual", "0", time() + (86400 * 30), "/");
            header("Location:play.php");
        }
        else if ($_COOKIE['game'] == 3)
        {
            $url = "http://localhost:8000/quiz_questions?IDQuiz=" . $_COOKIE['quiz-id'];
            $response = json_decode(file_get_contents($url), true);

            if(isset($_POST['next_question']))
            {
                if($_POST['answer'] == $response[$_COOKIE['nr_q_atual'] - 1]['opcao_valida'])
                {
                    setcookie("pontuacao", $_COOKIE['pontuacao'] + 1, time() + (86400 * 30), "/");
                }

                unset($_POST['next_question']);
            }

            if ($_COOKIE['nr_q_atual'] < $_COOKIE['qtd_q'])
            {
                $responses = array();
                $responses[0] = $response[$_COOKIE['nr_q_atual']]['opcao_valida'];
                $responses[1] = $response[$_COOKIE['nr_q_atual']]['opcao_invalida_1'];
                $responses[2] = $response[$_COOKIE['nr_q_atual']]['opcao_invalida_2'];
                $responses[3] = $response[$_COOKIE['nr_q_atual']]['opcao_invalida_3'];
                sort($responses);


                echo '
                <div class="quiz_box" id="quiz_box">
                    <div class="quiz_box_top d-flex justify-content-between align-items-center">
                        <h1>'. $response[$_COOKIE['nr_q_atual']]['pergunta'] .'</h1>
                        <div class="timer_box">
                        <div class="timer_text">Tempo</div>
                        <div class="timer_value" id="perguntas-tempo"></div>
                    </div>
                </div>
                <form id="quiz_form" method="post" action="play.php">
                    <div class="quiz_box_mid">
                        <div class="question_box"><h1 id="question"></h1></div>
                            <div class="answer_item">
                                <input type="radio" name="answer" id="option-1" style="display: none;" value="'. $responses[0] .'">
                                <label class="option" for="option-1">'. $responses[0] .'</label>
                            </div>
                            <div class="answer_item">
                                <input type="radio" name="answer" id="option-2" style="display: none;" value="'. $responses[1] .'">
                                <label class="option" for="option-2">'. $responses[1] .'</label>
                            </div>
                            <div class="answer_item">
                                <input type="radio" name="answer" id="option-3" style="display: none;" value="'. $responses[2] .'">
                                <label class="option" for="option-3">'. $responses[2] .'</label>
                            </div>
                            <div class="answer_item">
                                <input type="radio" name="answer" id="option-4" style="display: none;" value="'. $responses[3] .'">
                                <label class="option" for="option-4">'. $responses[3] .'</label>
                            </div>
                    </div>
                    <div class="quiz_box_bottom d-flex justify-content-between align-items-center">
                        <p id="perguntas-respondidas" style="margin: 0;">Perguntas respondidas - '. $_COOKIE['nr_q_atual'] . ' de '. $_COOKIE['qtd_q'] .'</p>
                        <input type="submit" id="next_question" name="next_question" class="btn btn-primary btn-lg" value="Próxima Pergunta">
                    </div>
                </form>
            ';
                setcookie("nr_q_atual", $_COOKIE['nr_q_atual'] + 1, time() + (86400 * 30), "/");
            }
            else
            {
                setcookie("game", "4", time() + (86400 * 30), "/");
                header("Location: play.php");
            }

        }
        else if ($_COOKIE['game'] == 4)
        {

            $url = 'http://localhost:8000/login';
            $response = json_decode(file_get_contents($url), true);

            $id = -1;
            foreach ($response as $utilizador) {
                if ($utilizador['username'] == $_SESSION['username'] && $utilizador['password'] == $_SESSION['password']) {
                    $id = $utilizador['IDLogin'];
                }
            }

            $url = 'http://localhost:8000/add_score_quiz?IDLogin=' . $id . '&IDQuiz=' . $_COOKIE['quiz-id'] . '&pontuacao=' . $_COOKIE['pontuacao'];
            // Make curl post
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "IDLogin=" . $id . "&IDQuiz=" . $_COOKIE['quiz-id'] . "&pontuacao=" . $_COOKIE['pontuacao']);
            $result = curl_exec($ch);
            curl_close($ch);



            setcookie("game", "0", time() + (86400 * 30), "/");
            // echo for the result box
            echo '<div class="result_box" id="result-box">
                    <div class="icon">
                        <i class="fa fa-child"></i>
                    </div>
                    <div class="result_text">
                        <h1>Resultado</h1>
                        <p>Você acertou <span class="result_value">'. $_COOKIE['pontuacao'] .'</span> de '. $_COOKIE['qtd_q'] .' perguntas.</p>
                    </div>
        
                    <div class="button_box">
                        <form action="play.php" method="post">
                            <input type="submit" id="end_game" name="exit_game" class="btn btn-primary btn-lg" value="Voltar para os Quizzes">
                            <input type="submit" id="repeat_game" name="repeat_game" class="btn btn-secondary btn-lg" value="Jogar novamente">
                        </form>
                    </div>
                </div>';
        }

        // close start
        echo '</div>';
        // close container
        echo '</div>';
        // close background
        echo '</div>';
    }
}