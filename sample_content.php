<?php
include("includes/db.php");
if (isset($_GET['edit'])) {
    $edit_image=$_GET['edit'];
     $query="SELECT image FROM posts WHERE id=$edit_image";
$select_image=mysqli_query($connection,$query);
if (!$select_image) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }  
while($row=mysqli_fetch_array($select_image)) {
  $image=$row['image'];
}
}

if (isset($_POST['upload_photo'])) {

               //$image=$_POST['image'];
   //  $post_image=$_FILES['image']['name'];
   // $post_image_temp=$_FILES['image']['tmp_name'];
   
  //  unlink('gallery/$post_image');
  //  move_uploaded_file($post_image_temp,"gallery/$post_image");
  //  $query="UPDATE posts SET image='$post_image' WHERE id={$update_id}";
  // $updated_query=mysqli_query($connection,$query);
  //  if (!$updated_query) {
  //   printf("Error: %s\n", mysqli_error($connection));
  //   exit();
  // }        
$img = $_POST['base64image'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$file = 'image.png';
$success = file_put_contents($file, $data);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title></title>

  <!-- Custom fonts for this template-->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="css/style.css" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
   <link href="css/sb-admin.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/cropper.css">
  <link rel="stylesheet" href="css/main.css">
  </head>

<body id="page-top">
	 <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">BlockChain</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      
    </button>

    <!-- Navbar Search -->
   <!--  <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"> -->
    <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
       
        <div class="input-group-append">
          
        </div>
      </div>
    </div>
 <ul class="navbar-nav">
      
      
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
         <label></label>
          <a class="dropdown-item" href="#">Edit My Profile</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>
  <div id="wrapper">
  <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="Editmedia.php">
          <i class="fa fa-palette"></i>
          <span>Dashboard</span>
        </a>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-thumb-tack"></i>
          <span>Post</span>
        </a>
        <div class="dropdown-menu" id="pages" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">All post</a>
          <a class="dropdown-item" href="#">Add new</a>
         <a class="dropdown-item" href="#">Categories</a>
         <a class="dropdown-item" href="#">Tags</a>
         
          </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <i class="fa fa-file"></i>
          <span>Pages</span>
        </a>
        <div class="dropdown-menu" id="pages" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">All Pages</a>
          <a class="dropdown-item" href="#">Add new</a>
          </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fa fa-comments"></i>
          <span>Commets</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user"></i>
          <span>Users</span>
        </a>
        <div class="dropdown-menu" id="pages" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">All users</a>
          <a class="dropdown-item" href="#">Add new</a>
         <a class="dropdown-item" href="#">Your Profile</a>
          </div>
    </ul>
      <div class="container-fluid">
      <a class="navbar-brand" href="alluser.php"><h6>Edit Image</h6></a>
  <div class="container">
    <div class="row">

      <div class="col-md-8">
        <form action="" method="post" enctype="multipart/form-data">
        <div class="img-container">
           
          <!-- <img src="img/gallery/imgbox1.jpg" alt="Picture"> -->
         <?php
   echo '
    <img src="gallery/'.$image.'"  id="image" name="image">
    ';
 
  ?>
  <!-- <input type="file" name="image"> -->
          
         <!--  <?php //echo "<img src="gallery/'.$image.'" alt="Picture">"   ?> -->
        </div>
         <input type="submit" name="upload_photo"  value="Upload">
        </form>      
      </div>
      <script type="text/javascript">
        
        var base64image = $('#image').attr('src');
      </script>
      <div class="col-md-3">
        <div class="docs-data">
           <div class="input-group input-group-sm">
            <span class="input-group-prepend">
              <label class="input-group-text" for="dataX">X</label>
            </span>
            <input type="text" class="form-control" id="dataX" placeholder="x">
            <span class="input-group-append">
              <span class="input-group-text">px</span>
            </span>
          </div>
          <div class="input-group input-group-sm">
            <span class="input-group-prepend">
              <label class="input-group-text" for="dataY">Y</label>
            </span>
            <input type="text" class="form-control" id="dataY" placeholder="y">
            <span class="input-group-append">
              <span class="input-group-text">px</span>
            </span>
          </div>
          <div class="input-group input-group-sm">
            <span class="input-group-prepend">
              <label class="input-group-text" for="dataWidth">Width</label>
            </span>
            <input type="text" class="form-control" id="dataWidth" placeholder="width">
            <span class="input-group-append">
              <span class="input-group-text">px</span>
            </span>
          </div>
          <div class="input-group input-group-sm">
            <span class="input-group-prepend">
              <label class="input-group-text" for="dataHeight">Height</label>
            </span>
            <input type="text" class="form-control" id="dataHeight" placeholder="height">
            <span class="input-group-append">
              <span class="input-group-text">px</span>
            </span>
          </div>
          <div class="input-group input-group-sm">
            <span class="input-group-prepend">
              <label class="input-group-text" for="dataRotate">Rotate</label>
            </span>
            <input type="text" class="form-control" id="dataRotate" placeholder="rotate">
            <span class="input-group-append">
              <span class="input-group-text">deg</span>
            </span>
          </div>
          <div class="input-group input-group-sm">
            <span class="input-group-prepend">
              <label class="input-group-text" for="dataScaleX">ScaleX</label>
            </span>
            <input type="text" class="form-control" id="dataScaleX" placeholder="scaleX">
          </div>
          <div class="input-group input-group-sm">
            <span class="input-group-prepend">
              <label class="input-group-text" for="dataScaleY">ScaleY</label>
            </span>
            <input type="text" class="form-control" id="dataScaleY" placeholder="scaleY">
          </div>
        </div>
      </div>
    <div class="row" id="actions">
      <div class="col-md-9 docs-buttons">
        <div class="btn-group">
          <button type="button" class="btn btn-primary" data-method="move" data-option="-10" data-second-option="0" title="Move Left">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.move(-10, 0)">
              <span class="fa fa-arrow-left"></span>
            </span>
          </button>
          <button type="button" class="btn btn-primary" data-method="move" data-option="10" data-second-option="0" title="Move Right">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.move(10, 0)">
              <span class="fa fa-arrow-right"></span>
            </span>
          </button>
          <button type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="-10" title="Move Up">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.move(0, -10)">
              <span class="fa fa-arrow-up"></span>
            </span>
          </button>
          <button type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="10" title="Move Down">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.move(0, 10)">
              <span class="fa fa-arrow-down"></span>
            </span>
          </button>
        </div>

        <div class="btn-group">
          <button type="button" class="btn btn-primary" data-method="rotate" data-option="-45" title="Rotate Left">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.rotate(-45)">
              <span class="fa fa-undo-alt"></span>
            </span>
          </button>
          <button type="button" class="btn btn-primary" data-method="rotate" data-option="45" title="Rotate Right">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.rotate(45)">
              <span class="fa fa-redo-alt"></span>
            </span>
          </button>
        </div>

        <div class="btn-group">
          <button type="button" class="btn btn-primary" data-method="scaleX" data-option="-1" title="Flip Horizontal">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.scaleX(-1)">
              <span class="fa fa-arrows-alt-h"></span>
            </span>
          </button>
          <button type="button" class="btn btn-primary" data-method="scaleY" data-option="-1" title="Flip Vertical">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.scaleY(-1)">
              <span class="fa fa-arrows-alt-v"></span>
            </span>
          </button>
        </div>
        <div class="btn-group">
          <button type="button" class="btn btn-primary" data-method="reset" title="Reset">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.reset()">
              <span class="fa fa-sync-alt"></span>
            </span>
          </button>
          <label class="btn btn-primary btn-upload" for="inputImage" title="Upload image file">
            <!-- <form action="" method="post" enctype="multipart/form-data"> -->
            <input type="file" class="sr-only" id="inputImage" name="file" accept="image/*">
            <span class="docs-tooltip" data-toggle="tooltip" title="Import image with Blob URLs">
              <!-- <span class="fa fa-upload"></span> -->
              <!-- <input type="submit" name="upload_photo"  value="Upload"> -->
            </span>
          <!-- </form> -->
          </label>
        </div>

        <div class="btn-group btn-group-crop">
          <button type="button" class="btn btn-success" data-method="getCroppedCanvas" data-option="{ &quot;maxWidth&quot;: 4096, &quot;maxHeight&quot;: 4096 }">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.getCroppedCanvas({ maxWidth: 4096, maxHeight: 4096 })">
              Get Cropped Canvas
            </span>
          </button>
          <button type="button" class="btn btn-success" data-method="getCroppedCanvas" data-option="{ &quot;width&quot;: 160, &quot;height&quot;: 90 }">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.getCroppedCanvas({ width: 160, height: 90 })">
              160&times;90
            </span>
          </button>
          <button type="button" class="btn btn-success" data-method="getCroppedCanvas" data-option="{ &quot;width&quot;: 320, &quot;height&quot;: 180 }">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.getCroppedCanvas({ width: 320, height: 180 })">
              320&times;180
            </span>
          </button>
        </div>

        <!-- Show the cropped image in modal -->
        <div class="modal fade docs-cropped" id="getCroppedCanvasModal" role="dialog" aria-hidden="true" aria-labelledby="getCroppedCanvasTitle" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="getCroppedCanvasTitle">Cropped</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body"></div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                <a class="btn btn-primary" id="download" href="javascript:void(0);" download="cropped.jpg">Download</a>
              </div>
            </div>
          </div>
        </div><!-- /.modal -->
      <div class="col-md-3 docs-toggles">
        <!-- <h3>Toggles:</h3> -->
        <div class="btn-group d-flex flex-nowrap" data-toggle="buttons">
          <label class="btn btn-primary active">
            <input type="radio" class="sr-only" id="aspectRatio1" name="aspectRatio" value="1.7777777777777777">
            <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: 16 / 9">
              16:9
            </span>
          </label>
          <label class="btn btn-primary">
            <input type="radio" class="sr-only" id="aspectRatio2" name="aspectRatio" value="1.3333333333333333">
            <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: 4 / 3">
              4:3
            </span>
          </label>
          <label class="btn btn-primary">
            <input type="radio" class="sr-only" id="aspectRatio3" name="aspectRatio" value="1">
            <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: 1 / 1">
              1:1
            </span>
          </label>
          <label class="btn btn-primary">
            <input type="radio" class="sr-only" id="aspectRatio4" name="aspectRatio" value="0.6666666666666666">
            <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: 2 / 3">
              2:3
            </span>
          </label>
          <label class="btn btn-primary">
            <input type="radio" class="sr-only" id="aspectRatio5" name="aspectRatio" value="NaN">
            <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: NaN">
              Free
            </span>
          </label>
        </div>
      </div>
    </div>
  </div>
</div>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
 <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/cropper.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
