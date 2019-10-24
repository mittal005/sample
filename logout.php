<?php   include("includes/db.php");         ?>
<?php

session_start();
     $user_id=$_SESSION['user_id'];
     $row_admin=$_SESSION['row_admin'];
      $row_user=$_SESSION['row_user'];
      if ($row_admin == 1) {
date_default_timezone_set("Asia/Kolkata");
 $current_time = date('d-m-y h:m:s');
 $logout="UPDATE login SET  logoutTime =now() WHERE  id='{$user_id}'";
 $logout_query=mysqli_query($connection,$logout);
   if (!$logout_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }
   session_destroy();
header("Location:login.php");                
}else if($row_user == 1){
	date_default_timezone_set("Asia/Kolkata");
 $current_time = date('d-m-y h:m:s');
 $logout="UPDATE newuser SET  logoutTime =now() WHERE  id='{$user_id}'";
 $logout_query=mysqli_query($connection,$logout);
   if (!$logout_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }
session_destroy();
header("Location:login.php"); 
}else{
	session_destroy();
header("Location:login.php"); 
}
// $_SESSION = array();

// if (ini_get("session.use_cookies")) {
//     $params = session_get_cookie_params();
//     setcookie(session_name(), '', time() - 42000,
//         $params["path"], $params["domain"],
//         $params["secure"], $params["httponly"]
//     );
// }


?>
