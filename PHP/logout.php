<?php session_start();

// If the user is logged in, delete the session vars to log them out
if (isset($_SESSION['username'])) {
    // Pop up a prompt to confirm logout
    echo "<script type='text/javascript'>
    if (confirm('Quer mesmo encerrar a sessão?')) {
        window.location.href = 'PHP/logout.php';
    } else {
        window.location.href = 'index.php';
    }
    </script>";

    // Delete the session vars by clearing the $_SESSION array
    $_SESSION = array();

    // Delete the session cookie by setting its expiration to an hour ago (3600)
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time() - 3600);
    }

    // Destroy the session
    session_destroy();

    // Redirect to the home page
    header('Location: index.php');
} else {
    // Redirect to the home page
    header('Location: index.php');
    exit;
}
