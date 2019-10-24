<?php include("includes/header.php"); ?>
<?php

//$connection=mysqli_connect('localhost','root','','admin');
              $query="SELECT * FROM pages";
$select_allposts=mysqli_query($connection,$query);

if($select_allposts){
     $total_posts = mysqli_num_rows($select_allposts); 
     
          }  

$publish_query="SELECT Status FROM pages WHERE Status='Publish'";
$select_publish_query=mysqli_query($connection,$publish_query);
if($select_publish_query){
     $publish_posts = mysqli_num_rows($select_publish_query); 
               }  

$draft_query="SELECT Status FROM pages WHERE Status='Draft'";
$select_draft_query=mysqli_query($connection,$draft_query);
if($select_draft_query){
     $draft_posts = mysqli_num_rows($select_draft_query); 
               }  
 $query="SELECT * FROM trashpages";
$select_allposts=mysqli_query($connection,$query);

if($select_allposts){
     $total_trash = mysqli_num_rows($select_allposts); 
     
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
          <div class="col-md-4">
         <a href="allpages.php?show=all"> All (<span><?php echo $total_posts;    ?></span>) </a> |  <a href="allpages.php?show=published"> Published </a> (<span><?php echo $publish_posts;   ?></span>)  | <a href="allpages.php?show=draft">  Draft </a>(<span><?php echo $draft_posts; ?></span>)|  <a href="allpages.php?show=trash"> Trash </a> (<span><?php echo $total_trash;   ?></span>) <!-- <a href="#"> Trash</a> (<span></span>) -->

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
                           $select_query="SELECT DISTINCT username FROM pages";
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
              $select_query="SELECT DISTINCT createdDate FROM pages";
                           $select_all_categories_query=mysqli_query($connection, $select_query);
                if (!$select_all_categories_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }
                            while($row=mysqli_fetch_array($select_all_categories_query)){
                              $Date=$row['createdDate'];
                          
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
  <div class="col-md-2">
    <form action="" method="post">
    <input type="text" name="search" class="form-control" placeholder="Search By Title">
  </div>
  <div class="col-md-2 ">
    <input type="submit" name="selectByTitle" class="btn btn-primary col-md-5" value="Search">
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
               include "includes/published_pages.php"; 
               break;
              case 'draft':
              include "includes/draft_pages.php"; 
               break;
               case 'all':
              include "includes/allpages.php";  
               break;
              case 'trash':
              include "includes/trashPages.php"; 
               break;

              default:
              include "includes/allpages.php"; 
               break;
           }   
         }
         ?>
<!-- // ---------------------------selectByCategory---------------------------------- -->
<?php
if (isset($_POST['selectByCategory'])) {
    $selectByAuthor=$_POST['selectByAuthor'];
  if ($selectByAuthor !='allauthor') {
    include "includes/selectByAuthor_pages.php";
    
  }else{
    header("Location:allpages.php");
    
  }
  }

?>
<!-- // --------------------------------selectbydate--------------------------------- -->
<?php
if (isset($_POST['selectByDate'])) {
  $byDate=$_POST['byDate'];
  if ($byDate !='alldates') {

  include "includes/selectByDate_pages.php";
}else{
    header("Location:allpages.php");
    
  }

}
      ?>
  <!-- ----------------------searchbytitle------------ -->    
      <?php
     
if (isset($_POST['selectByTitle'])) {
  include "includes/searchByTitle_pages.php";

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