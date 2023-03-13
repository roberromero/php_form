<?php


include './partials/header.php'; //PHP header CODE

require_once 'dbConnect.php';

$connection = new Connection;
$notes = $connection->getNotes();

?>
<div class="container mt-4 d-flex">
  <!--FORM-->
  <form class="container" method="post" action="newToDoSql.php" novalidate>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Note name</label>
      <input type="email" 
             class="form-control"
             name="noteName"
             placeholder="Note name">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Note description</label>
      <textarea class="form-control"
                name="noteText"
                rows="3"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Save</button>
</form>
  <!--CARDS-->
  <div class="container">

  <?php foreach($notes as $note): ?>
    <div class="card mb-2" style="width: 18rem;">
     <div class="card-body" style="background-color: var(--bs-blue);color: var(--bs-body-bg);">
        <form action="deleteToDoSql.php" method="post">
          <input type="hidden" 
                 name= "id"
                 value="<?php echo $note['id']?>"
                 >
          <button type="submit" class="btn-close" aria-label="Close" style="background-color:aliceblue;right: 0; margin: -10px 5px; position:absolute;"></button>
        </form>
        <h5 class="card-title"> <?php echo $note['title'] ?> </h5>
        <p class="card-text"><?php echo $note['description'] ?></p>
        <form class="d-inline-block" action="updateToDoSql.php" method="post">
          <input type="hidden"
                 name="id"
                 value="<?php echo $note['id']?>">
          <button class="btn btn-primary" type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/></svg>
          </button>
        </form>
        <a href="#" class="card-link text-decoration-none" style="font-size:0.8rem;color: var(--bs-body-bg);text-align: right;display:inline-block;width: 80%;"><?php echo $note['create_date'] ?></a>
      </div>
    </div>
  <?php endforeach; ?>

  </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>