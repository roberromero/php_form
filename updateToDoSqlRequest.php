<?php


require_once './dbConnect.php';
$updateNote = new Connection();
$updateNote->updateNote($_POST['noteName'],$_POST['noteText'],$_POST['noteId']);

header('Location: todoAppSql.php');
?>




