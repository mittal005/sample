
<?php include("includes/header.php"); ?>
<?php 
if (isset($_POST['update_post'])) {
   $id=$_POST['bookId'];  
   $title=$_POST['ftitle'];
   $fname=$_POST['fname'];
   $query="UPDATE quickdraft SET title='$title',content='$fname' WHERE id={$id}";
  $update_query=mysqli_query($connection,$query);
  if (!$update_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }  
  }
?>
  <?php
  //-----------------------------------
              $query="SELECT * FROM posts";
$select_allposts=mysqli_query($connection,$query);
if($select_allposts){
     $total_posts_posts = mysqli_num_rows($select_allposts); 
          }  
           $query="SELECT * FROM pages";
$select_allpages=mysqli_query($connection,$query);
if($select_allpages){
     $total_posts_pages = mysqli_num_rows($select_allpages); 
          }  
?>
<body id="page-top">
 <?php include("includes/topnav.php"); ?>
  <div id="wrapper">
    <!-- Sidebar -->
<?php include("includes/sidenav.php"); ?>
 <div class="container-fluid">
  <div class="col-md-12">
<div class="row dash_row outer-w3-agile1"> 
 <div class="text-centr">
  <h5> Welcome to Dashboard</h5>
  </div>
</div>
</div>
  <div class="row ">
    <div class="col-md-5 dash_row">
      <div class="row">
        <div class="col-md-12 outer-w3-agile">
          <div id="accordion">
          <div class="card">
<div class="card-header" id="glanceone">
      <h5>
        <a role="button" data-toggle="collapse" data-target="#glance" aria-expanded="true" aria-controls="glace">
         At a Glance
        </a>
      </h5>
    </div>
     <div id="glance" class="collapse show" aria-labelledby="glanceone" data-parent="#accordion">
       <div class="card-body">
        <div class="row mar_bottom_20">
          <div>
          <i class="fa fa-thumb-tack"></i>&nbsp;
          <span><?php  echo  $total_posts_posts;       ?></span>&nbsp;<a href="allpost.php">Post</a>
        </div>
       <div class="offset-3">
          <i class="fa fa-file"></i>&nbsp;
          <span><?php echo  $total_posts_pages;        ?></span>&nbsp;<a href="allpages.php">Pages</a>
        </div>
      </div>
         </div>
        </div>
        <!-- <div class="row">
          <div class="col-md-6 col-">
          <i class="fa fa-comments"></i>
          <span></span><a href="#">Comments</a>      
        </div>
        </div> -->
     
      </div>
       </div>
          </div>
      </div>
      <div class="row dash_row">
        <div class="col-md-12 outer-w3-agile">
          <div id="accordion2">
            <div class="card">
<div class="card-header" id="activityone">
      <h5>
        <a role="button" data-toggle="collapse" data-target="#activity" aria-expanded="true" aria-controls="activity">
       Activity
        </a>
      </h5>
    </div>
     <div id="activity" class="collapse show" aria-labelledby="activityone" data-parent="#accordion2">
      
      <div class="card-body">
      <h6>Recently Published</h6>
      <?php
$select_query="SELECT * FROM posts ORDER BY id DESC LIMIT 5";
                $select_all_categories_query=mysqli_query($connection, $select_query);
                if (!$select_all_categories_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }
                    while($row=mysqli_fetch_array($select_all_categories_query)){
                      $Title=$row['Title'];"&nbsp";
                      $publishTime=$row['publishTime']."<br>";
                      $publishTime=$publishTime ;             
                   ?>  
       <a href="#"> <label><?php echo $Title; ?></label></a> <span>  <?php echo $publishTime;  ?> </span>
        <?php
      }
      ?>
   </div>
     </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="offset-1 col-md-6">
<div class="outer-w3-agile dash_row">
<div class="card">
<div class="card-header" id="draftone">
      <h5 class="mb-0">
        <a >
       Quick Draft
        </a>
      </h5>
    </div>
       <div class="card-body">
<form action="" method="post">
  <label>Title</label>
  <input class="form-control" type="text" name="title" placeholder="Title">
  <label>Content</label>
  <textarea class="form-control" size="10" type="text" name="content" placeholder="Content"></textarea> 
  <button class="btn btn-primary button-top" name="save_draft">Save Draft</button>

</form>

<?php
   if (!isset($_POST['selectBytitle'])) {        
              $query="SELECT * FROM quickdraft";
$select_quickdraft=mysqli_query($connection,$query);
while($row=mysqli_fetch_array($select_quickdraft)) {
  $id=$row['id'];
  $title=$row['title'];
  $content=$row['content'];
}
}
if (isset($_POST['save_draft'])) {
    $title=$_POST['title'];
    $content=$_POST['content'];  
    if (!empty($title)&& !empty($content)) {
     $connection=mysqli_connect('localhost','root','','admin');
         $title=mysqli_real_escape_string($connection,$title);
$content=mysqli_real_escape_string($connection,$content);
     $query="INSERT INTO quickdraft(title,content)VALUES('$title','$content')";
          $insert_draft=mysqli_query($connection,$query);
         if (! $insert_draft) {
        die('query FAILED . mysqli_error($connection)');
                             }

               // $message="";    
                             $select_query="SELECT * FROM quickdraft ORDER BY id DESC LIMIT 5";
                $select_all_categories_query=mysqli_query($connection, $select_query);
                if (!$select_all_categories_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }
                    while($row=mysqli_fetch_array($select_all_categories_query)){
                      $id=$row['id'];
                      $show_title=$row['title'];
                      $show_time=$row['time'];
                      $show_time=substr($show_time,0,-7)."<br>";
          ?>
<hr>
<h6>Your recent draft</h6>
<div id="recentdraft">
 <a class="dropdown-item quickEditPost" data-title="Edit" data-id="<?php echo $id;  ?>"> <?php echo  $show_title;   ?></a><label><?php echo  $show_time;   ?></label>
</div>
<?php
 }  
}
}
?>

</div>
</div>
</div>
</div>
</div>
</div>
 <!----------------------->
 <div class="modal fade" id="quickeditmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
         
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Draft</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
      <div class="modal-body">
        <input type="hidden" name="bookId" id="bookId" value="">
   <label>Title</label>
   <input type="text" class="form-control" name="ftitle" id="ftitle" required>
   <label>Content</label>
   <input type="text" class="form-control" name="fname" id="fname" required>
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
<!------------------------->
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
     });
});
</script>
</body>

</html>
