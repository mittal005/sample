<?php include("includes/header.php"); ?>
<?php
if(isset($_GET['edit']))
{
$edit_id=$_GET['edit'];
   
$select_query="SELECT * FROM pages WHERE id=$edit_id";
$select_edit_query=mysqli_query($connection,$select_query);
           
                if (!$select_edit_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }
  
while($row=mysqli_fetch_array($select_edit_query)) {
  $Title=$row['Title'];
  $Content=$row['Content'];
  $seo_title=$row['seo_title'];
  $description=$row['description'];
  $url=$row['url'];
  $seo_schema=$row['seo_schema'];
  $Status=$row['Status'];
  $Visibility=$row['Visibility'];
  $publihedOn=$row['publihedOn'];
  $categoryName=$row['categoryName'];
  $categoryType=$row['categoryType'];
    
  }
}
// ------------------------------------------------------------
if (isset($_POST['update'])) {
   $addTitle=$_POST['addTitle'];
   $postContent=$_POST['postContent'];
   $seo_title=$_POST['seo_title'];
   $description=$_POST['description'];
   $url=$_POST['url'];
   $schema=$_POST['schema'];
   $statusdropdown=$_POST['statusdropdown'];
   date_default_timezone_set("Asia/Kolkata");
     $current_time = date("F j, Y, g:i a");
   $visible=$_POST['visible'];
   $date=$_POST['date'];
   $category_name=$_POST['category_name'];
   $category_type=$_POST['category_type'];
if ($statusdropdown == 'Draft') {
   $query="UPDATE pages SET Title='$addTitle',Content='$postContent',seo_title='$seo_title',description='$description',url='$url',seo_schema='$schema',draftTime='$current_time',Status='$statusdropdown', Visibility='$visible',publihedOn='$date',  categoryName='$category_name',categoryType='$category_type' WHERE id={$edit_id}";
  $update_query=mysqli_query($connection,$query);
  
    if (!$update_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }else{
  header("Location:allpages.php?show=published");
  } 
        }


if ($statusdropdown == 'Publish') {

 $query="UPDATE pages SET Title='$addTitle',Content='$postContent',seo_title='$seo_title',description='$description',url='$url',seo_schema='$schema',publishTime='$current_time',Status='$statusdropdown', Visibility='$visible',publihedOn='$date',  categoryName='$category_name',categoryType='$category_type' WHERE id={$edit_id}";
  $update_query=mysqli_query($connection,$query);
  
    if (!$update_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }else{
  header("Location:allpages.php?show=published");
  } 
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

  <div class="col-md-8 ">
    <div class="row">
      <div class="col-md-12">
    <div class="outer-w3-agile">
     <h3 class="text-center">Edit Pages</h3>
  <hr>
    <form class="" action='' method="post" enctype="multipart/form-data">
<input type="text" class="form-control" name="addTitle"  placeholder="Add Title" value="<?php echo $Title;   ?>">
      <br>
      <!-- <span class="add_media" id="media" readonly="true" >Add Media</span> -->
       <div id="editor">
    
    <div  contentEditable="true" data-text="Enter">
      <textarea id='edit' name="postContent"><?php echo $Content; ?></textarea>
       </div>
  </div>


</div>
</div>
</div><div class="row dash_row">
  <div class="col-md-12">
    <div class="outer-w3-agile">
      <h6>Featured image</h6>
       <span>Add your Featured image:&nbsp;</span> <input type="file" name="post_image">
       <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
     <br>
     (or)
     <br>
      <a href="#"  data-title="fimage" data-toggle="modal" data-target="#fimage"><i class="fa fa-plus"></i>&nbsp;Choose form media library</a>
     
    </div>
  </div>
  </div>

<div class="row dash_row">
  <div class="col-md-12">
    <div class="outer-w3-agile">
     



<div id="seo">
          <div class="card">
<div class="card-header" id="seoone">
      <h5 class="mb-0">
        <a role="button" data-toggle="collapse" data-target="#seos" aria-expanded="true" aria-controls="seos">
        All in One SEO Pack
        </a>
      </h5>
    </div>
     <div id="seos" class="collapse show" aria-labelledby="seoone" data-parent="#seo">
       <div class="card-body">
        



  <div class="snipp">
  <i class="fa fa-question-circle pad"></i>Preview 
  <br>
  <a href="#" class="pad">hello</a>   |  <a href="#" class="pad">hai</a>
  <br>
  <a href="#"></a>
</div>

<div class="popup" onclick="myFunction()"><i class="fa fa-question-circle pad"></i>Title
  <span class="popuptext" id="myPopup"><h6>Title:</h6>
A custom title that shows up in the title tag for this page</span>
</div><input type="text" class="pad form-control" name="seo_title" value="<?php echo $seo_title;   ?>"><br>
<span class="label_border pad">10</span><span>Characeter. Most search engines use a maximum of 60 characters for the Title.</span><br><br>
<div class="popup" onclick="myFunction1()"><i class="fa fa-question-circle pad"></i>Description
  <span class="popuptext" id="myPopup1"><h6>Description:</h6>
The META description for this page. This will override any autogenerated descriptions.</span>
</div>description
<textarea class="form-control pad" name="description"><?php echo $description;   ?></textarea><br>
<span class="label_border pad">100</span><span>Characeter. Most search engines use a maximum of 160 characters for the description.</span><br>
<br>
<div class="popup" onclick="myFunction2()"><i class="fa fa-question-circle pad"></i>Custom Canonical URL:
  <span class="popuptext" id="myPopup2"><h6>Custom Canonical URL:</h6>
Override the canonical URLs for this post.</span>
</div>
<input type="text" class="pad form-control" name="url" value="<?php echo $url;   ?>">
<br>
<i class="fa fa-question-circle pad"></i>Schema
<input type="text" class="pad form-control" name="schema" value="<?php echo  $seo_schema;   ?>">




      </div>
       </div>
          </div>
        </div>


         </div>
  </div>
  </div>


          </div>

         <div class="col-md-4 ">
            <div class="row">
              <div class="col-md-12 outer-w3-agile">
<div id="publish">
            <div class="card">
        <div class="card-header" id="activityone">
      <h5 class="mb-0">
        <a role="button" data-toggle="collapse" data-target="#activity" aria-expanded="true" aria-controls="activity">
       Publish
        </a>
      </h5>
    </div>
     <div id="activity" class="collapse show" aria-labelledby="activityone" data-parent="publish">
       <div class="card-body">
       <!-- <div class="row">
      <div class="col-md-6"> <button class="btn btn-primary">Preview</button></div><div class="col-md-6"
        ><button class="btn btn-primary" id="btn1" name="saveDraft">Save Draft</button></div></div> -->
       <br>
       <i class="fa fa-key"></i>&nbsp;<span class="mar_right_20">Status:</span><label id="status" class="mar_right_20"></label><a href="#" onclick="status('answer1');return false;">Edit</a>
       <br>
       <div id="edit_pub">
       <form class="mar_top_20">
       <select class="form-control" name="statusdropdown"  onchange="jsFunction(this.value);">
          <option value="Draft" <?php if($Status=="Draft") echo 'selected="selected"'; ?>>Draft</option>
          <option value="Publish" <?php if($Status=="Publish") echo 'selected="selected"'; ?>>Publish</option>
        </select>
        <!-- <button class="btn btn-primary mar_top_20">OK</button>
       <button class="btn btn-primary mar_top_20">Cancel</button> -->
      </div>
       <!-- </form> -->
       <i class="fa fa-eye"></i>&nbsp;<span class="mar_right_20">Visibility:</span><label id="result" class="mar_right_20"></label> <a href="#" onclick="showStuff('answer2'); return false;">Edit</a>
       <!-- <form> -->
     <span id="answer2" style="display: none;">
        <input type="radio" name="visible" value="Public" <?php echo ($Visibility== 'Public') ? "checked" : "" ; ?>/ class="mar_top_20">Public<br>
        <input type="radio" name="visible" value="Private" <?php echo ($Visibility== 'Private') ? "checked" : "" ; ?>/>Private</span>
       <!-- </form> -->
       <div>
          <i class="fa fa-calendar"></i>&nbsp;<span class="mar_right_20">Published On:</span>
          <label id="result" class="mar_right_20"></label> <a href="#" onclick="showStuff('answer3'); return false;">Edit </a>
     <span id="answer3" style="display: none;">
         <input type="date" name="date" value="<?php echo $publihedOn; ?>"></span>  
       </div>
</div>  
     </div>
     <br>
     <input type="submit" class="btn btn-primary col-md-3" name="update" value="Update">
    <!--  <button  class="btn btn-primary col-md-3">Update</button>  -->  
            </div>
          </div>
              </div>
            </div>

<div class="row dash_row outer-w3-agile">
  <div class="col-md-12">




<div id="category">
          <div class="card">
<div class="card-header" id="categoryone">
      <h5 class="mb-0">
        <a role="button" data-toggle="collapse" data-target="#cat" aria-expanded="true" aria-controls="cat">
         Category
        </a>
      </h5>
    </div>
     <div id="cat" class="collapse show" aria-labelledby="categoryone" data-parent="#category">
       <div class="card-body">
        

<div class = "tabinator">
  
  <input type = "radio" id = "tab1" name = "tabs" checked>
  <label for = "tab1">All category</label>
  <input type = "radio" id = "tab2" name = "tabs">
  <label for = "tab2">Most used</label>
  
  <div id = "content1">
     <?php
                           //$connection=mysqli_connect('localhost','root','','admin');
                           $select_query="SELECT name FROM category ORDER BY id DESC LIMIT 5";
                           $select_all_categories_query=mysqli_query($connection, $select_query);
                if (!$select_all_categories_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }
                            while($row=mysqli_fetch_array($select_all_categories_query)){
                              $name=$row['name'];
                                              ?>
                    <input type="checkbox" class="mar_top_20"> <?php echo $name;    ?><br>
                                        
                                        <?php
                                      }
                                        ?>
     
  </div>
 
</div>

<br>
<a href="#" onclick="category()" class="mar_top_20"><i class="fa fa-plus"></i>Add new Category</a>

      </div>
       </div>
          </div>
        </div>

<div id="ncategory" class=" mar_top_20">
  <input type="text" class="form-control mar_top_20"  name="category_name" value="<?php echo $categoryName;   ?>">
  <select class="form-control mar_top_20" name="category_type">
    <option>Parent Category</option>
    <?php
    
                           //$connection=mysqli_connect('localhost','root','','admin');
                           $select_query="SELECT DISTINCT name FROM category";
                           $select_all_categories_query=mysqli_query($connection, $select_query);
                if (!$select_all_categories_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }
                            while($row=mysqli_fetch_array($select_all_categories_query)){
                              $name=$row['name'];
                       
                    ?>
  <option <?php if($name==$categoryType) echo 'selected="selected"'; ?>> <?php echo $name;    ?></option>
                                       
                                     <?php
                                      }
                                        ?>
    
  
   
  
  </select>
  <button class="btn btn-primary button-top" name="add_new_category">Add new</button>
</form>
</div>


  </div>
</div>



<script> 
        function displayRadioValue() { 
            var ele = document.getElementsByName('gender'); 
              
            for(i = 0; i < ele.length; i++) { 
                if(ele[i].checked) 
                document.getElementById("result").innerHTML
                        = ele[i].value; 
                        document.getElementById('visi').style.display="none";
            } 
        } 
    </script>
    <script src="dropzone/dist/dropzone.js" type="text/javascript"></script>
<script type="text/javascript">
  Dropzone.autoDiscover = false;
  var dropzone1 = new Dropzone('#imageDropzone', {
          maxFiles:5,
          forceFallbacks:true,
          autoDiscover:false,
          createImageThumbnails:false,
          init:function(){
              this.on("success",function (file,response){
                  alert(response);
              });
          }
     });
 </script> 
     <script>
function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}
  function myFunction1() {
  var popup = document.getElementById("myPopup1");
  popup.classList.toggle("show");
}
function myFunction2() {
  var popup = document.getElementById("myPopup2");
  popup.classList.toggle("show");
  }
</script> 
 <script type="text/javascript">
function showStuff(id) {
    document.getElementById(id).style.display = 'block';
}
</script>
  <script>
function jsFunction(value)
{
    document.getElementById('status').innerHTML = value;
    document.getElementById('btn1').style.display="block";
document.getElementById('btn1').innerHTML=value;

}
 



</script>
 <script>
    function category()
    {
      document.getElementById('ncategory').style.display="block";
    }
    function status()
    {

  document.getElementById('edit_pub').style.display='block';
    }
    function Visibility()
    {
      document.getElementById('visi').style.display="block";
    }
  </script>
  <script>
    (function () {
      new FroalaEditor("#edit", {
         initOnClick: true
    
      })
    })()
  </script>
   
</body>

</html>
