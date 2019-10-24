<?php include("includes/header.php"); ?>
<?php
if(isset($_POST['saveDraft']))
{
  $username=$_SESSION['username'];

    $user_id=$_SESSION['user_id'];
    if(!empty($_POST['addTitle'])) {
    $addTitle=$_POST['addTitle'];
  }else{
        $addTitle="no title";
      }
      if(!empty($_POST['postContent'])) {
    $postContent=$_POST['postContent'];
  }else{
    $postContent="no content";
  }
     $statusdropdown=$_POST['statusdropdown'];
     if(!empty($_POST['visible1'])) {
        $visible=$_POST['visible1'];
      }else{
        $visible="";
      }
      if(!empty($_POST['x'])) {
        $x=$_POST['x'];
      }else{
        $x="";
      }
    date_default_timezone_set("Asia/Kolkata");
     $current_time = date("F j, Y, g:i a");
     if(!empty($_POST['selectCategory'])) {
     //$selectCategory=$_POST['selectCategory'];
      //$selectCategory= array();
       $selectCategory=implode(',', $_POST['selectCategory']);
       //echo $selectCategory=$_POST["selectCategory"];
     //$selectCategory = implode(",", $selectCategory);
   }else{
        $selectCategory="uncategorized";
   }
   if(!empty($_POST['category_name'])) {
     $category_name=$_POST['category_name'];
   }else{
       $category_name="uncategorized";
   }
   if(!empty($_POST['category_type'])) {
     $category_type=$_POST['category_type'];
   }else{
       $category_type="uncategorized";
   }
     if(!empty($_POST['seo_title'])) {
      $seo_title=$_POST['seo_title'];
    }else{
      $seo_title="no title";
    }
    if(!empty($_POST['description'])) {
    $description=$_POST['description'];
  }else{
    $description="no description";
  }
  if(!empty($_POST['url'])) {
     $url=$_POST['url'];
   }else{
    $url="no url";
   }
   if(!empty($_POST['schema'])) {
     $schema=$_POST['schema'];
   }else{
    $schema="no schema";
   }
     date_default_timezone_set("Asia/Kolkata");
     $current_time= date('d-m-y');
     // ------------------------------------------
      //$_FILES['post_image']['name'];
      //if(!file_exists($_FILES['post_image']['name'])){ 
     //if(!empty($_POST['post_image'])) {
   $post_image=$_FILES['post_image']['name'];
   $type = $_FILES['post_image']['type'];
   $post_image_temp=$_FILES['post_image']['tmp_name'];
   move_uploaded_file($post_image_temp,"gallery/$post_image");
  //$extension = substr($post_image, strpos($post_image, '.') + 1);

   if ($statusdropdown == 'Draft') {
 $query="INSERT INTO posts(username,user_id,Title,Content,Status,Visibility,Format,draftTime,selectCategory,categoryName,categoryType,seo_title,description, url,seo_schema,image, onlyDate)VALUES('$username','$user_id','$addTitle','$postContent','$statusdropdown','$visible','$x','$current_time','$selectCategory','$category_name','$category_type','$seo_title','$description','$url','$schema','$post_image','$current_time')";
  $create_post_query=mysqli_query($connection,$query);
  if (!$create_post_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }
}
// ----------------------------------------
if ($statusdropdown == 'Publish') {
 $query="INSERT INTO posts(username,user_id,Title,Content,Status,Visibility,Format,publishTime,selectCategory,categoryName,categoryType,seo_title,description, url,seo_schema,image, onlyDate)VALUES('$username','$user_id','$addTitle','$postContent','$statusdropdown','$visible','$x','$current_time','$selectCategory','$category_name','$category_type','$seo_title','$description','$url','$schema','$post_image','$current_time')";
  $create_post_query=mysqli_query($connection,$query);
  if (!$create_post_query) {
      printf("Error: %s\n", mysqli_error($connection));
    exit();
                             }
}

$fid_select="SELECT id FROM posts ORDER BY id DESC LIMIT 1";
$fid_query=mysqli_query($connection,$fid_select);
  if (!$fid_query) {
      printf("Error: %s\n", mysqli_error($connection));
    exit();
                             }
  while($row=mysqli_fetch_array($fid_query)){
            $fid=$row['id'];

  
                             } 

$fid_insert="INSERT INTO category(fid,selectCategory,categoryName,parentcategory)VALUES('$fid','$selectCategory','$category_name','$category_type')";
 $fid_insert_query=mysqli_query($connection,$fid_insert);
  if (!$fid_insert_query) {
      printf("Error: %s\n", mysqli_error($connection));
    exit();
  }






                             } 








  

