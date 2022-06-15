<?php

// import the header
include 'header.php';

if (isset($_SESSION['username'])) {
    // div for main-div
    echo '<div class="main-div">';

    // div for perfil container
    echo '<div class="profile-container d-flex flex-column">';
    echo '<form action="perfil.php" method="post">';

    // div for perfil-header
    echo '<div class="profile-header d-flex justify-content-between">';

    // Echo a go back link
    echo '<a class="btn-font" href="index.php"><i class="fa fa-arrow-left"></i></i></a>';
    // Button to edit profile
    echo '<a class="btn-font" id="edit-profile"><i class="fa fa-pencil"></i></a>';


    // Close div for perfil-header
    echo '</div>';

    // div for perfil-body
    echo '<div class="profile-body">';

    echo '<h1 class="profile-title">Perfil</h1>';


    // Declare username
    $username = $_SESSION['username'];

    // Echo the username
    echo '<input type="text" id="profile-username" name="profile_username" readonly value="' . $username . '"/>';

    // If edit-profile is clicked, set readonly to true else false
    echo '<script>
            document.getElementById("edit-profile").addEventListener("click", function() {
                if (document.getElementById("profile-username").readOnly) {
                    return document.getElementById("profile-username").readOnly = false;
                } else {
                    return document.getElementById("profile-username").readOnly = true;
                }
            });
            </script>';

    // close div for perfil-body
    echo '</div>';

    // div for perfil-footer
    echo '<div class="profile-footer d-flex justify-content-around align-items-center">';

    // div for resultados
    echo '<div class="resultados-container">';

    // Echo 'Resultados'
    echo '<h4 class="profile-text">Questionários Feitos</h4>';

    $url = 'http://localhost:8000/login';
    $response = json_decode(file_get_contents($url), true);

    $id = -1;
    foreach ($response as $utilizador) {
        if ($utilizador['username'] == $_SESSION['username'] && $utilizador['password'] == $_SESSION['password']) {
            $id = $utilizador['IDLogin'];
        }
    }

    $url_quiz = "http://localhost:8000/count_user_scores?IDLogin=" . $id;
    $response_quiz = json_decode(file_get_contents($url_quiz), true);


    // Echo the results
    echo '<p>'. $response_quiz[0]['COUNT(*)'] .'</p>';

    // close div for resultados
    echo '</div>';

    // div for maior pontuação
    echo '<div class="maior-pontuacao-container">';

    // Echo 'Maior pontuação'
    echo '<h4 class="profile-text">Maior pontuação</h4>';

    $url_quiz_1 = "http://localhost:8000/greatest_user_score?IDLogin=" . $id;
    $response_quiz_1 = json_decode(file_get_contents($url_quiz_1), true);

    // Echo the highest score
    echo '<p>'. $response_quiz_1[0]['MAX(pontuacao)'] .'</p>';

    // close div for maior pontuanção
    echo '</div>';

    // div for Guardar
    echo '<div class="guardar-container">';

    // Echo guardar button
    echo '<input type="submit" class="profile-save-chances btn btn-primary" value="Guardar"/>';

    // Declares $password as user's password
    $password = $_SESSION['password'];


    if (isset($_POST['profile_username']))
    {

        $username = $_POST['profile_username'];

        $url = 'http://localhost:8000/login';
        $response = json_decode(file_get_contents($url), true);

        $id = -1;
        foreach ($response as $utilizador) {
            if ($utilizador['username'] == $username && $utilizador['password'] == $password) {
                $name = $utilizador['username'];
            }
        }

        $url_update = "http://localhost:8000/update_profile?username=" . $_POST['profile_username'] . "&old_username=" . $_SESSION['username'];
        // curl update request
        if ($url_update != "") {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url_update);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec($ch);
            curl_close($ch);
        }
    }


    // close div for guardar
    echo '</div>';

    // close div for perfil-footer
    echo '</div>';

    echo '</form>';
    // close div for perfil container
    echo '</div>';

    // close div for main-div
    echo '</div>';
} else {
    header("Location:index.php");
    exit;
}


// import the footer
include 'footer.php';
