<?php include("includes/header.php"); ?>
<?php

    if (isset($_GET['edit'])) {
  $edit_id=$_GET['edit'];
  $select_query="SELECT * FROM newuser WHERE id=$edit_id";
$select_edit_query=mysqli_query($connection,$select_query);
           
                if (!$select_edit_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }
  
while($row=mysqli_fetch_array($select_edit_query)) {
                      $username=$row['username'];
                      $email=$row['email'];
                      $firstname=$row['firstname'];
                      $lastname=$row['lastname'];
                      $password=$row['password'];
    
  }
}
if (isset($_POST['update'])) {
    $username=$_POST['username'];
    $email=$_POST['email'];
    $firstname=$_POST['firstname'];
   $lastname=$_POST['lastname'];
   $password=$_POST['password'];
   
   $query="UPDATE newuser SET username='$username',email='$email', firstname='$firstname',  lastname='$lastname', password='$password' WHERE id={$edit_id}";
  $update_query=mysqli_query($connection,$query);
  
    if (!$update_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }else{
  header("Location:alluser.php");
  } 
        }
    

?>



<body id="page-top">

 <?php include("includes/topnav.php"); ?>

  <div id="wrapper">

    <!-- Sidebar -->
    
<?php include("includes/sidenav.php"); ?>


      <div class="container-fluid">
        <div class="row dash_row">
        <div class="offset-md-2 col-md-8 col-offset-md-2 outer-w3-agile">
                        
<h5 class="text-center">Edit User</h5>
<hr>
              <form action="" method="post">

               <?php if(isset($msg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $msg; ?> </div><?php } ?>


              <label>User Name</label>
              <input type="text" class="form-control" name="username" value="<?php if(isset($username)){echo $username;} ?>" required>
<label>E-Mail</label>
              <input type="email" class="form-control" name="email"  value="<?php if(isset($email)){echo $email;} ?>" required>
<label>First Name</label>
              <input type="text" class="form-control" name="firstname" value="<?php if(isset($firstname)){echo $firstname;} ?>" required>
<label>Last Name</label>
              <input type="text" class="form-control" name="lastname" value="<?php if(isset($lastname)){echo $lastname;} ?>" required>

<label>Password</label>
              <input type="text" class="form-control" id="password" name="password" value="<?php if(isset($password)){echo $password;} ?>" required>

              <label>Re-type Password</label>
              <input type="Password" class="form-control" id="repassword" name="repassword" required>
              <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <span class="form-check-label">Send the new user an email about their account</span>
  </div>

  <label >Role</label>
    <select class="form-control" name="role" >
      <option>Administrator</option>
      <option>Author</option>
      <option>Editor</option>
    </select>
    <br>
    <input type="submit" name="update" id="newuser" class="btn btn-primary">
   <!--  <button type="button" class="btn btn-primary" name="newuser">Add New User</button> -->

              </form>




                </div>
              </div>
      </div>

       
 

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>
  <script>
     function passwordCheck(){
      var password=document.getElementById("password").value;
      var repassword=document.getElementById("repassword").value;
      if(password != repassword){
          


      }

     }

var password = document.getElementById("password")
  , confirm_password = document.getElementById("repassword");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;


  </script>



</body>

</html>
