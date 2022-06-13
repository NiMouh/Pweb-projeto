<?php

// import the header
include 'header.php';

if (isset($_SESSION['username'])) {
    // div for main-div
    echo '<div class="main-div">';

    // div for perfil container
    echo '<div class="profile-container d-flex flex-column">';

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
    echo '<input type="text" id="profile-username" readonly value="' . $username . '"/>';

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
    echo '<h4 class="profile-text">Resultados</h4>';

    /* FALTA COLOCAR AQUI A QUERY */

    // Echo the results
    echo '<p>0</p>';

    // close div for resultados
    echo '</div>';

    // div for maior pontuação
    echo '<div class="maior-pontuacao-container">';

    // Echo 'Maior pontuação'
    echo '<h4 class="profile-text">Maior pontuação</h4>';

    /* FALTA COLOCAR AQUI A QUERY */

    // Echo the highest score
    echo '<p>0</p>';

    // close div for maior pontuanção
    echo '</div>';

    // div for Guardar
    echo '<div class="guardar-container">';

    // Echo guardar button
    echo '<button class="profile-save-chances btn btn-primary">Guardar</button>';

    // Declares $password as user's password
    $password = $_SESSION['password'];

    // If the user clicks the button, pop up a confirmation box and check if it matches with the $password variable, if so, get the profile_username value
    echo '<script>
            document.getElementsByClassName("profile-save-chances")[0].addEventListener("click", function() {
                var confirm = prompt("Confirmar palavra-passe");
                if (confirm === "' . $password . '") {
                    var profile_username = document.getElementById("profile-username").value;
                    window.location.href = "http://localhost:8000/update_profile?username=" + profile_username + "&old_username=" + ' . $username . ';
                } else {
                    alert("Palavra-passe incorreta");
                }
            });
            </script>';


    // If user clicks on guardar button, make a function that asks to confirm the password and then returns the username

    // close div for guardar
    echo '</div>';

    // close div for perfil-footer
    echo '</div>';

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
