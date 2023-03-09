<?php
 //SESSION (always before HTML code) 
 session_start();
  $_SESSION['counter'] ?? 0; //if 'counter' does not exist, it is initiated as 0
  $_SESSION['counter']++;

  //COOKIES (a piece of data stored in computer) 4KB maximum
  setcookie('name', 'ojalaSpanishAcademy', time() + 60, '/'); 
?>

<?php include 'partials/header.php' //PHP header CODE?>




  <div class="container mt-5">
    <!--SESSION AND COOKIES-->
    <div class="container">
      <div class="card text-center" style="width: 50%; margin: 0 auto;">
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Session ID: <b><?php echo session_id() ?></b></li>
          <li class="list-group-item">You have entered <b><?php echo $_SESSION['counter'] ?></b> times in this website</li>
          <li class="list-group-item">Cookie name is : <b><?php echo $_COOKIE['name'] ?></b></li>
        </ul>
      </div>
    </div>
  </div>
 


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>