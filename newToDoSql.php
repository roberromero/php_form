<?php

require_once './dbConnect.php';


$insertNote = new Connection();
$insertNote->addNote($_POST);


header('Location: todoAppSql.php');


?>
