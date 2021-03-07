<?php
require("./assets/config.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./assets/favicon.ico">

    <title>Chegs Pharm File Upload</title>

    <!-- Bootstrap core CSS -->
    <link href="./dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/floating-labels.css" rel="stylesheet">
  </head>

  <body>
      <form method="POST" enctype="multipart/form-data" id="proImage" name="proImage" class="form-signin">
        <div class="text-center mb-4">
        <!-- <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
        <h1 class="h3 mb-3 font-weight-normal">Upload A new Product</h1>
        <h2><a href="Javascript:void(0)" onclick="goBack()"><img src="../display/images/image-removebg-preview.png" alt="Back" width="200" height="auto"></a></h2>
      </div>

      <div class="form-label-group">
        <input type="text" id="title" name="title" class="form-control" placeholder="Design Title" required autofocus>
        <label for="title">Product Title</label>
      </div>

      <div class="form-label-group">
        <input type="text" id="BannerText" name="BannerText" class="form-control" placeholder="Banner Text" required autofocus>
        <label for="BannerText">Banner Text</label>
        <p><small class='text-danger'>(if you decide to make this picture a website banner slider, what text should be shown on it?) Add a word inbetween the span tag to Mark it as a keywork eg. <code>&lt;span&gt;Design&lt;/span&gt;</code></small></p>

      </div>

      <div class="form-label-group">
        <textarea type="text" id="desc" name="desc" class="form-control" placeholder="Design Description" required></textarea>
      </div>
      <div class="form-label-group">
        <input type="file" accept="image/*" id="fileuplaod" name="fileuplaod" class="form-control" placeholder="Design for Upload" required>
        <label for="fileuplaod">Product image Upload</label>
      </div>
      <div class="form-label-group">
        <select  id="category" name="category" class="form-control" placeholder="Image category" required>
          <option value="">Select One</option>
          <?php
          $query = mysqli_query($con,"SELECT * FROM categories ORDER BY RAND() ");
          while ($row = mysqli_fetch_assoc($query)) {
            extract($row);
          echo
          "<option value='$texty'>$texty</option>";}
          ?>
        </select>
        <!-- <label for="category">Image category</label> -->
      </div>

      <button class="btn btn-lg btn-primary btn-block" type="submit">Upload</button>
      <p class="mt-5 mb-3 text-muted text-center">&copy; DozeeyNightingale -2021</p>
    </form>

    <script>
      function goBack() {
        window.history.back();
      }
      </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
        //select picture

$(document).ready(function(e){

$("#proImage").on("submit", function(e) {
e.preventDefault();
$.ajax({
url: "./ajax.php?upload_prophoto",
type: "POST",
data: new FormData(this),
contentType: false,
cache: false,
processData: false,
success: function(msg) {
  if (msg == 'success') {
    alert( " Photo Uploaded Successfully!!");
  window.location="./"
  } else if (msg == "invalid") {
    alert( "Error: Invalid image format.");
  } else if (msg == "nofile") {
    alert( "Error: No file selected.");
  } else {
    alert( "Error: Failed to Uploaded Photo.");
    console.log(msg);
  }
}
});
});
});

</script>  
  </body>
</html>
