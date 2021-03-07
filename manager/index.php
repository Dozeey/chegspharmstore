<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./assets/favicon.ico">
    <!-- <script src="https://use.fontawesome.com/5e503ffca0.js"></script> -->

    <title>Chegs Pharm manager</title>

    <!-- Bootstrap core CSS -->
    <link href="./dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/album.css" rel="stylesheet">
  </head>

  <body>

    <header>
      <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
          <a href="#" class="navbar-brand d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
            <strong>Chegs Pharm</strong>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>

    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Manager</h1>
          <p class="lead text-muted"> Here you can manage your products</p>
        </p>
          <p>
            <a href="../" class="btn btn-primary my-2">Back to Home </a>
            <a href="./upload.php" class="btn btn-success my-2 btn-lg">Upload New</a>
            <a href="#" data-target='#Categories' data-toggle='modal' class="btn btn-info my-2 ">Manage Categories</a>
          </p>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">

          <?php
require("./assets/config.php");

$query = mysqli_query($con,"SELECT * FROM images ");
while ($row = mysqli_fetch_assoc($query)) {
  extract($row);
  if ($featured=="yes") {
$btn1=" Remove from Latest Designs";
  } else {
    $btn1="Add to Latest Designs";
  }
  if ($banner=="yes") {
    $btn2="Remove from banner slider";
      } else {
        $btn2="Add to banner slider ";
      }
      if ($thumbnail !="yes") {
        $btn3="<a type='button' class='btn btn-sm btn-outline-warning' href='javascript:void(0);'onclick='makeThumbnail($id);'>Assign as <b style='color:blue'>$category</b> Category Thumbnail</a>";
          } else {
            $btn3=" <button type='button' class='btn btn-sm btn-outline-info'>This is the Current <b class='text-warning'>$category</b> Category Thumbnail</button>
            ";
          }
          echo 
            "<div class='col-md-4'>
              <div class='card mb-4 box-shadow'>
               <a href='#' type='button' data-target='#viewPic_$id' data-toggle='modal'><img class='card-img-top' src='$imagepath' alt='$title'></a>
                <div class='card-body'>
                <h4 class='card-title'>$title</h4>                    <small class='text-muted'>cat: $category </small>

                <p class='card-text'>$imagedesc</p>
                  <div class='d-flex justify-content-between align-items-center'>
                    <div class='btn-group'>";
                      // <button type='button' data-target='#viewPic_$id' data-toggle='modal' class='btn btn-sm btn-outline-info'>View</button> 
                      echo"<button type='button' data-target='#edit-card-details_$id' data-toggle='modal' class='btn btn-sm btn-outline-warning'>Edit</button>
                      <a type='button' class='btn btn-sm btn-outline-danger' href='javascript:void(0);'onclick='deleteImage($id);'>Delete</a>
                    </div>
                    <small class='text-muted'> $upload_date</small>
                  </div>
                </div>
              </div>
            </div>";
echo 
"          <!-- Edit Card Details Modal
================================== -->
<div id='edit-card-details_$id' class='modal fade' role='dialog' data-backdrop='static' data-keyboard='false' tabindex='-1' aria-hidden='true'>
  <div class='modal-dialog modal-dialog-centered' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title font-weight-400'>$title &nbsp;&nbsp;&nbsp; ID: $imageid </h5>
        <button type='button' class='close font-weight-400 btn-danger' data-dismiss='modal' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button>
      </div>
      <div class='modal-body p-4'>
      <form method='POST' id='proImage$id' name='proImage' class='form-signin'>
      <div class='form-group'>
      <label for='editTitle'>Design Title</label>
      <div class='input-group'>
      <input type='text' class='form-control' data-bv-field='editTitle' id='editTitle'  name='editTitle' value='$title' placeholder='Design Title'>
      <input type='hidden' class='form-control' data-bv-field='imageId' id='imageId'  name='imageId' value='$id' hidden>
      </div>
    </div>
    <div class='form-group'>
    <label for='editBannerText'>Banner Text <small class='text-danger'>(if you decide to make this picture a website banner slider, what text should be shown on it?)</small>Add a word inbetween the span tag to Mark it as a keywork eg. <code>&lt;span&gt;Design&lt;/span&gt;</code></small></label>
    <div class='input-group'>
    <input type='text' class='form-control' data-bv-field='editBannerText' id='editBannerText'  name='editBannerText' value='$bannertext'maxlenght='100' placeholder='Banner Text'>
    </div>
  </div>
<div class='form-group'>
                <label for='editCat'>Edit Category</label>
                <select  id='editCat' name='editCat'  class='form-control' data-bv-field='editCat' required value='expire'>
                <option value=''>Select One</option>";
                
$query2 = mysqli_query($con,"SELECT * FROM categories ORDER BY RAND() ");
while ($text = mysqli_fetch_assoc($query2)) {
  extract($text);
echo
"<option value='$texty'>$texty</option>";}

      echo "
                 </select>     
              </div>
          <div class='form-group'>
            <label for='editDesc'>Image description</label>
            <textarea type='text' class='form-control' data-bv-field='editDesc' id='editDesc' name='editDesc' required placeholder='Description'>$imagedesc</textarea>
          </div>
          <input type='submit' class='btn btn-success' Value='Update Changes'>
</form>
          <div class='form-group'>
            <label for='options'>Image options</label> <br>
            <a type='button' class='btn btn-sm btn-outline-warning' href='javascript:void(0);'onclick='makeLatest($id);'>$btn1</a>
            <a type='button' class='btn btn-sm btn-outline-warning' href='javascript:void(0);'onclick='makeBanner($id);'>$btn2</a>".
            // $btn3
            "<a type='button' class='btn btn-sm btn-outline-danger' href='javascript:void(0);'onclick='deleteImage($id);'>Delete</a>
            </div>
      </div>
    </div>
  </div>
</div>
<!-- Add New Card Details Modal
================================== -->
";
// echo 
// "          
// <!-- View Picture
// ================================== -->
// <div id='viewPic_$id' class='modal fade' role='dialog' data-backdrop='static' data-keyboard='false' tabindex='-1' aria-hidden='true'>
//   <div class='modal-dialog modal-dialog-centered' role='document' modal-xl>
//     <div class='modal-content'>
//       <div class='modal-header'>
//         <h5 class='modal-title font-weight-400'>$title &nbsp;&nbsp;&nbsp; ID: $imageid </h5>
//         <button type='button' class='close font-weight-400' data-dismiss='modal' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button>
//       </div>
// <img src='$imagepath' class='img-fluid'/>
//       </div>
//   </div>
// </div>
// ";
}
          ?>




