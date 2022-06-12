<?php
// include header.php
include 'header.php';

$moderator = "admin";

if ($_SESSION['username'] != $moderator) {
    header("Location: index.php");
    exit;
} else {

    // echo container div
    echo "<div class='container'>";

    // row with white box div
    echo "<div class='row white-box' style='height: 100px;'></div>";

    // echo row div with a button to create new users
    echo "<div class='row' style='margin-bottom: 50px'>";
    echo "<div class='col-md-6'>";
    // Make a form to create a new user
    echo "<form action='moderator.php' method='post'>";
    echo "<div class='d-flex justify-content-around align-items-center'>";
    echo "<input type='text' name='new-user' placeholder='Nome de Utilizador' class='form-control' required style='margin-right: 10px;'/>";
    echo "<input type='password' name='new-password' placeholder='Palavra-Passe' class='form-control' required style='margin-right: 10px;'/>";
    echo "<button type='submit' class='btn btn-outline-primary' style='font-size: x-small;'> + Criar</button>";
    echo "</div>";
    echo "</form>";
    echo "</div>";
    echo "</div>";

    if (isset($_POST['new-user'])) {
        // Get the new user's username and password
        $new_user = $_POST['new-user'];
        $new_password = $_POST['new-password'];

        $url_login = "http://localhost:8000/login";
        $response_login = json_decode(file_get_contents($url_login), true);

        // Declared a boolean variable to check if user exists
        $user_exists = false;

        // for each responde_login
        foreach ($response_login as $utilizador) {
            // if I find a match with the $username then error
            if (strcmp($utilizador['username'], $new_user) == 0) {
                echo '<script>alert("Este nome de utilizador já existe")</script>';
                $user_exists = true;
            }
        }

        // if user does not exist
        if (!$user_exists) {
            // Get url request
            $url = "http://localhost:8000/signup?username=" . $new_user . "&password=" . $new_password;

            // Make a curl post
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS,
                "username=$new_user&password=$new_password");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $server_output = curl_exec($ch);
            curl_close($ch);

            // Clean post data
            unset($_POST['new-user']);
            unset($_POST['new-password']);

            // Refresh the page
            echo '<script>window.location.reload()</script>';
        }
    }


    // echo row div
    echo "<div class='row justify-content-center'>";

    // echo col-md-11 div
    echo "<div class='col-md-11'>";

    // Start a table to display users
    echo "<table class='table table-hover'>";

    // table header
    echo "<thead>";
    echo "<tr>";
    echo "<th scope='col'>#</th>";
    echo "<th scope='col'>Username</th>";
    echo "<th scope='col'>Password</th>";
    echo "<th scope='col'>Quiz's Feitos</th>";
    echo "<th scope='col'>Eliminar Utilizador</th>";
    echo "</tr>";
    echo "</thead>";

    // table body
    echo "<tbody>";

    // Get the url request
    $url_login = "http://localhost:8000/login";
    $response_login = json_decode(file_get_contents($url_login), true);

    // for each response_login
    foreach ($response_login as $utilizador) {
        // echo form
        echo "<form action='moderator.php' method='get'>";
        // echo table row
        echo "<tr>";
        echo "<td>" . $utilizador['IDLogin'] . "</td>";
        echo "<td>" . $utilizador['username'] . "<input type='text' name='delete-user' value='" . $utilizador['username'] . "' style='display: none;'/></td>";
        echo "<td>" . $utilizador['password'] . "</td>";
        echo "<td>0</td>";
        echo "<td><button type='submit' class='btn btn-danger'>Eliminar</button></td>";
        echo "</tr>";
        echo "</form>";
    }

    // If submit button is pressed then delete the user
    if (isset($_GET['delete-user'])) {
        // Get the user's username
        $username = $_GET['delete-user'];

        // Get url request
        $url = "http://localhost:8000/deleteuser?username=" . $username;

        // Make a curl delete
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close($ch);
    }

    // end table body
    echo "</tbody>";

    // end table
    echo "</table>";

    // end col-md-11 div
    echo "</div>";

    // end row
    echo "</div>";

    // row with white box div
    echo '<div class="row white-box"></div>';

    // close container div
    echo "</div>";


    // include footer.php
    include 'footer.php';
}

