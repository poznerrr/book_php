<?php

session_start();
if (isset($_SESSION['forename'])) {
    $forename = $_SESSION['forename'];
    $surname = $_SESSION['surname'];

    destroy_session_and_data();

    echo "Hello again, $forename <br>
    Your full name: $forename $surname<br>";
} else {
    echo "Please confirm <a href='auth.php'>here</a>";
}

function destroy_session_and_data()
{
    $_SESSION = [];
    setcookie(session_name(),'', time() - 2592000,'/');
    session_destroy();
}