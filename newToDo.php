<?php

$postData= $_POST['nameTask'] ?? false;
$che = $_POST['checkTask'];
echo $che;
if($postData){
  $fileName = 'toDo.json';
  $jsonD = file_get_contents('toDo.json');
  $dats = json_decode($jsonD, true);  //TO convert into an assosiate array
  $dats[trim($postData)] = ['completed' => false];
  file_put_contents('toDo.json', json_encode($dats, JSON_PRETTY_PRINT));
}

// header('Location: todoApp.php');

?>