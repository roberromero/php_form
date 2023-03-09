<?php

$postData= $_POST['nameTask'] ?? false;

if($postData){
  $jsonD = file_get_contents('toDo.json');
  $dats = json_decode($jsonD, true);  //TO convert into an assosiate array
  $dats[$postData] = ['completed' => false];
  file_put_contents('toDo.json', json_encode($dats, JSON_PRETTY_PRINT));
}

//file_exists($filename) -> Tengo que asegurarme que si se borran todas las tareas se crea un nuevo json

header('Location: todoApp.php');

?>