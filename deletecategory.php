 <?php
          include "includes/db.php";
                         if (isset($_GET['delete'])) {
                           $the_cat_id=$_GET['delete'];
                           $query="DELETE FROM category WHERE id={$the_cat_id}";
                           $delete_query=mysqli_query($connection,$query);
                            if (!$delete_query) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
  }
                           header("Location:newcategory.php");

                         }
                         ?>