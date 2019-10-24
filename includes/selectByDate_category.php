<?php

// ------------------------pagination-----------------------------
//  $per_page=5;
// if(isset($_GET['page'])) {


          
//             $page = $_GET['page'];

//             } else {


//                 $page = "";
//             }


//             if($page == "" || $page == 1) {

//                 $page_1 = 0;

//             } else {

//                 $page_1 = ($page * $per_page) - $per_page;

//             }

         
            $publihedOn=$_SESSION['publihedOn'];
          $post_query_count="SELECT * FROM category WHERE  category_date='{$publihedOn}'";
          $find_count=mysqli_query($connection,$post_query_count);
          if (!$find_count) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }
//           $count=mysqli_num_rows($find_count); 
//           $count=ceil($count/$per_page);

// --------------------------


$select_by_author_query="SELECT * FROM category  WHERE  category_date='{$publihedOn}'";
  $show_by_author_query=mysqli_query($connection,$select_by_author_query);
  if (!$show_by_author_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }  
  
  while($row=mysqli_fetch_array($show_by_author_query)) {
                      $id=$row['id'];
                      $name=$row['categoryName'];
                      $slug=$row['slug'];
                      $description=$row['description'];
  ?>


<tr>
    <td><!-- <input type="checkbox" class="checkthis" /> --></td>
    <td><?php if(isset($name)){echo $name;}  ?></td>
    <td><?php if(isset($slug)){echo $slug;}  ?></td>
    <td><?php if(isset($description)){echo $description;}   ?></td>
    <!-- <td>+923335586757</td> -->
    <td class="page_control"><a href="editcategory.php?edit=<?php echo $id;  ?>"><span class="fa fa-pencil">
    </span></button></a></td>

    <td class="page_control"><a href="deletecategory.php?delete=<?php echo $id;  ?>"><span class="fa fa-trash"></span></button></a></td>
     </tr> 
    <?php
      }
                    
                ?>
                