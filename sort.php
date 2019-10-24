<?php include("includes/header.php"); ?>
<?php
if (isset($_POST['selectByCategory'])) {
   $selectByAuthor=$_POST['selectByAuthor'];  
   $selectByCategory=$_POST['selectByCategory'];
   $selectByFormat=$_POST['selectByFormat'];
  
   $query="SELECT * FROM posts
WHERE username={$selectByAuthor} AND categoryName={$selectByCategory} AND Format={$selectByFormat}";
  $update_query=mysqli_query($connection,$query);
  if (!$update_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }  
}

?>