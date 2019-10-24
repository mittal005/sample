<?php include("includes/header.php"); ?>
<?php

if (isset($_GET['edit'])) {
  $edit_id=$_GET['edit'];
  $select_query="SELECT * FROM category WHERE id=$edit_id";
$select_edit_query=mysqli_query($connection,$select_query);
           
                if (!$select_edit_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }
  
while($row=mysqli_fetch_array($select_edit_query)) {
                      $name=$row['name'];
                      $slug=$row['slug'];
                      $parentcategory=$row['parentcategory'];
                      $description=$row['description'];
    
  }
}
if (isset($_POST['update'])) {
   $name=$_POST['name'];
   $parent_category=$_POST['parent_category'];
   $description=$_POST['description'];
   
   $query="UPDATE category SET name='$name',slug='$slug', parentcategory='$parentcategory' WHERE id={$edit_id}";
  $update_query=mysqli_query($connection,$query);
  
    if (!$update_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }else{
  header("Location:newcategory.php?editbydate");
  } 
        }

  ?>





  
<body id="page-top">

 <?php include("includes/topnav.php"); ?>

  <div id="wrapper">

    <!-- Sidebar -->
    
<?php include("includes/sidenav.php"); ?>

<div class="container-fluid">
  <div class="row dash_row ">
                <div class="offset-md-3 col-md-6 col-offset-md-3 outer-w3-agile">
                  <form action="" method="post">
                    <h5 class="text-center">Edit Category</h5>
                    <hr>
                    
                    <label>Name</label>
    <input type="text" class="form-control" id="firstName" name="name" placeholder="" value="<?php echo $name; ?>" required=""> 
                    <br>  
                            <label> Parent Category</label>
                    <select class="form-control" name="parent_category">
                      <br>
                                        <option>select category</option>
                                        <?php
                           // $connection=mysqli_connect('localhost','root','','admin');
                           $select_query="SELECT DISTINCT name FROM category";
                           $select_all_categories_query=mysqli_query($connection, $select_query);
                if (!$select_all_categories_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }
                            while($row=mysqli_fetch_array($select_all_categories_query)){
                              $sname=$row['name'];
                          
                    ?>
            <option <?php if($sname==$parentcategory) echo 'selected="selected"'; ?>> <?php echo $sname;    ?></option>
                                        <!-- <option> <?php //echo $name;    ?></option> -->
                                       
                                        <?php
                                      }
                                        ?>
                                        
                                    </select>
                                    <br>
                   <label>Description</label>
                    <textarea class="form-control" name="description" rows="5" required=""><?php echo $description;    ?></textarea>
                    <div class="row">
                      <div class="offset-md-4 col-md-4 col-offset-md-4 text-center">
                    <input type="submit" class="btn btn-primary" name="update" value="Upadte">   
                      <!-- <button type="button" class="btn btn-primary" name="update">Upadte</button> -->
                    </div>
                    </div>
                  </div>
                  </form>
</div>
</div>
 </div>
  
</body>
</html>
