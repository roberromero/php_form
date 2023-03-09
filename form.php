
<?php
    include './partials/header.php';
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
    <!--FORM-->
    <form class="needs-validation mt-5" action="" method="post" novalidate> <!-- post method added -->
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
                class="btn btn-primary mt-2">Register</button>
      </div>
    </form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>