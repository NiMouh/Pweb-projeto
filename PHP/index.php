<?php
// include header.php
include('header.php');?>

<?php

echo "<div class='container' style='max-width: 100% !important;padding: 0 !important;'>
    <div class='row linha-principal align-items-center' style='color: white;'>
        <div class='col-lg-6  col-md-4 col-sm-12' style='padding-left: 10%'>
            <h1>Bem-vindo</h1>";

if (isset($_SESSION['username'])) {
    echo "<h3>Olá, " . $_SESSION['username'] . "</h3>";
    echo "  <p>Agora que aqui chegou, deseja jogar algum quiz?!</p>
            <button type='button' class='btn btn-light btn-lg'>
                <a href='menu_play.php' style='text-decoration: none;color: black;'>Jogar</a>
            </button>";
} else {
    echo "<h3>Olá, visitante</h3>";
    echo "  <p>Não tem conta ainda. Sem problema, pode aderir já de maneira fácil.</p>
            <button type='button' class='btn btn-light btn-lg'>
                <a href='signup.php' style='text-decoration: none;color: black;'>Aderir</a>
            </button>";
}

echo "
        </div>
        <div class='col-lg-6 col-md-8 col-sm-12'>
            <img src='Imagens/home-photo.png' alt='home-photo' class='home-photo'>
        </div>
    </div>

    <div class='row' style='margin: 0 !important;'>
        <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 320' style='padding: 0;'>
            <path fill='#0072BB' fill-opacity='1'
                  d='M0,32L60,32C120,32,240,32,360,53.3C480,75,600,117,720,149.3C840,181,960,203,1080,181.3C1200,160,1320,96,1380,64L1440,32L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z'></path>
        </svg>
    </div>



</div>";


// include footer.php
include('footer.php');
?>
