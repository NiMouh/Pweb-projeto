<?php session_start();

// Import main.css
echo '<link rel="stylesheet" href="main.css">';

// Make login form if not logged in
if (!isset($_SESSION['username'])) {

    // Head of the page
    echo '<head><title>Login</title><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"></head>';

    echo '<div class="main-div">';
    echo '<div class="login-form-container">';
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

    // Check if login form submitted
    if (isset($_POST['login'])) {
        // Get username and password from form
        $username = $_POST['username'];
        $password = $_POST['password'];


        // Declare url request
        $url = 'http://localhost:8000/login';
        $response = json_decode(file_get_contents($url), true);


        // Run response array in a for each loop
        foreach ($response as $utilizador) {
            // if i found the user in the array, check if the password is correct
            if ($utilizador['username'] == $username && $utilizador['password'] == $password) {
                // if correct, set session variables and redirect to home
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                header("Location: index.php");
            }
        }

        // Display error message
        echo '<script>alert("O Nome de utilizador ou palavra-passe estão incorretos")</script>';
    }

} else {
    // If logged in, redirect to home
    header("Location: index.php");
}

?>
