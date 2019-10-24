<?php

if (isset($_GET['delete'])) {
                        echo $the_post_id=$_GET['delete'];
                        $connection=mysqli_connect('localhost','root','','admin');
                        $query="DELETE  FROM posts WHERE id={$the_post_id}";
                        $delete_query=mysqli_query($connection,$query);
                        header("Location:../allpost.php");
                      }



?>