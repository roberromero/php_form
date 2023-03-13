<?php

require_once './dbConnect.php';

$idDelete = new Connection();
$idDelete->deleteNote($_POST['id']);


header('Location: todoAppSql.php');
?>
