 
 <?php
              //$connection=mysqli_connect('localhost','root','','admin');
 if (isset($_POST['update_post'])) {
   $id=$_POST['bookId'];  
   $title=$_POST['ftitle'];
   $fname=$_POST['fname'];
   $fdate=$_POST['fdate'];
   //$password=$_POST['fdate'];
   $select_query="SELECT Status FROM pages WHERE id=$id";
$select_allposts=mysqli_query($connection,$select_query);
while($row=mysqli_fetch_array($select_allposts)) {
  $Status=$row['Status'];
  }
  if ($Status=="Publish") {
   $query="UPDATE pages SET Title='$title',username='$fname',publishTime='$fdate',createdDate='$fdate' WHERE id={$id}";
  $update_query=mysqli_query($connection,$query);
  if (!$update_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }  
  }
  if ($Status=="Draft") {
   $query="UPDATE pages SET Title='$title',username='$fname', draftTime='$fdate',createdDate='$fdate' WHERE id={$id}";
  $update_query=mysqli_query($connection,$query);
  if (!$update_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }  
  }
   
}
// -----------------------------
// -----------------------------
if (isset($_POST['delete_post'])) {
   $id=$_POST['deleteID'];  

   $query="SELECT * FROM pages WHERE id={$id}";
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
       $draftTime=$row['draftTime'];
       $publishTime=$row['publishTime'];
       $Visibility=$row['Visibility'];
       $publihedOn=$row['publihedOn'];
       $selectCategory=$row['selectCategory'];
       $categoryName=$row['categoryName'];
       $categoryType=$row['categoryType'];
       $seo_title=$row['seo_title'];
       $url=$row['url'];
       $seo_schema=$row['seo_schema'];
       $image=$row['image'];
       $createdDate=$row['createdDate'];
    }

    if(empty($userid)){ 
          $userid="";  
    }
    if(empty($username)){ 
          $username="";  
    }
    if(empty($Title)){ 
          $Title="";  
    }
    if(empty($Content)){ 
          $Content="";  
    }
    if(empty($Status)){ 
          $Status="";  
    }
    if(empty($draftTime)){ 
          $draftTime="";  
    }
    if(empty($publishTime)){ 
          $publishTime="";  
    }
    if(empty($Visibility)){ 
          $Visibility="";  
    }
    if(empty($publihedOn)){ 
          $publihedOn="";  
    }
    if(empty($selectCategory)){ 
          $selectCategory="";  
    }
     if(empty($categoryName)){ 
         $categoryName="";  
    }
    if(empty($categoryType)){ 
          $categoryType="";  
    }
    if(empty($seo_title)){ 
          $seo_title="";  
    }

    if(empty($url)){ 
          $url="";  
    }
    if(empty($seo_schema)){ 
          $seo_schema="";  
    }

    if(empty( $image)){ 
           $image="";  
    }
     if(empty($createdDate)){ 
           $createdDate="";  
    }

    $query="INSERT INTO trashpages(user_id,username,Title,Content,Status,draftTime,publishTime,Visibility,publihedOn,selectCategory,categoryName,categoryType,seo_title,url,seo_schema,image)VALUES('$userid','$username','$Title','$Content','$Status','$draftTime','$publishTime','$Visibility',' $publihedOn','$selectCategory','$categoryName','$categoryType','$seo_title','$url','$seo_schema','$image')";
    $insert_query=mysqli_query($connection,$query);
    if (!$insert_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }  
  
   $query="DELETE FROM pages WHERE id={$id}";
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
          $post_query_count="SELECT * FROM pages";
          $find_count=mysqli_query($connection,$post_query_count);
          if (!$find_count) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }
          $count=mysqli_num_rows($find_count); 
          $count=ceil($count/$per_page);

// --------------------------
              $query="SELECT * FROM pages LIMIT $page_1,$per_page";
$select_allposts=mysqli_query($connection,$query);
while($row=mysqli_fetch_array($select_allposts)) {
  $id=$row['id'];
  //$_SESSION['dateiIdPage']=$id;
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
   
    <td><label><?php if ($draftTime != "") {
                 echo    $createdDate; 
    }else{
         echo   $createdDate;
    }                        ?></label></td>



    <td><label> <a class="nav-link " href="#" id="actionmenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-ellipsis-v font-24"></i>
        </a>

<!-- <a href="#edit<?php //echo $row['userid']; ?>" data-toggle="modal" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a>  -->


        <div class="dropdown-menu dropdown-menu-right" id="actionmenulist" aria-labelledby="actionmenu">
          <a class="dropdown-item" href="editpages.php?edit=<?php echo $id;   ?>">Edit<i class="fa fa-pencil pad_left_40"></i
            ></a>
  <a class="dropdown-item quickEditPost" data-title="Edit" data-id="<?php echo $id;  ?>" >Quick Edit<i class="fa fa-magic pad"></i></a>
  <!-- <button class="quickEditPost" >edit</button> -->
    <a class="dropdown-item deletePost" data-title="Delete" data-id="<?php echo $id;  ?>">Trash<i class="fa fa-trash padd"></i
            ></a>
             </div>
</label>
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

             echo "<li class='page-item'><a class='page-link active_pagination' href='allpages.php?page={$i}'>{$i}</a></li>";


        }  else {

            echo "<li class='page-item''><a class='page-link' href='allpages.php?page={$i}'>{$i}</a></li>";


        }

         
        }



  ?>
    
 
  </ul>

    <!--  <div class="modal fade" id="del<?php //echo $row['userid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> -->
    <!-- ---------------------- -->
    <div class="modal fade" id="quickeditmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
         
        <h5 class="modal-title" id="exampleModalLongTitle">Edit your page</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
      <div class="modal-body">
        <input type="hidden" name="bookId" id="bookId" value=""/>
   <label>Title</label>
   <input type="text" class="form-control" name="ftitle" id="title" required>
   <label>Author</label>
   <input type="text" class="form-control" name="fname" id="content" required>
    <label>Date</label>
           <input data-date-format="dd/mm/yyyy" id="datepicker" name="fdate" class="form-control">
       
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
<!-- -------------------- -->
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
    $("#title").val(data[1]);
    $("#content").val(data[2]);
    $("#datepicker").val(data[4]);
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