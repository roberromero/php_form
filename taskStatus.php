<?php

$taskName = $_POST['taskName'];
$taskName = str_replace('+', ' ', $taskName);
echo $taskName;

$jsonD = file_get_contents('toDo.json');
$dats = json_decode($jsonD, true);

$dats[$taskName]['completed'] = !$dats[$taskName]['completed'];
file_put_contents('toDo.json', json_encode($dats, JSON_PRETTY_PRINT));

header('Location: todoApp.php');
?>
