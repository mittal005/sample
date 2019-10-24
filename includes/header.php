<?php include("init.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title></title>

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="css/style.css" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
   <link href="css/sb-admin.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> -->
<script src="js/dropzone.js"></script>
<link rel="stylesheet" href="css/dropzone.css">
<link rel="stylesheet" href="css/font.css" rel="stylesheet" type="text/css">		

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href=" css/css/froala_editor.css">
  <link rel="stylesheet" href=" css/css/froala_style.css">
  <link rel="stylesheet" href=" css/css/plugins/code_view.css">
  <link rel="stylesheet" href=" css/css/plugins/colors.css">
  <link rel="stylesheet" href=" css/css/plugins/emoticons.css">
  <link rel="stylesheet" href=" css/css/plugins/image_manager.css">
  <link rel="stylesheet" href=" css/css/plugins/image.css">
  <link rel="stylesheet" href=" css/css/plugins/line_breaker.css">
  <link rel="stylesheet" href=" css/css/plugins/table.css">
  <link rel="stylesheet" href=" css/css/plugins/char_counter.css">
  <link rel="stylesheet" href=" css/css/plugins/video.css">
  <link rel="stylesheet" href=" css/css/plugins/fullscreen.css">
  <link rel="stylesheet" href=" css/css/plugins/file.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">

		
     <script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
  <script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>

  <script type="text/javascript" src=" js/js/froala_editor.min.js"></script>

  <script type="text/javascript" src="js/js/plugins/align.min.js"></script>
  <script type="text/javascript" src=" js/js/plugins/code_beautifier.min.js"></script>
  <script type="text/javascript" src=" js/js/plugins/code_view.min.js"></script>
  <script type="text/javascript" src=" js/js/plugins/colors.min.js"></script>
  <script type="text/javascript" src=" js/js/plugins/emoticons.min.js"></script>
  <script type="text/javascript" src=" js/js/plugins/draggable.min.js"></script>
  <script type="text/javascript" src=" js/js/plugins/font_size.min.js"></script>
  <script type="text/javascript" src=" js/js/plugins/font_family.min.js"></script>
  <script type="text/javascript" src=" js/js/plugins/image.min.js"></script>
  <script type="text/javascript" src=" js/js/plugins/file.min.js"></script>
  <script type="text/javascript" src=" js/js/plugins/image_manager.min.js"></script>
  <script type="text/javascript" src=" js/js/plugins/line_breaker.min.js"></script>
  <script type="text/javascript" src=" js/js/plugins/link.min.js"></script>
  <script type="text/javascript" src=" js/js/plugins/lists.min.js"></script>
  <script type="text/javascript" src=" js/js/plugins/paragraph_format.min.js"></script>
  <script type="text/javascript" src=" js/js/plugins/paragraph_style.min.js"></script>
  <script type="text/javascript" src=" js/js/plugins/video.min.js"></script>
  <script type="text/javascript" src=" js/js/plugins/table.min.js"></script>
  <script type="text/javascript" src=" js/js/plugins/url.min.js"></script>
  <script type="text/javascript" src=" js/js/plugins/entities.min.js"></script>
  <script type="text/javascript" src=" js/js/plugins/char_counter.min.js"></script>
  <script type="text/javascript" src=" js/js/plugins/inline_style.min.js"></script>
  <script type="text/javascript" src=" js/js/plugins/save.min.js"></script>
  <script type="text/javascript" src=" js/js/plugins/fullscreen.min.js"></script>
  <script type="text/javascript" src=" js/js/plugins/quote.min.js"></script>

  <script>
    (function () {
      new FroalaEditor("#edit", {
        zIndex: 10
      })
    })()
  </script>



  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>
    
  </head>