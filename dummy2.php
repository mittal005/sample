<?php  
//include 'includes/db.php';
if(isset($_POST['sub']))  
{  

echo $selectCategory=implode(',', $_POST['techno']);
$connection=mysqli_connect('localhost','root','','admin');
 $query="INSERT INTO posts(selectCategory)VALUES('$selectCategory')";
 $create_post_query=mysqli_query($connection,$query);
  if (!$create_post_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }
}  
if(isset($_POST['edit']))  
{  
$connection=mysqli_connect('localhost','root','','admin');
 $select_edit_query="SELECT selectCategory FROM posts WHERE id=319";
 $select_edit_query=mysqli_query($connection,$select_edit_query);
           
                if (!$select_edit_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }
  
while($row=mysqli_fetch_array($select_edit_query)) {
  $name=$row['selectCategory'];


}


?>  



<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <form action="" method="post" enctype="multipart/form-data">  
   <div style="width:200px;border-radius:6px;margin:0px auto">  
<table border="1">  
   <tr>  
      <td colspan="2">Select Technolgy:</td>  
   </tr>  
   <tr>  
      <td>PHP</td>  
      <td><input type="checkbox" name="techno[]" value="PHP"></td>  
   </tr>  
   <tr>  
      <td>.Net</td>  
      <td><input type="checkbox" name="techno[]" value=".Net"></td>  
   </tr>  
   <tr>  
      <td>Java</td>  
      <td><input type="checkbox" name="techno[]" value="Java"></td>  
   </tr>  
   <tr>  
      <td>Javascript</td>  
      <td><input type="checkbox" name="techno[]" value="javascript"></td>  
   </tr>  
   <tr>  
      <td colspan="2" align="center"><input type="submit" value="submit" name="sub"></td>  
      <td colspan="2" align="center"><input type="submit" value="edit" name="edit"></td>  
   </tr>  
</table>  
</div>  
</form>  

<form action="" method="post" enctype="multipart/form-data">  
   <div style="width:200px;border-radius:6px;margin:0px auto">  
<table border="1">  
   <tr>  
      <td colspan="2">Select Technolgy:</td>  
   </tr>  
   <tr>  
      <td>PHP</td>  
      <td><input type="checkbox" name="techno[]"  value="$selectCategory" <?php echo ($name == $selectCategory) ? "checked" : "" ; ?>/></td>  
   </tr>  
   <tr>  
      <td>.Net</td>  
      <td><input type="checkbox" name="techno[]" value=".Net"></td>  
   </tr>  
   <tr>  
      <td>Java</td>  
      <td><input type="checkbox" name="techno[]" value="Java"></td>  
   </tr>  
   <tr>  
      <td>Javascript</td>  
      <td><input type="checkbox" name="techno[]" value="javascript"></td>  
   </tr>  
   <tr>  
      <td colspan="2" align="center"><input type="submit" value="submit" name="sub"></td>  
      <td colspan="2" align="center"><input type="submit" value="edit" name="edit"></td>  
   </tr>  
</table>  
</div>  
</form>  

</body>
</html>