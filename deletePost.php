<?php


$taskToDelete = $_POST['nameTaskDelete'] ?? false;

if($taskToDelete){
    echo $taskToDelete;
  $jsonD = file_get_contents('toDo.json');
  $dats = json_decode($jsonD, true);
  unset($dats[$taskToDelete]);
  file_put_contents('toDo.json', json_encode($dats, JSON_PRETTY_PRINT));
}

header('Location: todoApp.php');

?>
