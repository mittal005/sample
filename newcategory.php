<!-- ------------------------pagination----------------------- -->

<?php include("includes/header.php"); ?>

<body id="page-top">

 <?php include("includes/topnav.php"); ?>

  <div id="wrapper">

    <!-- Sidebar -->
    
<?php include("includes/sidenav.php"); ?>
 <div class="container-fluid">
              <div class="row dash_row outer-w3-agile">
                <div class="col-md-5 ">
                  <form action="" method="post">
                    <h3 class="text-center">Add New Category</h3>
                    <hr>
                    
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" id="firstName" placeholder="" value="" required=""> 
                    <br>  
                            <label>Slug</label>
                    <input type="text" class="form-control" name="slug"  placeholder="" value="" required="">
                    <br>
                    <label> Parent Category</label>
                    <select class="form-control" name="parent_category">
                      <br>
                                        <option>select category</option>
                                        <?php
                           // $connection=mysqli_connect('localhost','root','','admin');
                           $select_query="SELECT DISTINCT categoryName FROM category";
                           $select_all_categories_query=mysqli_query($connection, $select_query);
                if (!$select_all_categories_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }
                            while($row=mysqli_fetch_array($select_all_categories_query)){
                              $name=$row['categoryName'];
                          
                    ?>
                                        <option> <?php echo $name;    ?></option>
                                       
                                        <?php
                                      }
                                        ?>
                                        
                                    </select>
                                    <br>
                   <label>Description</label>
                    <textarea class="form-control"  rows="5" required="" name="description"></textarea>
                    <div class="row">
                      <div class="offset-md-3 col-md-6 col-offset-md-3">
                        <br>
       <input type="submit" name="save_category" class="btn btn-primary" value="Add New Category">                 
                      <!-- <button type="button" class="btn btn-primary" name="save_category">Add New Category</button> -->
                    </div>
                    </div>
                    </form>
                  </div>
                  
                  <div class="col-md-7 ">
                    <div class="row">
                      <div class="col-md-4">
                        <form action="" method="post">
            <select class="form-control" name="byDate">
      <option value="alldates">All Dates</option>
      <?php 
      $select_query="SELECT DISTINCT category_date FROM category";
                           $select_all_categories_query=mysqli_query($connection, $select_query);
                if (!$select_all_categories_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }
                            while($row=mysqli_fetch_array($select_all_categories_query)){
                              $category_date=$row['category_date'];
                          
                    ?>
                                        <option> <?php echo $category_date;    ?></option>
                                       
                                        <?php
                                      }
                                        ?>
                                        
                                    </select>

    </select>
  </div>
  <div class="col-md-4">
    <input type="submit" name="selectByDate" value="Apply" class="button btn btn-primary">
    <!-- <button type="button" class="button btn btn-primary">Apply</button> -->
     
   </div>
 </form>
   <div class="col-md-4">
   </div>
   </div>
   <br>
        <div class="table-responsive">                
              <table id="mytable" class="table table-bordred table-striped">                  
                   <thead>                   
                   <th><!-- <input type="checkbox" id="checkall" /> --></th>
                   <th>Name</th>
                     <th>Slug</th>
                     <th>Description</th>
                    
                    <!--  <th>count</th> -->
                      <th>Edit</th>                      
                       <th>Delete</th>
                   </thead>
    <tbody>
    
     <!--  ------------------- -->
<?php
if (isset($_POST['save_category'])) {
    $name=$_POST['name'];
    $slug=$_POST['slug'];
     $parent_category=$_POST['parent_category'];
    $description=$_POST['description'];
    date_default_timezone_set("Asia/Kolkata");
     $current_time = date("m-d-y");
         
    
     // $connection=mysqli_connect('localhost','root','','admin');
       
     $que="INSERT INTO category(fid,categoryName  ,slug,parentcategory,description,category_date)VALUES('null','$name','$slug','$parent_category','$description','$current_time')";
          $insert_category=mysqli_query($connection,$que);
         if (!$insert_category) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }
                             
                    
                }
  
if (!isset($_POST['selectByDate'])) {
   $per_page=10;
  if(isset($_GET['page'])) {

          
            $page = $_GET['page'];

            } else {


                $page = "";
            }


            if($page == "" || $page == 1) {

                $page_1 = 0;

            } else {

                $page_1 = ($page * $per_page) - $per_page;

            }
  
  $post_query_count="SELECT * FROM category";
          $find_count=mysqli_query($connection,$post_query_count);
          if (!$find_count) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }
            $count=mysqli_num_rows($find_count); 
           $count=ceil($count/$per_page);
  
              $select_query="SELECT * FROM category ORDER BY id DESC LIMIT $page_1,$per_page";
                $select_all_categories_query=mysqli_query($connection, $select_query);
                if (!$select_all_categories_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }
                    while($row=mysqli_fetch_array($select_all_categories_query)){
                      $id=$row['id'];
                      $name=$row['categoryName'];
                      $slug=$row['slug'];
                      $description=$row['description'];
                   ?>


      <!-- -------- -->
      <tr>
    <td><input type="checkbox" class="checkthis" /></td>
    <td><?php if(isset($name)){echo $name;}  ?></td>
    <td><?php if(isset($slug)){echo $slug;}  ?></td>
    <td><?php if(isset($description)){echo $description;}   ?></td>
    <!-- <td>+923335586757</td> -->
    <td class="page_control"><a href="editcategory.php?edit=<?php echo $id;  ?>"><span class="fa fa-pencil">
    </span></button></a></td>

    <td class="page_control"><a href="deletecategory.php?delete=<?php echo $id;  ?>"><span class="fa fa-trash"></span></button></a></td>
     </tr> 
    <?php
      }
           }          
                ?>
                

                <?php
if (isset($_POST['selectByDate']) || isset($_GET['editbydate'])) {
$_SESSION['publihedOn']=$_POST['byDate'];
if ($_SESSION['publihedOn'] != 'alldates') {
include "includes/selectByDate_category.php";
}else{
  // include "includes/selectAll_category.php";
  header("Location:newcategory.php");
}
}
      ?>

    </tbody>        
</table>
<?php
if (!isset($_POST['selectByDate'])) {

?>
    <ul class="pagination">

  <?php
   for($i =1; $i <= $count; $i++) {


        if($i == $page) {

             echo "<li class='page-item'><a class='page-link active_pagination' href='newcategory.php?page={$i}'>{$i}</a></li>";


        }  else {

            echo "<li class='page-item''><a class='page-link' href='newcategory.php?page={$i}'>{$i}</a></li>";


        }

         
        }

}

  ?>
    
 
  </ul>     
  <!-- ------------------------------------------------ -->
    
            </div>          
        </div>
  </div>
</div>
<!-- --------------------pagination------------------ -->

<!-- ----------------------------modal---------------------- -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
      </div>
          <div class="modal-body">
          <div class="form-group">
        <input class="form-control " type="text" placeholder="Mohsin">
        </div>
        <div class="form-group">        
        <input class="form-control " type="text" placeholder="Irshad">
        </div>
        <div class="form-group">
        <textarea rows="2" class="form-control" placeholder="CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan"></textarea        
        </div>
      </div>
          <div class="modal-footer ">
        <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>    
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">       
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
      </div>
        <div class="modal-footer ">
        <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
      </div>
  </body>
</html>
