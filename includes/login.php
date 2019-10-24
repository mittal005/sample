<?php session_start(); ?>
<?php ob_start();  ?>

<?php 

if(!isset( $_SESSION['username'])) {

header("location: login.php");

} 




 ?>
