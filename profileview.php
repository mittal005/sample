<?php  
 $connect = mysqli_connect("localhost", "root", "", "admin");  
 if(isset($_POST["insert"]))  
 {  
      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
      $query = "INSERT INTO newuser(image) VALUES ('$file')";  
      if(mysqli_query($connect, $query))  
      {  
           echo '<script>alert("Image Inserted into Database")</script>';  
      }  
 }  
 ?>
<?php include("includes/header.php"); ?>
<body id="page-top">
 <?php include("includes/topnav.php"); ?>
  <div id="wrapper">
<?php include("includes/sidenav.php"); ?>
      <div class="container-fluid">
        <div class="row dash_row mar_bottom_20">
        <div class="offset-md-2 col-md-8 col-offset-md-2 outer-w3-agile">
<h5 class="text-center">Profile</h5>
<hr>
<?php
$username=$_SESSION['username'];
$query="SELECT * FROM newuser WHERE username='{$username}'";
$select_query=mysqli_query($connection,$query);
if (!$select_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }
while($row=mysqli_fetch_array($select_query)) {
                      $username=$row['username'];
                      $firstname=$row['firstname'];
                      $lastname=$row['lastname'];
                      $NickName=$row['NickName'];
                      $email=$row['email'];
                      $Biographicalinfo=$row['Biographicalinfo'];
                      $image=$row['image']; 
  }
?>
              <form>
              <label>User Name</label>
<input type="text" class="form-control" value="<?php echo $username; ?>" readonly="true">
<label>First Name</label>
<input type="text" class="form-control" value="<?php echo $firstname; ?>" readonly="true">
<label>Last Name</label>
              <input type="text" class="form-control" value="<?php echo $lastname; ?>" readonly="true">

<label>Nick Name</label>
              <input type="text" class="form-control" value="<?php echo $NickName; ?>" readonly="true">
    <h6 class="text-center"> Contact Info</h6>
    <hr>
    <label>E-Mail</label>
              <input type="email" class="form-control" value="<?php echo $email; ?>" readonly="true">
      <h6 class="text-center">About Youself</h6>
    <hr>
    <label>Biographical Info</label>
<textarea class="form-control" readonly="true"><?php echo $Biographicalinfo; ?></textarea>
<h5><label>Profile Picture:</label></h5>
<br>
<table class="table table-bordered">   
                <?php  
               echo'
               <img src="images/'.$image.'" height="250" width="400" class="img-thumnail">';  
                ?>  
                </table>  
              </form>
                </div>
              </div>
      </div>
  <script src="js/sb-admin.min.js"></script>

</body>

</html>