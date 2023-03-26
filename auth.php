<?php

require_once 'login.php';

try {
    $pdo = new PDO($attr, $user, $pass, $opts);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}
if (isset($_SERVER['PHP_AUTH_USER']) &&
    isset($_SERVER['PHP_AUTH_PW'])) {
    $un_temp = sanitize($pdo, $_SERVER['PHP_AUTH_USER']);
    $pw_temp = sanitize($pdo, $_SERVER['PHP_AUTH_PW']);
    $query = "SELECT * FROM users WHERE username=$un_temp";
    $result = $pdo->query($query);

    if (!$result->rowCount()) {
        die('User not found');
    }

    $row = $result->fetch();
    $fn = $row['forename'];
    $sn = $row['surname'];
    $un = $row['username'];
    $pw = $row['password'];

    if (password_verify(str_replace("'", '', $pw_temp), $pw)) {
        session_start();
        $_SESSION['forename'] = $fn;
        $_SESSION['surname'] = $sn;
        echo htmlspecialchars("$fn $sn : Hi $fn, you are logged in as '$un'");
        echo "<a href='continue.php'>Go to continue</a>";
    } else {
        die('Invalid username/password combination');
    }
} else {
    header('WWW-Authenticate: BASIC realm="Restricted area');
    header('HTTP/1,0 401 Unauthorized');
    die('Please, use username and password');
}

function sanitize($pdo, $str)
{
    $str = htmlentities($str);
    return $pdo->quote($str);
}