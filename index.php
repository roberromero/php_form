<?php
 //SESSION (always before HTML code) 
 session_start();
  $_SESSION['counter'] ?? 0; //if 'counter' does not exist, it is initiated as 0
  $_SESSION['counter']++;

  //COOKIES (a piece of data stored in computer) 4KB maximum
  setcookie('name', 'ojalaSpanishAcademy', time() + 60, '/');

  //FILES VALIDATION
  $fileErrors = "";
  if(isset($_FILES['file'])){
    $file = $_FILES['file']; //Guardamos objeto en variable
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION); //Función php que devuelve la extensión en string
    if($file['name'] != ''){
      // echo '<pre>';
      // var_dump($_FILES);
      // echo '</pre>';
        if(!in_array($ext, ['png', 'jpg', 'jpge', 'svg'])){//Función que chequea 
          $fileErrors = "File extension not sopported";
            }elseif($file['size'] > 204800){//BITES
              $fileErrors = "A maximum of 200KB File Size sopported";
            }else{
              move_uploaded_file($_FILES['file']['tmp_name'], $_FILES['file']['name']);
              $fileErrors = "File has been uploaded";
            }
    }else{
      $fileErrors = "A file needs to be chosen";
    }
    
    
  }
  
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar bg-primary navbar-expand-lg " data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
    <?php

   //CONSTANT AND VARIABLES
    define("REQ", "This field is required");
    define("DIFFERENT", "Password and Repeat Password are different");
    define("HIGHER", "At least 6 characters are needed");
    $username = '';
    $email = '';
    $password = '';
    $repeat_password = '';
    $cv_link = '';
    $error_array = [];
    
  //POST METHOD for form
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $repeat_password = $_POST['repeat_password'];
      $cv_link = $_POST['cv_link'];

      //SHOWS THE FORM
      // echo '<pre>';
      //   var_dump($username, $email, $password, $repeat_password, $cv_link);
      // echo '</pre>';

      //CONTROLS INVALID DATA
      if(!$username){ 
        //It enters if username is an empty string
        $error_array['username'] = REQ;
        // $error_array['username'] = "Required field";
      }elseif(strlen($username)<6 || strlen($username)>20){
        $error_array['username'] = "Username only between 6 and 20 characters";
      }

      if(!$email){
        $error_array['email'] = REQ;
      }

      if(!$password){
        $error_array['password'] = REQ;
      }elseif(strcmp($password, $repeat_password)){
        $error_array['password'] = "Your passwords do not match";
      }

      if(!$repeat_password){
        $error_array['repeat_password'] = REQ;
      }

      if(!$cv_link){
        $error_array['cv_link'] = REQ;
      }elseif(filter_var($cv_link, FILTER_VALIDATE_URL) === false){
        $error_array['cv_link'] = "URL needs to be valid";
      }
    }
    
    ?>


  <div class="container mt-5">
    <!--SESSION AND COOKIES-->
    <div class="card w-100 text-center" style="width: 18rem;">
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Session ID: <b><?php echo session_id() ?></b></li>
        <li class="list-group-item">You have entered <b><?php echo $_SESSION['counter'] ?></b> times in this website</li>
        <li class="list-group-item">Cookie name is : <b><?php echo $_COOKIE['name'] ?></b></li>
      </ul>
    </div>
    <!--FORM-->
    <form class="needs-validation" action="" method="post" novalidate> <!-- post method added -->
      <div class="row">
        <div class="col">
          <label for="username" class="form-label">Username</label>
          <input type="text"
                  class="form-control <?php echo $error_array['username'] ? 'is-invalid' : '' ?>" 
                  name="username"
                  placeholder="Username"
                  required>
          <div class="invalid-feedback">
            <?php echo $error_array['username'] ?>
          </div>
        </div>

        <div class="col">
          <label for="email" class="form-label">Email</label>
          <input type="email"
                  class="form-control <?php echo $error_array['email'] ? 'is-invalid' : '' ?>"
                  name="email"
                  placeholder="name@example.com">
          <div class="invalid-feedback">
            <?php echo $error_array['email'] ?>
          </div>
        </div>
        
      </div>
      <div class="row">
        <div class="col">
          <label for="password" class="form-label">Password</label>
          <input type="password" 
                  class="form-control <?php echo $error_array['password'] ? 'is-invalid' : '' ?>"
                  name="password">
          <div class="invalid-feedback">
            <?php echo $error_array['password'] ?>
          </div>
        </div>
        <div class="col">
          <label for="repeat_password" class="form-label">Repeat Password</label>
          <input type="password" 
                  class="form-control <?php echo $error_array['repeat_password'] ? 'is-invalid' : '' ?>"
                  name="repeat_password">
          <div class="invalid-feedback">
            <?php echo $error_array['repeat_password'] ?>
          </div>
        </div>
      </div>
      <div class="row">
      <div class="col">
          <label for="cv_link" class="form-label">Your CV Link</label>
          <input type="text"
                  class="form-control <?php echo $error_array['cv_link'] ? 'is-invalid' : '' ?>"
                  name="cv_link" 
                  placeholder="https://www.example.com/my-cv">
          <div class="invalid-feedback">
            <?php echo $error_array['cv_link'] ?>
          </div>
        </div>
      </div>
      <div class="row-auto">
        <button type="submit"
                class="btn btn-primary">Register</button>
      </div>
    </form>
    <!--FILE INPUT-->
    <form class="mb-3 mt-5" method="post" enctype="multipart/form-data">
      <label for="formFile" class="form-label">File input example</label>
      <input class="form-control <?php echo $fileErrors==='' ? '' : 'is-invalid' ?>" type="file" id="formFile" name="file"> <!--attribute 'name' needs adding "IMPORTANT"-->
      <div class="invalid-feedback">
              <?php echo $fileErrors?>
      </div>
      <button class="btn btn-primary mt-2">Submit</button>
    </form>
  </div>
 


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>