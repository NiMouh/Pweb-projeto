<?php session_start();

// Style the page
echo '<style>

body{
    margin : 0;
    padding: 0;
    background: linear-gradient(to left, rgb(0, 114, 187), rgb(113, 122, 239));
    height: 100vh;
    overflow: hidden;
}

.form-container{
    position: relative;
    top: 50%;
    transform: translateY(-50%);
    font-family: "Roboto", sans-serif;
    width: 100%;
    max-width: 500px;
    margin: 0 auto;
}

.form-container{
   position: absolute;
   top: 50%;
   left: 50%;
   transform: translate(-50%, -50%);
   width: 350px;
   background: white;
   border-radius: 10px;
}

.form-container h1{
    text-align: center;
    padding: 20px 0;
    font-size: 30px;
    font-weight: bold;
    border-bottom: 1px solid #2c3e50;
}

.form-container form{
padding: 0 40px;
box-sizing: border-box;
}

form .text_field{
    position: relative;
    border-bottom: 1px solid #2c3e50;
    margin: 30px 0;
}

.text_field input{
    width: 100%;
    padding: 0 5px;
    height: 40px;
    font-size: 15px;
    border: none;
    outline: none;
    background: none;
}

.submit-signup{
    width: 100%;
    height: 40px;
    background: #2c3e50;
    border: none;
    outline: none;
    color: white;
    font-size: 15px;
    cursor: pointer;
    border-radius: 20px;
    margin-top: 20px;
}

</style>';

// Make sign-up form if you know that user is not logged in
if (!isset($_SESSION['username'])) {

    // Head of the page
    echo '<head><title>Sign Up</title><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"></head>';

    echo '<div class="form-container">';
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


    // if i submit the form
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
            // if i find a match with the $username then error
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

