<?php
require_once 'login.php';

try {
    $pdo = new PDO($attr, $user, $pass, $opts);
}
catch (PDOException $e)
{
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}
if(isset($_POST['delete']) && isset($_POST['id']))
{
    $id = get_post($pdo, 'id');
    $query = "DELETE FROM classics WHERE id=$id";
    $result=$pdo->query($query);
}

if (isset($_POST['author']) &&
    isset($_POST['title']) &&
    isset($_POST['type']) &&
    isset($_POST['year']) &&
    isset($_POST['id']))
{
    $author = get_post($pdo, 'author');
    $title = get_post($pdo, 'title');
    $type = get_post($pdo, 'type');
    $year = get_post($pdo, 'year');
    $id = get_post($pdo, 'id');

    $query = "INSERT INTO classics VALUES".
        "($author, $title, $type, $year, $id)";
    $result = $pdo->query($query);
}

echo <<<_END
<form action="sqltest.php" method="post"><pre>
Author <input type="text" name="author">
Title  <input type="text" name="title">
Type   <input type="text" name="type">
Year   <input type="text" name="year">
Id     <input type="text" name="id">
    <input type="submit" value="ADD RECORD">
</pre></form>
<hr>
_END;

$query = "SELECT * FROM classics";
$result = $pdo->query($query);

while ($row = $result->fetch())
{
    $r0 =htmlspecialchars($row['author']);
    $r1 =htmlspecialchars($row['title']);
    $r2 =htmlspecialchars($row['type']);
    $r3 =htmlspecialchars($row['year']);
    $r4 =htmlspecialchars($row['id']);

    echo <<<_END
<pre>
    Author $r0
    Title $r1
    Type $r2
    Year $r3
    Id $r4   
</pre>
<form action='sqltest.php' method="post">
<input type="hidden" name="delete" value="yes">
<input type="hidden" name="id" value="$r4">
<input type="submit" value="DELETE RECORD">
</form>
_END;
}

function get_post($pdo, $var)
{
    return $pdo->quote($_POST[$var]);
}
