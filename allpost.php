<?php include("includes/header.php"); ?>
<?php

//$connection=mysqli_connect('localhost','root','','admin');
              $query="SELECT * FROM posts";
$select_allposts=mysqli_query($connection,$query);

if($select_allposts){
     $total_posts = mysqli_num_rows($select_allposts); 
     
          }  

$publish_query="SELECT Status FROM posts WHERE Status='Publish'";
$select_publish_query=mysqli_query($connection,$publish_query);
if($select_publish_query){
     $publish_posts = mysqli_num_rows($select_publish_query); 
               }  

$draft_query="SELECT Status FROM posts WHERE Status='Draft'";
$select_draft_query=mysqli_query($connection,$draft_query);
if($select_draft_query){
     $draft_posts = mysqli_num_rows($select_draft_query); 
               } 

  $query="SELECT * FROM trash";
$select_alltrash=mysqli_query($connection,$query);

if($select_alltrash){
     $total_trash = mysqli_num_rows($select_alltrash); 
     
          }                 

?>
<!-- ------------------------------sorting------------------ -->
<?php


?>
<!-- ---------------------------------------- -->
<body id="page-top">

 <?php include("includes/topnav.php"); ?>

  <div id="wrapper">

    <!-- Sidebar -->
    
<?php include("includes/sidenav.php"); ?>

      <div class="container-fluid">
        <div class="row dash_row outer-w3-agile">
            <div class="col-md-12">
              <div class="row">
          <div class="col-md-6">
         <a href="allpost.php?show=all"> All (<span><?php echo $total_posts;    ?></span>) </a> |  <a href="allpost.php?show=published"> Published </a> (<span><?php echo $publish_posts;   ?></span>)  | <a href="allpost.php?show=draft">  Draft </a>(<span><?php echo $draft_posts; ?></span>)|<a href="allpost.php?show=trash"> Trash </a> (<span><?php echo $total_trash;   ?></span>)

        </div>
         <div class="col-md-2 offset-2">
    <form action="" method="post">
    <input type="text" name="search" class="form-control" placeholder="Search By Title">
  </div>
  <div class="col-md-2 ">
    <input type="submit" name="selectByTitle" class="btn btn-primary col-md-5" value="Search">
     <!-- <button type="button" class="btn btn-primary" >Apply</button> -->
      </form>
  </div>
</div>
      
<div class="row dash_row" id="filter">
<!-- ---------------------------select by category---------------------- -->
 

   <div class="col-md-2">
    <form action="" method="post">

    <select class="form-control" name="selectByAuthor">

      <option value="allauthor">All Author</option>
       <?php
                           // $connection=mysqli_connect('localhost','root','','admin');
                           $select_query="SELECT DISTINCT username FROM posts";
                           $select_all_categories_query=mysqli_query($connection, $select_query);
                if (!$select_all_categories_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }
                            while($row=mysqli_fetch_array($select_all_categories_query)){
                              $author=$row['username'];
                          
                    ?>
                                        <option> <?php echo $author;    ?></option>
                                       
                                        <?php
                                      }
                                        ?>
    </select>
  </div>
  <div class="col-md-2">
    <select class="form-control" name="selectByCategorySort">
      <option value="allcategory">All Category</option>
       <?php
                           // $connection=mysqli_connect('localhost','root','','admin');
                           $select_query="SELECT DISTINCT categoryName FROM posts";
                           $select_all_categories_query=mysqli_query($connection, $select_query);
                if (!$select_all_categories_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }
                            while($row=mysqli_fetch_array($select_all_categories_query)){
                              $category_sort=$row['categoryName'];
                          
                    ?>
                                        <option> <?php echo $category_sort;    ?></option>
                                       
                                        <?php
                                      }
                                        ?>
    </select>
  </div>
  <div class="col-md-2">
    <select class="form-control" name="selectByFormat">
      <option value="format">Format</option>
       <?php
                           // $connection=mysqli_connect('localhost','root','','admin');
                           $select_query="SELECT DISTINCT Format FROM posts";
                           $select_all_categories_query=mysqli_query($connection, $select_query);
                if (!$select_all_categories_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }
                            while($row=mysqli_fetch_array($select_all_categories_query)){
                              $Format=$row['Format'];
                          
                    ?>
                                        <option> <?php echo $Format;    ?></option>
                                       
                                        <?php
                                      }
                                        ?>
    </select>
  </div>
  <div class="col-md-2">
   <input type="submit" name="selectByCategory" class="btn btn-primary col-md-5" value="Apply">
     <!-- <button type="button" class="btn btn-primary" name="selectByCategory">Apply</button> -->
      </form>
  </div>

