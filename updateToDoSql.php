<?php
include './partials/header.php'; //PHP header CODE


require_once './dbConnect.php';

// $noteInfo = new Connection();
// $note = $noteInfo->getNoteInfoById($_POST['id']);

?>
<div class="container mt-4 d-flex w-50">
  <!--FORM-->
  <form class="container" method="post" action="updateToDoSqlRequest.php" novalidate>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Note name</label>
      <input type="email" 
             class="form-control"
             name="noteName"
             placeholder="Note name">
             
      </input>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Note description</label>
      <textarea class="form-control"
                name="noteText"
                rows="3"></textarea>
      </div>
      <input type="hidden" name="noteId" value="<?php echo $_POST['id'] ?>">
      <button type="submit" class="btn btn-primary">Update</button>
    </form> 
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>