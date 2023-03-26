<?php

require_once 'login.php';

echo "HELLO <br>";

try {
    $pdo = new PDO($attr, $user, $pass, $opts);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

$query = "SELECT * FROM classics";
$result = $pdo->query($query);

while ($row = $result->fetch()) {
    echo 'Author: ' . htmlspecialchars($row['author']) . "<br>";
    echo 'Title: ' . htmlspecialchars($row['title']) . "<br>";
    echo 'Type: ' . htmlspecialchars($row['type']) . "<br>";
    echo 'Year: ' . htmlspecialchars($row['year']) . "<br>";
}

$pdo = null;