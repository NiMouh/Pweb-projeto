<?php session_start();

echo "<!DOCTYPE html>
<html lang='pt'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>QUIZ</title>

    <!-- Main CSS-->
    <link rel='stylesheet' href='main.css'>
    
    <!-- Link Icon -->
    <link rel='icon' href='Imagens/quiz.png'>
    
    
    
    <!--- Font Awesome -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>


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

</head>
<body>

<header>
    <nav class='navbar navbar-expand-lg navbar-light bg-white'>
        <a class='navbar-brand' href='index.php'>
            <img src='Imagens/quiz.png' width='100' height='50' alt='Quiz-logo'>
        </a>
        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#mobile-menu'
                aria-controls='mobile-menu' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
        </button>

        <div class='collapse navbar-collapse justify-content-end' id='mobile-menu'>
            <ul class='navbar-nav nav-masthead text-center align-items-center'>
                <li>
                    <a class='nav-link' href='index.php'>Home</a>
                </li>";


echo "          <li>
                    <a class='nav-link' href='contactos.php'>Contactos</a>
                </li>
                <li>
                    <a class='nav-link' href='faq.php'>FAQ</a>
                </li>";

// Make a link to login
if (!isset($_SESSION['username'])) {
    echo "<li>
                        <a class='nav-link' href='login.php'>Entrar</a>
                                            </li>";
} else {
    echo "<li>
                        <a class='nav-link' href='menu_play.php'>Jogar</a>
                                            </li>";
    echo "<li>
                        <a class='nav-link' href='logout.php'>Sair</a></li>";
}

// Make a sign-in link if the user is not logged in
if (!isset($_SESSION['username'])) {
    echo "<li>
                        <a class='nav-link' href='signup.php'>
                            <button type='button' class='btn btn-primary btn-small btn-nav rounded-pill botao-entrar'>
                                Criar conta
                            </button>
                        </a>
          </li>";
} else {
    // if user username is "admin" make an admin link
    if ($_SESSION['username'] == "admin") {
        echo "<li>
                        <a class='nav-link' href='moderator.php'>Moderação</a>
              </li>";
    } else {
        echo "<li>
                        <a class='nav-link' href='perfil.php'>Perfil</a>
              </li>";
    }
}
echo "</ul>
        </div>
    </nav>
</header>";
