<?php


$taskToDelete = $_POST['nameTaskDelete'] ?? false;
if($taskToDelete){
  $jsonD = file_get_contents('toDo.json');
  $dats = json_decode($jsonD, true);
  $taskToDelete = str_replace('+', ' ', $taskToDelete);
  unset($dats[$taskToDelete]);
  file_put_contents('toDo.json', json_encode($dats, JSON_PRETTY_PRINT));
}

header('Location: todoApp.php');

?>
