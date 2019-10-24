<!DOCTYPE html>
<html lang="en">

<head>
<?php include("includes/header.php"); ?>

<style type="text/css">

  
    </style>
  </head>

<body id="page-top">

 <?php include("includes/topnav.php"); ?>

  <div id="wrapper">

    <!-- Sidebar -->
    
<?php include("includes/sidenav.php"); ?>



    	<div class="container-fluid">
<div class="row dash_row">
	<h5>Upload New Media</h5>
            <br>   
             
	<div class=" col-sm-12 outer-w3-agile">

               <form method='post' action='' enctype='multipart/form-data'>
			<input type='file' name='files[]' multiple />
			<input type='submit' value='Submit' class="btn btn-primary" name='submit' />
		</form>     

            </div>  		

       </div>
 
</div>



</body>

</html>
