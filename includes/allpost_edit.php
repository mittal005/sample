<!-- <?php //include("init.php"); ?> -->
<?
if (isset($_POST['update_post'])) {
   $id=$_POST['bookId'];	
   $title=$_POST['ftitle'];
   //$password=$_POST['fdate'];
  
   $query="UPDATE posts SET Title='$title' WHERE id={$id}";
  $update_query=mysqli_query($connection,$query);
  if (!$update_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }  

 

        }
 // header("Location:../allpost.php");

?>
<!-- publishTime
bookId -->
<!-- <script type="text/javascript">
	window.location='../allpost.php';
</script> -->