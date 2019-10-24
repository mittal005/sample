<?php include("includes/header.php"); ?>
<?php
if(isset($_GET['edit'])) {
   $the_user_id=$_GET['edit'];
  //$connection=mysqli_connect('localhost','root','','admin');
  $query="SELECT * FROM newuser WHERE id=$the_user_id";
  
$select_users=mysqli_query($connection,$query);
if (!$select_users) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
}
 if(isset($_FILES) & !empty($_FILES)){
  $post_image=$_FILES['post_image']['name'];
  $type = $_FILES['post_image']['type'];
   $post_image_temp=$_FILES['post_image']['tmp_name'];
   $extension = substr($post_image, strpos($post_image, '.') + 1);
   if(isset($post_image) && !empty($post_image)){
      if(($extension == "jpg" || $extension == "jpeg" || $extension == "png")){
while ($row=mysqli_fetch_array($select_users)) {
   $user_username=$row['username'];
   $user_firstname=$row['firstname'];
  $user_lastname=$row['lastname'];
  $user_email=$row['email'];
   $user_password=$row['password'];
   $user_image=$row['image'];
 }
}
}
}
}
if (isset($_POST['update_users'])) {
   $update_id=$_SESSION['user_id'];
   $username=$_POST['username'];
   $password=$_POST['password'];
   $firstname=$_POST['firstname'];
   $NickName=$_POST['NickName'];
   $Biographicalinfo=$_POST['Biographicalinfo'];
   $lastname=$_POST['lastname'];
   $email=$_POST['email'];
   $user_role=$_POST['user_role'];
   $post_image=$_FILES['post_image']['name'];
   $post_image_temp=$_FILES['post_image']['tmp_name'];
   move_uploaded_file($post_image_temp, "images/$post_image");
   $query="UPDATE newuser SET username='$username',password='$password',firstname='$firstname',lastname='$lastname',email='$email',role='$user_role',NickName='$NickName',Biographicalinfo='$Biographicalinfo',image='$post_image' WHERE id={$update_id}";
  $updated_query=mysqli_query($connection,$query);
   if (!$updated_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }        
  $select_updated="SELECT * FROM newuser WHERE id=$update_id";
  $select_updated_query=mysqli_query($connection,$select_updated);
  while ($row=mysqli_fetch_array($select_updated_query)) {
   $updated_username=$row['username'];
   $updated_firstname=$row['firstname'];
  $updated_lastname=$row['lastname'];
   $updated_NickName=$row['NickName'];
   $updated_Biographicalinfo=$row['Biographicalinfo'];
   $updated_email=$row['email'];
   $updated_password=$row['password'];
   $updated_image=$row['image'];
}          
        }
$common_id=$_SESSION['user_id'];
$select_query="SELECT * FROM newuser WHERE id=$common_id";
$select_users=mysqli_query($connection,$select_query);
if (!$select_users) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
}
while ($row=mysqli_fetch_array($select_users)) {
   $common_username=$row['username'];
   $common_firstname=$row['firstname'];
  $common_lastname=$row['lastname'];
   $common_NickName=$row['NickName'];
   $common_Biographicalinfo=$row['Biographicalinfo'];
  $common_email=$row['email'];
  $common_password=$row['password'];
  $common_image=$row['image'];
}
?>

<body id="page-top">

 <?php include("includes/topnav.php"); ?>

  <div id="wrapper">

    <!-- Sidebar -->
    
<?php include("includes/sidenav.php"); ?>

      <div class="container-fluid">
        <div class="row dash_row mar_bottom_20">
        <div class="offset-md-2 col-md-8 col-offset-md-2 outer-w3-agile">
                        
<h5 class="text-center">Profile</h5>
<hr>
              <form action="" method="post" enctype="multipart/form-data">

              <label>User Name</label>
              <input type="text" class="form-control" name="username" value="<?php if(isset($user_username)){echo $user_username;}else if(isset($updated_username)){echo $updated_username;} else{echo $common_username;}?>" required>
<label>First Name</label>
              <input type="text" class="form-control" name="firstname" value="<?php if(isset($user_firstname)){echo $user_firstname;}else if(isset($updated_firstname)){echo $updated_firstname;}else{echo $common_firstname;} ?>" required>
<label>Last Name</label>
              <input type="text" class="form-control" name="lastname" value="<?php if(isset($user_lastname)){echo $user_lastname;}else if(isset($updated_lastname)){echo $updated_lastname;}else{echo $common_lastname;} ?>" required>

<label>Nick Name</label>
              <input type="text" name="NickName" class="form-control" value="<?php if(isset($user_NickName)){echo $user_NickName;}else if(isset($updated_NickName)){echo $updated_NickName;}else{echo $common_NickName;}  ?>" >

              
  <label >Display Name Publicly as</label>
    <select class="form-control" name="user_role">
      <option>Administrator</option>
      <option>Author</option>
      <option>Editor</option>
    </select>
    <h6 class="text-center"> Contact Info</h6>
    <hr>
    <label>E-Mail</label>
              <input type="email" class="form-control" name="email" value="<?php if(isset($user_email)){echo $user_email;}else if(isset($updated_email)){echo $updated_email;}else{echo $common_email;}  ?>" >

      <h6 class="text-center">About Youself</h6>
    <hr>

    <label>Biographical Info</label>
<textarea class="form-control" name="Biographicalinfo"><?php if(isset($user_Biographicalinfo)){echo $user_Biographicalinfo;}else if(isset($updated_Biographicalinfo)){echo $updated_Biographicalinfo;}else{echo $common_Biographicalinfo;}  ?></textarea>
<label>Profile Picture</label>
<div>
<input type="file" name="post_image">
</div>
<h6 class="text-center">Account Management</h6>
<hr>
<label>New Password</label>
<input type="passord" class="form-control" name="password"  value="<?php if(isset($user_password)){echo $user_password;}else if(isset($updated_password)){echo $updated_password;}else{echo $common_password;}  ?>" required>
<label>Re-type Password</label>
<input type="passord" class="form-control">
<br>
<input type="submit" name="update_users" class="btn btn-primary" value="Update Your Profile">
<!-- <button type="button" class="btn btn-primary" name="update_users">Update Your Profile</button> -->

              </form>




                </div>
              </div>
      </div>

       
 

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>



</body>

</html>
<script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script>  
