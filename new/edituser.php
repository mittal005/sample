<?php include("includes/header.php"); ?>
<?php

if (isset($_POST['newuser'])) {
  
    $username=$_POST['username'];
    $email=$_POST['email'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $password=$_POST['password'];
    $repassword=$_POST['repassword'];
    $role=$_POST['role'];
    // date_default_timezone_set("Asia/Kolkata");
    // $current_time = date("F j, Y, g:i a");

    
// $connection=mysqli_connect('localhost','root','','admin');
$username=mysqli_real_escape_string($connection,$username);
$email=mysqli_real_escape_string($connection,$email);
$firstname=mysqli_real_escape_string($connection,$firstname);
$lastname=mysqli_real_escape_string($connection,$lastname);
$password=mysqli_real_escape_string($connection,$password);
// $repassword=mysqli_real_escape_string($connection,$repassword);
$role=mysqli_real_escape_string($connection,$role);
// -------------------------------------------------------------------
  $username_select="SELECT username FROM newuser WHERE username='{$username}'";
     $select_username_query=mysqli_query($connection,$username_select);
  if (!$select_username_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }
  if($select_username_query){
     $row_admin = mysqli_num_rows($select_username_query); 
     //echo $row;
     }  
  // while($row=mysqli_fetch_array($select_username_query)) {
  //      echo  $select_username=$row['username'];
  // }   
if (!($row_admin >= 1)) {
    $que="INSERT INTO newuser(username,email,firstname,lastname,password,role)VALUES('$username','$email','$firstname','$lastname','$password','$role')";
        $insert_users=mysqli_query($connection,$que);
         if (! $insert_users) {
        die('query FAILED . mysqli_error($connection)');
                             }

}else{
    $msg="The username already exists";
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
              <input type="text" class="form-control" name="username" required>
<label>E-Mail</label>
              <input type="email" class="form-control" name="email" required>
<label>First Name</label>
              <input type="text" class="form-control" name="firstname" required>
<label>Last Name</label>
              <input type="text" class="form-control" name="lastname" required>

<label>Password</label>
              <input type="Password" class="form-control" id="password" name="password" required>

              <label>Re-type Password</label>
              <input type="Password" class="form-control" id="repassword" name="repassword" required>
              <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <span class="form-check-label">Send the new user an email about their account</span>
  </div>

  <label >Role</label>
    <select class="form-control" name="role" >
      <option>Administrator</option>
    </select>
    <br>
    <input type="submit" name="newuser" id="newuser" class="btn btn-primary">
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
