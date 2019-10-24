<?php session_start(); ?>
<?php   include("includes/db.php");         ?>
<?php
if (isset($_POST['login'])) {
  
  $username=$_POST['username'];
  $password=$_POST['password'];
  
  $query="SELECT id FROM login WHERE username='{$username}' && password='{$password}'";
   $select_all_users=mysqli_query($connection,$query);
  if (!$select_all_users) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }
     if($select_all_users){
     $row_admin = mysqli_num_rows($select_all_users); 
     //echo $row;
     }   
       while($row=mysqli_fetch_array($select_all_users)) {
        $admin_id=$row['id'];
  }                   
// -----------------------------------------------------------------------------------
 $query_user="SELECT id FROM newuser WHERE username='{$username}' && password='{$password}'";
 $select_query_user=mysqli_query($connection,$query_user);
  if (!$select_query_user) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }

     if($select_query_user){
     echo $row_user = mysqli_num_rows($select_query_user); 
    
     }                        
while($row=mysqli_fetch_array($select_query_user)) {
        $user_id=$row['id'];
  }      
// -----------------------------------------------------------------------------------
if ($row_admin == 1) {
                 $_SESSION['username']=$username;
                 $_SESSION['user_id']=$admin_id;
                 $_SESSION['row_admin']=$row_admin;
                 $_SESSION['signed_in']=true;
                 date_default_timezone_set("Asia/Kolkata");
                  $current_time = date('d-m-y h:m:s');
                 //$_SESSION['loggedTime']=date('y-m-d h:m:s');
                $logged_in_query="UPDATE login SET  LoggedTime =now()  WHERE  username='{$username}' && password='{$password}'";
                 // $logged_in_query="UPDATE image SET LoggedTime =(NOW()) WHERE  username='{$username}' && password='{$password}'";
// $logged_in_query="UPDATE login SET LoggedTime ='{$current_time}' WHERE id=3";

                  $logged_in_query=mysqli_query($connection,$logged_in_query);
   if (!$logged_in_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }
                         
                          header("Location:dashboard.php");  
                             }

                             else if($row_user == 1){
                             
                 $_SESSION['username']=$username;
                 $_SESSION['user_id']=$user_id;
                 $_SESSION['row_user']=$row_user;
                 $_SESSION['signed_in']=true;
                  $current_time = date('y-m-d h:m:s');
                 $_SESSION['loggedTime']=date('y-m-d h:m:s');
                $logged_in_query="UPDATE newuser SET LoggedTime =now(), signed_in='{$_SESSION['signed_in']}'  WHERE  username='{$username}' && password='{$password}'";
                
                  $logged_in_query=mysqli_query($connection,$logged_in_query);
 if (! $logged_in_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }
                         
                          header("Location:dashboard.php");  

                             }


                             else{
                            header("Location:login.php");
                         }





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
<link href="css/style.css" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
   <link href="css/sb-admin.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <title>login</title>

  <!-- Custom fonts for this template-->
 <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form action="" method="post">
          <div class="form-group">
            <div class="form-label-group">
               <input type="text" class="form-control" name="username" placeholder="Username" required="required">
              
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password"  class="form-control" name="password" placeholder="Password" required="required">
              
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Remember Password
              </label>
            </div>
          </div>
          <input type="submit" class="btn btn-primary btn-block" name="login" value="Login">
          <!-- <a class="btn btn-primary btn-block" href="index.php">Login</a> -->
        </form>
        <div class="text-center">
          <a class="d-block small" href="#">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>


</body>

</html>
