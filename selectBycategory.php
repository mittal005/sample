<?php
if (isset($_POST['update_post'])) {
   $id=$_POST['bookId'];  
   $title=$_POST['ftitle'];
   $fname=$_POST['fname'];
   $fdate=$_POST['fdate'];
   //$password=$_POST['fdate'];
   $select_query="SELECT Status FROM posts WHERE id=$id";
$select_allposts=mysqli_query($connection,$select_query);
while($row=mysqli_fetch_array($select_allposts)) {
  $Status=$row['Status'];
  }
  if ($Status=="Publish") {
   $query="UPDATE posts SET Title='$title',username='$fname',publishTime='$fdate' WHERE id={$id}";
  $update_query=mysqli_query($connection,$query);
  if (!$update_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }  
  }
  if ($Status=="Draft") {
   $query="UPDATE posts SET Title='$title',username='$fname', draftTime='$fdate' WHERE id={$id}";
  $update_query=mysqli_query($connection,$query);
  if (!$update_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }  
  }
   
}
// -----------------------------
if (isset($_POST['delete_post'])) {
       $id=$_POST['deleteID']; 

   $query="SELECT * FROM posts WHERE id={$id}";
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
       $Format=$row['Format'];
       $selectCategory=$row['selectCategory'];
       $categoryName=$row['categoryName'];
       $categoryType=$row['categoryType'];
       $seo_title=$row['seo_title'];
       $url=$row['url'];
       $seo_schema=$row['seo_schema'];
       $image=$row['image'];
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
    if(empty($Format)){ 
          $Format="";  
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

    $query="INSERT INTO trash(user_id,username,Title,Content,Status,draftTime,publishTime,Visibility,publihedOn,Format,selectCategory,categoryName,categoryType,seo_title,url,seo_schema,image)VALUES('$userid','$username','$Title','$Content','$Status','$draftTime','$publishTime','$Visibility',' $publihedOn','$Format','$selectCategory','$categoryName','$categoryType','$seo_title','$url','$seo_schema','$image')";
    $insert_query=mysqli_query($connection,$query);
    if (!$insert_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }  
   
  
   $query="DELETE FROM posts WHERE id={$id}";
  $delete_query=mysqli_query($connection,$query);
  if (!$delete_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }  
}
// ----------------------------------------
 $selectByAuthor=$_POST['selectByAuthor'];  
 $selectByCategory=$_POST['selectByCategorySort'];
 $selectByFormat=$_POST['selectByFormat'];
 if (($selectByAuthor=='allauthor') && ($selectByCategory=='allcategory') && ($selectByFormat=='format')) {
   header("Location:allpost.php");
 }
  else if (!($selectByAuthor=='allauthor') && !($selectByCategory=='allcategory') && !($selectByFormat=='format')){
      
  
   $select_by_category_query="SELECT * FROM posts  WHERE  username='{$selectByAuthor}' AND Format='{$selectByFormat}'AND categoryName='{$selectByCategory}'";
  $show_by_category_query=mysqli_query($connection,$select_by_category_query);
  if (!$show_by_category_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }  
  
  while($row=mysqli_fetch_array($show_by_category_query)) {
  $id=$row['id'];
  $title=$row['Title'];
  $username=$row['username'];
  $categoryName=$row['categoryName'];
  $draftTime=$row['draftTime'];
  $publishTime=$row['publishTime'];
  ?>
      
  <tr>
    <td><!-- <input type="checkbox" class="checkthis" /> --></td>
    <td class="author_td"><label><?php echo $title;  ?></label></td>
    <td><label><?php echo $username;  ?></label></td>
    <td class="page_control"><label><?php echo $categoryName;  ?></label></td>

    <!-- <td><label></label></td>
    <td><label></label></td> -->
   
    <td><?php if ($draftTime != "") {
                 echo    $draftTime; 
    }else{
         echo    $publishTime;
    }                        ?></td>



    <td> <a class="nav-link " href="#" id="actionmenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-ellipsis-v font-24"></i>
        </a>

<!-- <a href="#edit<?php //echo $row['userid']; ?>" data-toggle="modal" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a>  -->


        <div class="dropdown-menu dropdown-menu-right" id="actionmenulist" aria-labelledby="actionmenu">
          <a class="dropdown-item" href="editpost.php?edit=<?php echo $id;   ?>">Edit<i class="fa fa-pencil pad_left_40"></i
            ></a>
 <a class="dropdown-item quickEditPost" data-title="Edit" data-id="<?php echo $id;  ?>" >Quick Edit<i class="fa fa-magic pad"></i></a>
  <!-- <button class="quickEditPost" >edit</button> -->
     <a class="dropdown-item deletePost" data-title="Delete" data-id="<?php echo $id;  ?>">Trash<i class="fa fa-trash padd"></i
            ></a>
             </div>

</td>
    </tr>
</tbody>
<?php
}
}else if(!($selectByAuthor=='allauthor') && ($selectByCategory=='allcategory') && ($selectByFormat=='format')){
include "includes/selectByAuthor.php";
}else if(($selectByAuthor=='allauthor') && !($selectByCategory=='allcategory') && ($selectByFormat=='format')){
include "includes/selectByAllCategory.php";
}else if(($selectByAuthor=='allauthor') && ($selectByCategory=='allcategory') && !($selectByFormat=='format')){
include "includes/selectByFormat.php";
}else if(!($selectByAuthor=='allauthor') && !($selectByCategory=='allcategory') && ($selectByFormat=='format')){
include "includes/selectByAuthorAndCategory.php";
}else if(!($selectByAuthor=='allauthor') && ($selectByCategory=='allcategory') && !($selectByFormat=='format')){
include "includes/selectByAuthorAndFormat.php";
}else if(($selectByAuthor=='allauthor') && !($selectByCategory=='allcategory') && !($selectByFormat=='format')){
include "includes/selectByCategoryAndFormat.php";
}
else{
  echo "Nothing to show";
}


?>
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
   <label>Title</label>
   <input type="text" class="form-control" name="ftitle" id="title" required>
   <label>Author</label>
   <input type="text" class="form-control" name="fname" id="content" required>
    <label>Date</label>
           <input data-date-format="dd/mm/yyyy" id="datepicker" name="fdate" class="form-control">
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