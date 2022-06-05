<?php
// If session user is different from moderator user, redirect to index.php

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
    echo "<div class='col-md-12'>";
    echo "<button type='button' class='btn btn-outline-primary'> + Criar Utilizador</button>";
    echo "</div>";
    echo "</div>";


    // echo row div
    echo "<div class='row justify-content-center'>";

    // echo col-md-11 div
    echo "<div class='col-md-11'>";

    // declares number of users in database ("SELECT COUNT(*) FROM users")
    $number_of_users = 10;

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

    // for loop to display all users
    for ($i = 1; $i <= $number_of_users; $i++) {
        // echo table row
        echo "<tr>";
        echo "<td>" . $i . "</td>";
        echo "<td> Sei la</td>";
        echo "<td> Seila123</td>";
        echo "<td>0</td>";
        echo "<td><button type='button' class='btn btn-danger'>Eliminar</button></td>";
        echo "</tr>";
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

