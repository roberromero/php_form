<?php
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

 include './partials/header.php'
?>
<div class="container mt-5">
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