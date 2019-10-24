 
 <?php
 if (isset($_POST['restore_post'])) {
     $id=$_POST['restoreID'];
    if ($id !='') {
      
   $query="SELECT * FROM trashpages WHERE id={$id}";
   $select_query=mysqli_query($connection,$query);
   if (!$select_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }  
    while ($row=mysqli_fetch_array($select_query)) {
       $userid=$row['user_id'];
       $username=$row['username'];
        $Title=$row['Title'];
       $Content=$row['Content'];
       $Status=$row['Status'];
       $Visibility=$row['Visibility'];
       $publihedOn=$row['publihedOn'];
       $selectCategory=$row['selectCategory'];
       $categoryName=$row['categoryName'];
       $categoryType=$row['categoryType'];
       $seo_title=$row['seo_title'];
       $url=$row['url'];
       $seo_schema=$row['seo_schema'];
       $image=$row['image'];
       date_default_timezone_set("Asia/Kolkata");
     $current_time = date("d-m-Y");
    }

    if (!empty($Status)) {
    
if ($Status=='Publish') {
  $query="INSERT INTO pages(user_id,username,Title,Content,Status,publishTime,Visibility,publihedOn,selectCategory,categoryName,categoryType,seo_title,url,seo_schema,image,createdDate)VALUES('$userid','$username','$Title','$Content','$Status','$current_time','$Visibility',' $publihedOn','$selectCategory','$categoryName','$categoryType','$seo_title','$url','$seo_schema','$image','$current_time')";
    $insert_query=mysqli_query($connection,$query);
    if (!$insert_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }  
}
if ($Status=='Draft') {
  $query="INSERT INTO pages(user_id,username,Title,Content,Status,draftTime,Visibility,publihedOn,selectCategory,categoryName,categoryType,seo_title,url,seo_schema,image,createdDate)VALUES('$userid','$username','$Title','$Content','$Status','$current_time','$Visibility',' $publihedOn','$selectCategory','$categoryName','$categoryType','$seo_title','$url','$seo_schema','$image','$current_time')";
    $insert_query=mysqli_query($connection,$query);
    if (!$insert_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }  
}
}
$query="DELETE FROM trashpages WHERE id={$id}";
  $delete_query=mysqli_query($connection,$query);
  if (!$delete_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }  

} 

 }
              
// -----------------------------
if (isset($_POST['delete_post'])) {
   $id=$_POST['deleteID']; 
   $query="DELETE FROM trashpages WHERE id={$id}";
  $delete_query=mysqli_query($connection,$query);
  if (!$delete_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }  
}
// ------------------------pagination-----------------------------
 $per_page=5;
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

          //$connection=mysqli_connect('localhost','root','','admin');
          $post_query_count="SELECT * FROM trashpages";
          $find_count=mysqli_query($connection,$post_query_count);
          if (!$find_count) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }
          $count=mysqli_num_rows($find_count); 
          $count=ceil($count/$per_page);

// --------------------------
              $query="SELECT * FROM trashpages LIMIT $page_1,$per_page";
$select_allposts=mysqli_query($connection,$query);
while($row=mysqli_fetch_array($select_allposts)) {
  $id=$row['id'];
  $title=$row['Title'];
  $username=$row['username'];
  $categoryName=$row['categoryName'];
  $draftTime=$row['draftTime'];
  $publishTime=$row['publishTime'];
   $createdDate=$row['createdDate'];
              ?>       

    
    <tr>
    <td><!-- <input type="checkbox" class="checkthis" /> --></td>
    <td class="author_td"><label><?php echo $title;  ?></label></td>
    <td><label><?php echo $username;  ?></label></td>
    <td class="page_control"><label><?php echo $categoryName;  ?></label></td>

    <!-- <td><label></label></td>
    <td><label></label></td> -->
   
    <td><?php if ($draftTime != "") {
                 echo    $createdDate; 
    }else{
         echo    $createdDate;
    }                        ?></td>



    <td> <a class="nav-link " href="#" id="actionmenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-ellipsis-v font-24"></i>
        </a>

<!-- <a href="#edit<?php //echo $row['userid']; ?>" data-toggle="modal" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a>  -->


        <div class="dropdown-menu dropdown-menu-right" id="actionmenulist" aria-labelledby="actionmenu">
         
  <a class="dropdown-item quickRestore" data-title="Restore" data-id="<?php echo $id;  ?>" >Restore<i class="fa fa-magic pad"></i></a>
  <!-- <button class="quickEditPost" >edit</button> -->
    <a class="dropdown-item deletePost" data-title="Delete" data-id="<?php echo $id;  ?>">Trash<i class="fa fa-trash padd"></i
            ></a>
             </div>

</td>
    </tr>
    <?php

}



    ?>
    </tbody>
        
</table>
<ul class="pagination">

  <?php
   for($i =1; $i <= $count; $i++) {


        if($i == $page) {

             echo "<li class='page-item'><a class='page-link active_pagination' href='allpages.php?show=trash&&page={$i}'>{$i}</a></li>";


        }  else {

            echo "<li class='page-item''><a class='page-link' href='allpages.php?show=trash&&page={$i}'>{$i}</a></li>";


        }

         
        }



  ?>
    
 
  </ul>

    <!--  <div class="modal fade" id="del<?php //echo $row['userid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> -->
      <!-- ---------restore modal---- -->
<div class="modal fade" id="restore" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Restore</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
      <div class="modal-body">
        
        <input type="hidden" id="restoreID" name="restoreID">
  Are you sure want to Restore?

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"  data-dismiss="modal">Cancel</button>
       
      <input type="submit" class="btn btn-primary" name="restore_post" value="Restore">
        <!-- <a href=""><button type="button" class="btn btn-primary">Delete</button></a> -->
      </div>
      </form>
       
      </div>
    </div>
  </div>
</div>
<!-- -------------------- -->
    
 
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
<!-- -------------------- -->
<script type="text/javascript">

   $(document).ready(function(){

  $(".quickRestore").click(function(){
  $("#restore").modal('show');
     var restoreID = $(this).data('id');
     $(".modal-body #restoreID").val(restoreID);
     // As pointed out in comments, 
     // it is unnecessary to have to manually call the modal.
     // $('#addBookDialog').modal('show');
});
});
// ---------------------------------------------------
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
  