// ------------------------------------------------------------
if(isset($_POST['add_new_category']))
{
  
  $category_name=$_POST['category_name'];
     $category_type=$_POST['category_type'];
 // $connection=mysqli_connect('localhost','root','','admin');


 $query="INSERT INTO category(name,parentcategory)VALUES('$category_name','$category_type')";
  $create_post_query=mysqli_query($connection,$query);
   if (!$create_post_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }
  
}

?>
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" > -->
<!-- <link href="dropzone/dist/dropzone.css" rel="stylesheet"> -->
<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"> -->
<style>
    .imagebox img{border: 1px solid #c9c9c9;padding: 5px;margin-bottom: 10px;}
</style>

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
     <h3 class="text-center">Add Post</h3>
  <hr>
    <form class="" action='' method="post" enctype="multipart/form-data">
      <input type="text" class="form-control" name="addTitle"  placeholder="Add Title" >
      <br>
      <!-- <span class="add_media" id="media" readonly="true">Add Media</span> -->
       <!-- <div id="editor">
    
    <div  contentEditable="true" data-text="Enter">
      <textarea id='edit' name="postContent"></textarea>
       </div>
  </div> -->

  <div id="editor">
    <div style="margin-top: 30px;">
      <textarea id='edit' name="postContent"></textarea>
    </div>
  </div>


</div>
</div>
</div>
<div class="row dash_row">
  <div class="col-md-12">
    <div class="outer-w3-agile">
      <h6>Featured image</h6>
       <span>Add your Featured image:</span> <input type="file" name="post_image">
       <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
     <br>
     (or)
     <br>
      <a href="#"  data-title="fimage" data-toggle="modal" data-target="#fimage"><i class="fa fa-plus"></i>&nbsp;Add Featured image</a>
     
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
</div> <input type="text" class="pad form-control" name="seo_title"><br>
<span class="label_border pad">10</span><span>Characeter. Most search engines use a maximum of 60 characters for the Title.</span><br><br>
<div class="popup" onclick="myFunction1()"><i class="fa fa-question-circle pad"></i>Description
  <span class="popuptext" id="myPopup1"><h6>Description:</h6>
The META description for this page. This will override any autogenerated descriptions.</span>
</div>
<textarea class="form-control pad" name="description"></textarea><br>
<span class="label_border pad">100</span><span>Characeter. Most search engines use a maximum of 160 characters for the description.</span><br>
<br>
<div class="popup" onclick="myFunction2()"><i class="fa fa-question-circle pad"></i>Custom Canonical URL:
  <span class="popuptext" id="myPopup2"><h6>Custom Canonical URL:</h6>
Override the canonical URLs for this post.</span>
</div>
<input type="text" class="pad form-control" name="url">

<i class="fa fa-question-circle pad"></i>Schema
<input type="text" class="pad form-control" name="schema">




      </div>
       </div>
          </div>
        </div>


         </div>
  </div>
  </div>


    			</div>


          <div class="col-md-4">
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
<div class="row">
       <div class="col-md-6"> <!-- <button class="btn btn-primary">Preview</button> --></div><div class="col-md-6 offset-8"
        ><button class="btn btn-primary" id="btn1" name="saveDraft">Save Draft</button></div></div>
       <!-- <br> -->
       <i class="fa fa-key"></i><span class="mar_right_20">&nbsp;&nbsp;Status:</span><label id="status" class="mar_right_20"></label><a href="#" onclick="dis()">Edit</a>
       <br>
       <div id="edit_pub">
       <div class="mar_top_20">
       <select class="form-control" name="statusdropdown"  onchange="jsFunction(this.value);">
          <option value="Draft">Draft</option>
          <option value="Publish">Publish</option>
        </select>
       <!-- <button class="btn btn-primary mar_top_20">Cancel</button> -->
      </div>
       </div>
       <i class="fa fa-eye"></i><span class="mar_right_20">&nbsp;&nbsp;Visibility:</span><label id="result" class="mar_right_20"></label><a href="#" onclick="vdis()">Edit</a>
       <div id="visi">
      
        <input type="radio" name="visible1" value="Public" class="mar_top_20">Public<br>
    <input type="radio" name="visible1" value="Private">Private
    <br> 
    <button type="button" class="btn btn-primary mar_top_20" onclick="displayRadioValue()"> 
        Submit 
    </button>
     <button type="button" class="btn btn-primary mar_top_20 float-right" > 
        Cancel
    </button>
       

</div>
<br><br>
      <!--  <button class="btn btn-primary mar_top_20">Update</button>   -->       
   </div>
     </div>
            </div>
          </div>
              </div>
            </div>




<div class="row dash_row outer-w3-agile">
  <div class="col-md-12">




<div id="format">
          <div class="card">
<div class="card-header" id="glanceone">
      <h5 class="mb-0">
        <a role="button" data-toggle="collapse" data-target="#glance" aria-expanded="true" aria-controls="glace">
         Format
        </a>
      </h5>
    </div>
     <div id="glance" class="collapse show" aria-labelledby="glanceone" data-parent="#format">
       <div class="card-body">
        <input type="radio" value="Standard" name="x"><i class="fa fa-thumb-tack"></i>Standard<br>

        <input type="radio" value="Picture" name="x"><i class="fa fa-picture-o"></i>Picture<br>
        <input type="radio" value="Video" name="x"><i class="fa fa-video-camera"></i>Video<br>


<input type="radio" value="Quote" name="x"><i class="fa fa-quote-left"></i>Quote<br>

<input type="radio" value="Link" name="x"><i class="fa fa-link"></i>Link<br>

<input type="radio" value="Gallery" name="x"><i class="fa fa-file-image-o"></i>Gallery<br>

      </div>
       </div>
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
    $select_query="SELECT DISTINCT categoryName FROM category";
// $select_query="SELECT posts.categoryName
// FROM posts
// INNER JOIN category
// ON posts.categoryName=category.categoryName";
//     $select_query="SELECT categoryName FROM  posts
// UNION
// SELECT categoryName FROM category
// ";

                           $select_all_categories_query=mysqli_query($connection, $select_query);
                if (!$select_all_categories_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }
                            while($row=mysqli_fetch_array($select_all_categories_query)){
                              
                              $selectCategory=$row['categoryName'];
                              //var_dump ($selectCategory);
                               $str_arr = explode (",",$selectCategory); 
                               //print_r($str_arr);
                               //print_r($str_arr);
                               $i=0;
                               $j=1;
                                foreach($str_arr as $value){

                                       //if($value != $str_arr[$i]) {
            //unset($value);
            // OR REMOVE IT BY YOUR METHOD
                                             
                                         
                              
                                              ?>
            <input type="checkbox" class="mar_top_20" name="selectCategory[]" value="<?php echo $value;    ?>"> <?php echo $value;

?><br>
                                        
                                        <?php
                                                                                // } 
                                                                                //  $i++;
                                                                                  //}
                                        }
       
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
  <input type="text" class="form-control mar_top_20"  name="category_name">
  <select class="form-control mar_top_20" name="category_type">
    <option>Parent Category</option>
    <?php
                           //$connection=mysqli_connect('localhost','root','','admin');
           $select_query="SELECT DISTINCT categoryName FROM category";                
                           $select_all_categories_query=mysqli_query($connection, $select_query);
                if (!$select_all_categories_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }
                            while($row=mysqli_fetch_array($select_all_categories_query)){
                              $parentcategory=$row['categoryName'];
                              $str_arr = explode (",",$parentcategory); 
                              foreach($str_arr as $value){
                         
                    ?>
                                        <option> <?php echo $value;    ?></option>
                                       
                                     <?php
                                      }
                                    }
                                        ?>
    
  
   
  
  </select>
  <button class="btn btn-primary button-top" name="add_new_category">Add new</button>
</form>
</div>


  </div>
</div>




<!-- <div class="row dash_row mar_bottom_20 outer-w3-agile">
  <div class="col-md-12">



    <div id="tag">
          <div class="card">
<div class="card-header" id="tagone">
      <h5 class="mb-0">
        <a role="button" data-toggle="collapse" data-target="#tags" aria-expanded="true" aria-controls="tags">
         Tags
        </a>
      </h5>
    </div>
     <div id="tags" class="collapse show" aria-labelledby="tagone" data-parent="#tag">
       <div class="card-body">
        


  <input type="text" class="form-control">
  <span>Seperate tags with commas</span><br>
  <button class="btn btn-primary button-top">Add</button>




      </div>
       </div>
          </div>
        </div>

  </div>
</div> -->











 </div>	
</div>
</div>


<!-- ----------------------------------modal---------------------------------------- -->
<div class="modal fade bd-example-modal-lg" id="fimage" tabindex="-1" role="dialog" aria-labelledby="fimageTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="fimageTitle">Media library</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
 <div class="row">
  <div class="col-md-4 col-offset-md-8">
  </div>
</div>
        </div>
    </form>
<div class="media_library" id="media_lib">

<div class="dz-message">
  <div class="row">
  <?php

$query="SELECT * FROM posts";
$select_images=mysqli_query($connection,$query);
if (!$select_images) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }  
while($row=mysqli_fetch_array($select_images)) {
  $id=$row['id'];
  $image=$row['image'];

  ?>
  <?php
   echo '<div class="col-md-1 imagebox">
    <img src="gallery/'.$image.'" width="100%">
    </div>';
 
  ?>

<a href="sample_content.php?edit=<?php echo $id;  ?>">Edit</a>
<?php
}
?>
</div>

</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <a href='list.php' target="_blank"><button type="button" class="btn btn-primary">Show image</button></a>
      </div>
    </div>
  </div>
</div>
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
// When the user clicks on div, open the popup
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
 <script> 
var maxAmount =160;
function textCounter(textField, showCountField) {
    if (textField.value.length > maxAmount) {
        textField.value = textField.value.substring(0,maxAmount);
  } else { 
        showCountField.value = maxAmount - textField.value.length;
  }
}
</script>
<script> 
var maxAmount1 =60;
function textCounter1(textField, showCountField) {
    if (textField.value.length > maxAmount1 ) {
        textField.value = textField.value.substring(0,maxAmount1);
  } else { 
        showCountField.value = maxAmount1- textField.value.length;
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

<!-- -------------------------------------------------------------

<div class="col-md-6 col-md-offset-3">
      <div class="header clearfix">
        <h3 class="text-muted text-center">Drag and Drop Image Upload</h3>
      </div>
    <hr>
      <div class="jumbotron col-md-12">
    <form id="imageDropzone" action="getImage.php" enctype="multipart/form-data" class="dropzone">
        <div class="dz-message">
        <div class="icon"><span class="fa fa-cloud fa-3x"></span></div>
        <h3>Drag and Drop Images here</h3>
        </div>
    </form>
      </div>

      <footer class="footer">
        <p>&copy; Vivek Moyal.</p>
      </footer>

    </div>










  -----------------------------------------------------
 --><script> 
        function displayRadioValue() { 
            var ele = document.getElementsByName('visible1'); 
              
            for(i = 0; i < ele.length; i++) { 
                if(ele[i].checked) 
                document.getElementById("result").innerHTML
                        = ele[i].value; 
                        document.getElementById('visi').style.display="none";
            } 
        } 
    </script> 
      

  <!-- Custom scripts for all pages-->
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
    function dis()
    {

  document.getElementById('edit_pub').style.display='block';
    }
    function vdis()
    {
      document.getElementById('visi').style.display="block";
    }
  </script>

  <!-- <script>
    (function () {
      new FroalaEditor("#edit", {
         initOnClick: true
    
      })
    })()
  </script> -->
  <script>
    (function () {
      new FroalaEditor("#edit", {
        fullPage: true
      })
    })()
  </script>
   <script>
    (function () {
      new FroalaEditor("#media", {
        toolbarInline: true,
        toolbarVisibleWithoutSelection: true,
        toolbarButtons: [ ['insertImage', 'insertLink', 'insertFile', 'insertVideo', 'undo', 'redo'] ],
        toolbarButtonsXS: null,
        toolbarButtonsSM: null,
        toolbarButtonsMD: null
      })
    })()
  </script>
<script>
const file = this.files[0];
const  fileType = file['type'];
const validImageTypes = ['image/gif', 'image/jpeg', 'image/png'];
if (!validImageTypes.includes(fileType)) {
   console.log('empty');
}
</script>
</body>

</html>
