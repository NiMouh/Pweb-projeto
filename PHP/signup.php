<?php session_start();

// Import main.css
echo '<link rel="stylesheet" href="main.css">';

// Make sign-up form if you know that user is not logged in
if (!isset($_SESSION['username'])) {

    // Head of the page
    echo '<head><title>Sign Up</title><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"></head>';

    echo '<div class="main-div">';
    echo '<div class="signup-form-container">';
    echo '<h1>Sign Up</h1>';
    echo '<form action="signup.php" method="post">';
    echo '<div class="text_field">';
    echo '<input autofocus class="form-control" name="username" placeholder="Username" type="text" required/>';
    echo '</div>';
    echo '<div class="text_field">';
    echo '<input class="form-control" name="password" placeholder="Password" type="password" required/>';
    echo '</div>';
    echo '<div class="text_field">';
    echo '<input class="form-control" name="confirmation" placeholder="Confirm Password" type="password" required/>';
    echo '</div>';
    echo '<button type="submit" class="submit-signup">Sign Up</button>';
    echo '</form>';
    echo '</div>';
    echo '</div>';


    // if I submit the form
    if (isset($_POST['username'])) {
        // Get username and password from form
        $username = $_POST['username'];
        $password = $_POST['password'];


        $url_login = "http://localhost:8000/login";
        $response_login = json_decode(file_get_contents($url_login), true);

        // Declared a boolean variable to check if user exists
        $user_exists = false;

        // for each responde_login
        foreach ($response_login as $utilizador) {
            // if I find a match with the $username then error
            if (strcmp($utilizador['username'], $username) == 0) {
                echo '<script>alert("Este nome de utilizador já existe")</script>';
                $user_exists = true;
            }
        }

        // if user does not exist
        if (!$user_exists) {
            // Get url request
            $url = "http://localhost:8000/signup?username=" . $username . "&password=" . $password;

            // Make a curl post
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS,
                "username=$username&password=$password");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $server_output = curl_exec($ch);
            curl_close($ch);

            // Login the user
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            header("Location: index.php");
        }

    }


} else {
    // If user is logged in, redirect to index.php
    header("Location: index.php");
}

