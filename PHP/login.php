<?php

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

.text_field label{
    position: absolute;
    top: -10px;
    left: 5px;
    padding: 10px 0;
    font-size: 15px;
    color: #2c3e50;
    pointer-events: none;
    transform:translateY(-50%);
    transition: 0.2s ease all;
}

.text_field span::before{
    content: "";
    position: absolute;
    top: 40px;
    left: 0;
    width: 100%;
    height: 2px;
    background: #2c3e50;
    transition: 0.2s ease all;
}

.text_field input:focus ~ label, .text_field input:valid ~ label{
    top: -10px;
    font-size: 10px;
    color: #2c3e50;
}

.text_field input:focus ~ span::before, .text_field input:valid ~ span::before{
    top: 0;
    height: 2px;
    background: #2c3e50;
    transition: 0.2s ease all;
}


.submit-login{
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

// Make login form if not logged in
if (!isset($_SESSION['username'])) {

    // Head of the page
    echo '<head><title>Login</title><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"></head>';

    echo '<div class="form-container">';
    echo '<h1>Login</h1>';
    echo '<form action="login.php" method="post">';
    echo '<div class="text_field">';
    echo '<span></span>';
    echo '<label for="username">Username:</label>';
    echo '<input type="text" name="username" id="username" />';
    echo '</div>';
    echo '<div class="text_field">';
    echo '<span></span>';
    echo '<label for="password">Password:</label>';
    echo '<input type="password" name="password" id="password" />';
    echo '</div>';
    echo '<input type="submit" name="login" value="Login" class="submit-login"/>';
    echo '</form>';
    echo '<p style="text-align: center;">Não tem conta? <a href="signup.php">Registe-se</a></p>';
    echo '</div>';
}else{
    // If logged in, redirect to home
    header("Location: index.php");
}
// Check if login form submitted
if (isset($_POST['login'])) {
    // Get username and password from form
    $username = $_POST['username'];
    $password = $_POST['password'];



    // Declare url request
    $url = 'http://localhost:8000/login';
    $response = json_decode(file_get_contents($url), true);


    // Run response array in a for each loop
    foreach ($response as $utilizador){
        // if i found the user in the array, check if the password is correct
        if ($utilizador['username'] == $username && $utilizador['password'] == $password){
            // if correct, set session variables and redirect to home
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            header("Location: index.php");
        }
    }

    // Display error message
    echo '<script>alert("Username already exists")</script>';
}

?>
