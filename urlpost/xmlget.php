<?php
if (isset($_GET['url'])) {
    header('Content-Type: text/xml');
    echo file_get_contents("http://".SanitizeString($_POST['url']));
}

function SanitizeString($var) : string
{
    $var = strip_tags($var); //strip_tags - удаляет теги php html
    $var = htmlentities($var); //htmlentities -  преобразует символы в html сущности
    return stripslashes($var); //stripsplashes - удаляет экранирующие символы
}