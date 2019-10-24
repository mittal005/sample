
<?php include("includes/header.php"); ?>
<?php 
if (isset($_POST['update_post'])) {
   $id=$_POST['bookId'];  
   $title=$_POST['ftitle'];
   $fname=$_POST['fname'];
   $femail=$_POST['femail'];
   //$password=$_POST['fdate'];
  
   $query="UPDATE newuser SET username='$title',firstname='$fname',email='$femail' WHERE id={$id}";
  $update_query=mysqli_query($connection,$query);
  if (!$update_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }  
  }
  
   

 // -----------------------------
if (isset($_POST['delete_post'])) {
   $id=$_POST['deleteID'];  
  
   $query="DELETE FROM newuser WHERE id={$id}";
  $delete_query=mysqli_query($connection,$query);
  if (!$delete_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
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
        <div class="col-md-12 outer-w3-agile">
    <a href="alluser.php"><h5  class="text-center">All Users</h5></a>
          <div class="row dash_row" style="margin-bottom: 20px;">
          <div class="col-md-2">
    <form action="" method="post">
    <input type="text" name="search" class="form-control" placeholder="Search By Username">
  </div>
  <div class="col-md-2 ">
    <input type="submit" name="selectByUsername" class="btn btn-primary col-md-5" value="Search">
     <!-- <button type="button" class="btn btn-primary" >Apply</button> -->
      </form>
  </div>
</div>
              <div class="table-responsive">

                
              <table id="mytable" class="table table-bordred table-striped">
                
                   <thead>
                   
                   <th><!-- <input type="checkbox" id="checkall" /> --></th>
                   <th>username</th>
                    <th>Name</th>
                     <th>E-Mail</th>
                     <th>Role</th>
                     <th>Post count</th>
                     
                      <th>Quick Edit</th>
                      
                       
                   </thead>
    <tbody>

    <?php
         if (!isset($_POST['selectByUsername'])) {
           
         
              //$connection=mysqli_connect('localhost','root','','admin');
              $query="SELECT * FROM newuser";
$select_newuser=mysqli_query($connection,$query);
while($row=mysqli_fetch_array($select_newuser)) {
  $id=$row['id'];
  $username=$row['username'];
  $email=$row['email'];
  $firstname=$row['firstname'];
   $lastname=$row['lastname'];
    $role=$row['role'];
    $Biographicalinfo=$row['Biographicalinfo'];
  

            ?>       

    
    <tr>
    <td><!-- <input type="checkbox" class="checkthis" /> --></td>
    <td ><label><?php echo $username;  ?></label></td>
    <td><label><?php echo $firstname;  ?></label></td>
    <td ><label><?php echo $email;  ?></label></td>
    <td><label><?php echo $role;  ?></label></td>
<?php

$post_query="SELECT * FROM posts WHERE username='{$username}'";
$post_select_query=mysqli_query($connection,$post_query);
if (!$post_select_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }  
if($post_select_query){
     $row_user = mysqli_num_rows($post_select_query); 
    
     }    


?>

    <td><label><?php echo $row_user;  ?></label></td>
    <td><label><a class="nav-link " href="#" id="actionmenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-ellipsis-v font-24"></i>
        </a>


      <div class="dropdown-menu dropdown-menu-right" id="actionmenulist" aria-labelledby="actionmenu">
          <a class="dropdown-item" href="edituser.php?edit=<?php echo $id;   ?>">Edit<i class="fa fa-pencil pad_left_40"></i
            ></a>
          <a class="dropdown-item quickEditPost" data-title="Edit" data-id="<?php echo $id;  ?>" >Quick Edit<i class="fa fa-magic pad"></i></a>
           <a class="dropdown-item deletePost" data-title="Delete" data-id="<?php echo $id;  ?>">Trash<i class="fa fa-trash padd"></i
            ></a>
        </div>
</label>
</td>
    </tr>
    
    </tbody>
    <?php

     }
}
    ?>
    <!-- ------------------------------------------------------------------------- -->
    <?php
     
if (isset($_POST['selectByUsername'])) {
         $search= $_POST['search'];  
         
              //$connection=mysqli_connect('localhost','root','','admin');
    $query="SELECT * FROM newuser WHERE username LIKE '%$search%'";
$select_newuser=mysqli_query($connection,$query);
while($row=mysqli_fetch_array($select_newuser)) {
  $id=$row['id'];
  $username=$row['username'];
  $email=$row['email'];
  $firstname=$row['firstname'];
   $lastname=$row['lastname'];
    $role=$row['role'];
    $Biographicalinfo=$row['Biographicalinfo'];
  


            ?>       

    
    <tr>
    <td><!-- <input type="checkbox" class="checkthis" /> --></td>
    <td ><label><?php echo $username;  ?></label></td>
    <td><label><?php echo $firstname;  ?></label></td>
    <td ><label><?php echo $email;  ?></label></td>
    <td><label><?php echo $role;  ?></label></td>
    <td><label><?php echo $Biographicalinfo;  ?></label></td>
    <td><a class="nav-link " href="#" id="actionmenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-ellipsis-v font-24"></i>
        </a>


      <div class="dropdown-menu dropdown-menu-right" id="actionmenulist" aria-labelledby="actionmenu">
          <a class="dropdown-item" href="edituser.php?edit=<?php echo $id;   ?>">Edit<i class="fa fa-pencil pad_left_40"></i
            ></a>
          <a class="dropdown-item quickEditPost" data-title="Edit" data-id="<?php echo $id;  ?>" >Quick Edit<i class="fa fa-magic pad"></i></a>
           <a class="dropdown-item deletePost" data-title="Delete" data-id="<?php echo $id;  ?>">Trash<i class="fa fa-trash padd"></i
            ></a>
        </div>
</td>
    </tr>
    
    </tbody>
    <?php

     }
}
    ?>




  
        
</table>


                
            </div>

                </div>
              </div>
      </div>
      <!-- ---------quickedit modal------------- -->
    <div class="modal fade" id="quickeditmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
         
        <h5 class="modal-title" id="exampleModalLongTitle">Edit your post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
      <div class="modal-body">
        <input type="hidden" name="bookId" id="bookId" value=""/>
   <label>Username</label>
   <input type="text" class="form-control" name="ftitle" id="ftitle" required>
   <label>Name</label>
   <input type="text" class="form-control" name="fname" id="fname" required>
    <label>Email</label>
          <input type="text" class="form-control" name="femail" id="femail" required>
       <!-- <label>Status</label> -->
      <!--  <select class="form-control" id="status">
      <option>Draft</option>
      <option>Publish</option>
    </select> -->

    
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <input type="submit" name="update_post" class="btn btn-primary">
       <!--  <button type="button" class="btn btn-primary" name="update_post">Save changes</button> -->
      </div>
    </form>
    </div>
  </div>
</div>
 

   <!-- ---------delete modal---- -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
      <div class="modal-body">
        
        <input type="hidden" id="deleteID" name="deleteID">
  Are you sure want delete?

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"  data-dismiss="modal">Cancel</button>
       
      <input type="submit" class="btn btn-primary" name="delete_post" value="Delete">
        <!-- <a href=""><button type="button" class="btn btn-primary">Delete</button></a> -->
      </div>
      </form>
       
      </div>
    </div>
  </div>
</div>
<!-- -----------delete query--------- -->
<script type="text/javascript">
  $(document).ready(function(){

  $(".quickEditPost").click(function(){
  $("#quickeditmodal").modal('show');
  var myBookId = $(this).data('id');
  $(".modal-body #bookId").val( myBookId );
   $tr=$(this).closest('tr');
   var data = $tr.children("td").map(function(){
          return $(this).text();

   }).get();
    console.log(data);
    //$("#update_id").val(data[0]);
    $("#ftitle").val(data[1]);
    $("#fname").val(data[2]);
    $("#femail").val(data[3]);
     });
});

// -----------------------------------------------
 $(document).ready(function(){

  $(".deletePost").click(function(){
  $("#delete").modal('show');
     var deleteId = $(this).data('id');
     $(".modal-body #deleteID").val(deleteId);
     // As pointed out in comments, 
     // it is unnecessary to have to manually call the modal.
     // $('#addBookDialog').modal('show');
});
});
   
</script>

</body>

</html>