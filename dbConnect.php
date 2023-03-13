<?php

class Connection{


public PDO $pdo;

public function __construct(){

	$this->pdo = new PDO('mysql:host=localhost;dbname=notes','root', 'root');
	$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

public function getNotes(){
$statement = $this->pdo->prepare("SELECT * FROM notes ORDER BY create_date DESC");
$statement->execute();
return $statement->fetchAll(PDO::FETCH_ASSOC);

}

public function getNoteInfoById($id){
	$statement = $this->pdo->prepare("SELECT title, description, create_date FROM notes WHERE id=:id");
	$statement->bindValue('id', $id);
	$statement->execute();
	return $statement->fetchAll(PDO::FETCH_ASSOC);
}

public function addNote($note){

	$statement = $this->pdo->prepare("INSERT INTO notes 
										(title, description, create_date) 
										VALUES 
										(:title, :description, :date)");
	$statement->bindValue('title', $note['noteName']);
	$statement->bindValue('description', $note['noteText']);
	$statement->bindValue('date', date('Y--m-d H:i:s') );


	$statement->execute();

}

public function deleteNote($id){

	$statement = $this->pdo->prepare("DELETE FROM notes WHERE id=:id");
	$statement->bindValue('id', $id);
	$statement->execute();

}

public function updateNote($name, $text, $id){
	$statement = $this->pdo->prepare("UPDATE notes SET title=:name,description=:text WHERE id=:id");
	$statement->bindValue('name', $name);
	$statement->bindValue('text', $text);
	$statement->bindValue('id', $id);
	$statement->execute();

}

}

?>

