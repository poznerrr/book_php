<?php
require_once 'login.php';

try {
    $pdo = new PDO($attr, $user, $pass, $opts);
}
catch (PDOException $e)
{
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

//Creating table
/*
$query = "CREATE TABLE cats (
   id SMALLINT NOT NULL AUTO_INCREMENT,
   family VARCHAR(32) NOT NULL,
   name VARCHAR(32) NOT NULL,
   age TINYINT NOT NULL,
   PRIMARY KEY (id) 
)";

$result = $pdo->query($query);
*/

//Deleting table

/*
$query = "DROP TABLE cats";
$result = $pdo->query($query);
*/

//Description table

$query = "DESCRIBE cats";
$result = $pdo->query($query);

echo "<table><tr><th>Column</th><th>Type</th><th>Null</th><th>Key</th></tr>";

while($row = $result->fetch(PDO::FETCH_NUM))
{
    echo "<tr>";
    for ($k=0; $k<4; ++$k)
        echo "<td>".htmlspecialchars($row[$k])."</td>";
    echo "</tr>";
}

echo "</table>";

//Adding data into table

$query = "INSERT INTO cats VALUES(NULL, 'Lion','Leo',4)";
$result = $pdo->query($query);

echo "The Insert ID was:".$pdo->lastInsertId();


echo "<hr>";
//Gets data

$query = "SELECT * FROM cats";
$result = $pdo->query($query);

echo "<table><tr><th>Id</th><th>Family</th><th>Name</th><th>Age</th></tr>";
while ($row = $result->fetch(PDO::FETCH_NUM))
{
    echo "<tr>";
    for($k=0; $k<4; ++$k ) {
        echo "<td>".htmlspecialchars($row[$k])."</td>";
    }
    echo "</tr>";
}
echo "</table>";

//renew data
$query = "UPDATE cats SET name='Charlie' WHERE name='Leo'";
$result = $pdo->query($query);

//deleting data
$query = "DELETE FROM cats WHERE name='Charlie'";
$result = $pdo->query($query);



