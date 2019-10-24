<?php
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
    $link = "https"; 
else
    $link = "http"; 

    $link .= "://"; 
    $current_time = date('d-m-y');

$url= $link . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']) . '/' . $current_time ;

echo $url;
?>