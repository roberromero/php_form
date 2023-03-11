<?php


class connPdo{


    public function connDb() {
        $result = null;
        try {
            $username = "root";
            $password = "root";
            $conn = new PDO("mysql:host=localhost;dbname=notes", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
            $sql = "SELECT id, title, description FROM notes";
            $result = $conn->prepare($sql);
            $result->execute();
            $result->fetchAll(PDO:: FETCH_ASSOC);
            
         
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
          return $result;
    }


}





?>