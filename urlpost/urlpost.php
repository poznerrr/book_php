<?php //urlpost.php
if (isset($_POST['url'])) {
    cors();
    //file_get_contents - читает содержимое файла в строку
    echo file_get_contents('http://'.SanitizeString($_POST['url']));
}

function SanitizeString($var) : string
{
    $var = strip_tags($var); //strip_tags - удаляет теги php html
    $var = htmlentities($var); //htmlentities -  преобразует символы в html сущности
    return stripslashes($var); //stripsplashes - удаляет экранирующие символы
}

//allow cross-origin policy
function cors()
{

    // Allow from any origin
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
        // you want to allow, and if so:
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }

    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            // may also be using PUT, PATCH, HEAD etc
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

        exit(0);
    }
}