<div id='Categories' class='modal fade' role='dialog' data-backdrop='static' data-keyboard='false' tabindex='-1' aria-hidden='true'>
  <div class='modal-dialog modal-dialog-centered' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title font-weight-400'>Manage Categories </h5>
        <button type='button' class='close font-weight-400 btn-danger' data-dismiss='modal' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button>
      </div>
      <div class='modal-body p-4'>
      <form method='POST' id='newcat' name='newcat' class='form-signin'>
      <div class='form-group'>
      <label for='texty'>New Category</label>
      <div class='input-group'>
      <input type='text' class='form-control' data-bv-field='texty' id='texty'  name='texty' value='' placeholder='New Category'>
      </div>
    </div>
    <div class='form-group'>
    <label for='catlogo'>Category logo <small class='text-danger'>(An image that will be displayed in the website to represent this category)</small></label>
    <div class='input-group'>
    <input type='file' accept="image/*" class='form-control' data-bv-field='catlogo' id='catlogo'  name='catlogo' placeholder='Category logo'>
    </div>
  </div>
          <input type='submit' class='btn btn-success' Value='Update Changes'>
</form>
<br><br>
<table class="table">
  <thead class="thead-dark">
    
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category</th>
      <th scope="col">Logo</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody> 
<?php
$query2 = mysqli_query($con,"SELECT * FROM categories ORDER BY RAND() ");
while ($text = mysqli_fetch_assoc($query2)) {
  extract($text);

      echo "
    <tr>
      <th scope='row'>1</th>
      <td>$texty</td>
      <td><img src='../$logo' height='100px' width='auto'></td>
      <td>
      <a type='button' class='btn btn-sm btn-outline-danger' href='javascript:void(0);'onclick='deleteLogo($id);'>Delete</a>
      </td>
    </tr>";}

    ?>
  </tbody>
</table>


      </div>
    </div>
  </div>
</div>
<!-- Add New Card Details Modal
================================== -->

          </div>
        </div>
      </div>

    </main>

    <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a href="#">Back to top</a>
        </p>
        <p>Here you can manage your graphics files</p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="./assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="./dist/js/bootstrap.bundle.js"></script>
    <script>
function deleteImage(id){
  var answer = confirm("SURE TO   DELETE  THIS IMAGE?" +" NOTE THIS WILL REMOVE THE TITLE, DESCRIPTION AND ANY OTHER TAGS HOLD FOR THIS IMAGE");
    if(answer){
        var answer2 = confirm("SURE TO DELETE THIS IMAGE?");
        if(answer2){
        $.ajax({
            url: './ajax.php?',
            type: "POST",
            data: {
                'deleteImage' : id,
            },
            success : function(response) { 
                alert('IMAGE  DELETED ');
                // window.location="account_holders.php";
                console.log(response);
                location.reload()
            },
            error : function() {                                                
            },
            complete : function() {
            }

        });
    }
}
}
function deleteLogo(id){
  var answer = confirm("YOU ARE ABOUT TO   DELETE  THIS CATEGORY. CONTINUE?");
    if(answer){
        var answer2 = confirm("SURE TO DELETE THIS CATEGORY?");
        if(answer2){
        $.ajax({
            url: './ajax.php?',
            type: "POST",
            data: {
                'deleteLogo' : id,
            },
            success : function(response) { 
                alert('CATEGORY  DELETED ');
                // window.location="account_holders.php";
                console.log(response);
                location.reload()
            },
            error : function() {                                                
            },
            complete : function() {
            }

        });
    }
}
}
function makeBanner(id){
  var answer = confirm("SURE TO PERFORM THIS OPERATION?");
    if(answer){
        $.ajax({
            url: './ajax.php?',
            type: "POST",
            data: {
                'makeBanner' : id,
            },
            success : function(response) { 
                alert('IMAGE SETTINGS UPDATED ');
                // window.location="account_holders.php";
                console.log(response);
                location.reload()
            },
            error : function() {                                                
            },
            complete : function() {
            }

        });
}
}
function makeLatest(id){
  var answer = confirm("SURE TO PERFORM THIS OPERATION?");
    if(answer){
        $.ajax({
            url: './ajax.php?',
            type: "POST",
            data: {
                'makeLatest' : id,
            },
            success : function(response) { 
                alert('IMAGE SETTINGS UPDATED ');
                // window.location="account_holders.php";
                console.log(response);
                location.reload()
            },
            error : function() {                                                
            },
            complete : function() {
            }

        });
}
}
function makeThumbnail(id){
  var answer = confirm("SURE TO PERFORM THIS OPERATION?");
    if(answer){
        $.ajax({
            url: './ajax.php?',
            type: "POST",
            data: {
                'makeThumbnail' : id,
            },
            success : function(response) { 
                alert('IMAGE SETTINGS UPDATED ');
                // window.location="account_holders.php";
                console.log(response);
                location.reload()
            },
            error : function() {                                                
            },
            complete : function() {
            }

        });
}
}

$(document).ready(function(e){
  newcat = $('[name="newcat"]');
$(newcat).on("submit", function(e) {
e.preventDefault();
$.ajax({
url: "./ajax.php?Newcat",
type: "POST",
data: new FormData(this),
contentType: false,
cache: false,
processData: false,
success: function(msg) {
  if (msg == 'success') {
    alert( " Category Added Successfully!!");
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

proImage = $('[name="proImage"]');
$(proImage).on("submit", function(e) {
e.preventDefault();
$.ajax({
url: "./ajax.php?EditPhoto",
type: "POST",
data: new FormData(this),
contentType: false,
cache: false,
processData: false,
success: function(msg) {
  if (msg == 'success') {
    alert( " Changes Saved Successfully!!");
  window.location="./"
  }  else {
    alert( "Error: Failed to Saved Changes  .");
    console.log(msg);
  }
}
});
});


});

    </script>
  </body>
</html>