<!-- ------------------------------------------------------------------------ -->
  <div class="col-md-2">
    <form action="" method="post">
    <select class="form-control" name="byDate">
      <option value="alldates">All Dates</option>
      <?php
                           // $connection=mysqli_connect('localhost','root','','admin'); 
      
                           $select_query="SELECT DISTINCT onlyDate FROM posts";
                           $select_all_categories_query=mysqli_query($connection, $select_query);
                if (!$select_all_categories_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }
                            while($row=mysqli_fetch_array($select_all_categories_query)){
                              $Date=$row['onlyDate'];
                          
                    ?>
                                        <option> <?php echo $Date;    ?></option>
                                       
                                        <?php
                                      }
                                        ?>
    </select>
  </div>
  <div class="col-md-2 ">
    <input type="submit" name="selectByDate" class="btn btn-primary col-md-5" value="Apply">
     <!-- <button type="button" class="btn btn-primary" >Apply</button> -->
      </form>
  </div>
  
</div>
</div>
</div>
        <div class="row dash_row">
        <div class="col-md-12 outer-w3-agile">
              <div class="table-responsive">

                
              <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   
                   <th><!-- <input type="checkbox" id="checkall" /> --></th>
                   <th>Title</th>
                    <th>Author</th>
                     <th>Categories</th>
                     <!-- <th>Tags</th>
                     <th>Comment</th> -->
                     <th>Date</th>
                     <th>Edit</th>
                   
                   </thead>
    <tbody>


      <?php if(isset($_GET['show'])){
        $show=$_GET['show'];
      }
      else{
  $show='';
}
if (!isset($_POST['selectByCategory']) && !isset($_POST['selectByDate']) && !isset($_POST['selectByTitle'])) {
switch ($show) {
             case 'published';
               include "published_posts.php"; 
               break;
              case 'draft':
              include "draft_posts.php"; 
               break;
               case 'all':
              include "allposts.php"; 
               break;
               case 'sort':
              include "sort.php"; 
               break;
               case 'trash':
                include "trash.php"; 
                 break;
              default:
               include "allposts.php"; 
               break;
           }   
         }
         ?>
<!-- // ---------------------------selectByCategory---------------------------------- -->
<?php
if (isset($_POST['selectByCategory'])) {
  include "selectBycategory.php";
}
?>
<!-- // --------------------------------selectbydate--------------------------------- -->
<?php
if (isset($_POST['selectByDate'])) {
  
$publihedOn=$_POST['byDate'];
if ($publihedOn=='alldates') {
  header("Location:allpost.php");
}else{
  include "includes/selectByDate_posts.php";
}


}
      ?>
<!-- ------------------------------------searchbytitle---------------------------------- -->   

<?php
     
if (isset($_POST['selectByTitle'])) {
  include "includes/searchByTitle.php";

}
         ?>
            </div>

                </div>
              </div>
      </div>
 <!-- --------------------------------------------- -->
   
<!-- ------------------------------------------------ -->
   
<!-- ----------------------------------------------------- -->



<!-- ------------------------------------------------------- -->
  <!-- Custom scripts for all pages-->
 <script type="text/javascript">
    $('#datepicker').datepicker({
        weekStart: 1,
        daysOfWeekHighlighted: "6,0",
        autoclose: true,
        todayHighlight: true,
    });
    $('#datepicker').datepicker("setDate", new Date());
</script> 

</body>

</html>