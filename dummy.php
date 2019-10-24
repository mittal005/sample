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
        die('query FAILED . mysqli_error($connection)');
                             }
}
