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

// Make a webpage to play a quiz

// Make a play button to start the quiz
echo "<button id='play-button' class='btn btn-light btn-lg' onclick='myFunction()'>Play Quiz</button>
<script>

// Make button disappear after quiz is played
function myFunction() {
    document.getElementById('play-button').style.display = 'none';
}
</script>
";


// Start the quiz
if (isset($_POST['submit'])) {
    $score = 0;
    $question_number = 1;

    // Loop through questions
    while ($question_number <= 5) {
        $answer = $_POST["question$question_number"];

        // Display question
        echo "<p>Question $question_number: What is the capital of $answer?</p>";
        // Display answer choices
        echo "<form id='myForm' method='post'>";
        echo "<input type='radio' name='question$question_number' value='$answer' checked> $answer<br>";
        echo "<input type='radio' name='question$question_number' value='Tokyo'> Tokyo<br>";
        echo "<input type='radio' name='question$question_number' value='London'> London<br>";
        echo "<input type='radio' name='question$question_number' value='Beijing'> Beijing<br>";
        echo "<form>";


        // Check answer
        if ($answer == ${"correct_answer$question_number"}) {
            $score++;
        }

        $question_number++;
    }

    // Display results
    echo "<div id='results'>$score / 5 correct</div>";
}


