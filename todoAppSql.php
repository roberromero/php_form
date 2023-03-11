<?php include './partials/header.php'; //PHP header CODE

require_once 'dbConnect.php';

$newPdo = new connPdo();
$newPdo->connDb();
echo '<pre>';
var_dump($newPdo);
echo '</pre>';
?>

<div class="container mt-4 d-flex">
  <!--FORM-->
  <div class="container">
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email address</label>
      <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Save</button>
  </div>
  <!--CARDS-->
  <div class="container">

    <div class="card mb-2" style="width: 18rem;">
     <div class="card-body">
        <button type="button" class="btn-close" aria-label="Close" style="right: 0; margin: -10px 5px; position:absolute;"></button>
        <h5 class="card-title">Note title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="card-link">date</a>
      </div>
    </div>


  </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>