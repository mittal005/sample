<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_USER_NOTICE);
include_once 'imageClass.php';
$imageClass=new imageClass();
$storeFolder = 'gallery/';
if (!empty($_FILES)) {
    $tempFile = $_FILES['file']['tmp_name'];  
    $ran = time();
    $targetPath = $storeFolder;
    $fileName=$ran.$_FILES['file']['name'];
    $targetFile =  $targetPath.$fileName;
    move_uploaded_file($tempFile,$targetFile);
    $data["Image"]=$fileName;
    $alert=$imageClass->addImages($data);
}
else
{
    echo "Image not found";
}
if($alert==1)
{
    echo "Image Uploaded";
}
else
{
    echo "Image not uploaded";
}