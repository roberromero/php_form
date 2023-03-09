<?php include './partials/header.php'; //PHP header CODE


  if(file_exists('toDo.json')){
    $jsonData = file_get_contents("toDo.json");
    $data = json_decode($jsonData, true);
  }else{?>
    <div class="alert alert-primary" role="alert">
        There is no tasks recorded
    </div>
<?php } ?>


<div class="container mt-4 w-50">
  <form action="newToDo.php" method="post" class="row g-3" novalidate>
    <div class="col-auto">
      <label for="inputPassword2" class="visually-hidden">new task</label>
      <input
        type="text"
        class="form-control"
        name="nameTask"
        placeholder="Password"
      />
    </div>
    <div class="col-auto">
      <button type="submit" class="btn btn-primary mb-3">Add New Task</button>
    </div>
  </form>

  <div class="list-group text-center">
    <?php
    foreach ($data as $key => $value): ?>
        <div class="list-group-item list-group-item-action d-flex align-items-center justify-content-between" style="cursor:pointer;">
          <form class="form-check form-switch" method="post" action="taskStatus.php">
            <input class="form-check-input" 
                   type="checkbox"
                   name="taskStatus" 
                   <?php echo $value['completed'] ? 'checked' : '' ?>
            />
          </form>
          <a class=<?php echo $value['completed'] ? 'text-decoration-line-through' : 'text-decoration-none' ?> style="color: var(--bs-list-group-color);"><?php echo $key ?></a>
          <form class="row g-3" action="deletePost.php" method="post" novalidate>
            <input
              type="text"
              name="nameTaskDelete"
              value= <?php echo urlencode($key) ?>
              hidden  
            />
            <div class="col-auto">
              <button type="submit" class="btn btn-danger">Delete</button>
            </div>
          </form>
        </div>
        
    <?php endforeach; ?>
  </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>