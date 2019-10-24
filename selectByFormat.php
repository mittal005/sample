<?php
$selectByFormat=$_POST['selectByFormat']; 
$select_by_category_query="SELECT * FROM posts WHERE  Format='{$selectByFormat}'";
  $show_by_category_query=mysqli_query($connection,$select_by_category_query);
  if (!$show_by_category_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }  else{
    echo "string";
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
          <a class="dropdown-item">Edit<i class="fa fa-pencil pad_left_40"></i
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