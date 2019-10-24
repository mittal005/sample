<!DOCTYPE html>
<html lang="en">

<head>
<?php include("includes/header.php"); ?>

<style type="text/css">

  
    </style>
  </head>

<body id="page-top">

 <?php include("includes/topnav.php"); ?>

  <div id="wrapper">

    <!-- Sidebar -->
    
<?php include("includes/sidenav.php"); ?>



    	<div class="container-fluid">
<div class="row dash_row">

<h5 class="mar_right_20">Media Library</h5> <button class="btn btn-primary">Add New</button>

<div class="col-md-12 outer-w3-agile dash_row">
</div>
	 </div>



   <div class="row dash_row">
    <div class="col-md-12 outer-w3-agile ">
       <a class="pad" onclick="li_view()""><i class="fa fa-th-list"></i></a>
      <a class="pad" onclick="col_view()"><i class="fa fa-th"></i></a>
      <select class="pad sel">
        <option>Date</option>
      </select>
      <button class="btn btn-primary pad">Filter</button>
    </div>


   </div>

   <div class="row dash_row outer-w3-agile">
  <div class="col-md-12">

<div id="listview">

<table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   
                   <th><input type="checkbox" id="checkall" /></th>
                   <th>File</th>
                    <th >Author</th>
                     <th><i class="fa fa-comment"><i></th>
                     <th >Date</th>
                    
                     <th >Edit</th>
                      
                       <th >Delete</th>
                   </thead>
    <tbody>
    
    <tr>
    <td><input type="checkbox" class="checkthis" /></td>
    <td class="author_td"><img src=""> <a href="#"></a><br><label></label></td>
    <td><label></label></td>
    <td ><span></span></td>
    <td ><label></label></td>
    
   
    <td ><button class=" btn btn-primary" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="fa fa-pencil"></span></button></td>
    <td ><button class=" btn btn-danger " data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="fa fa-trash"></span></button></td>
    </tr>
    

    
    </tbody>
        
</table>
</div>

<div id="colview">
  </div>





  </div>
</div>
</div>


<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  Are you sure want delete?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Delete</button>
      </div>
    </div>
  </div>
</div>
<script>
  function li_view()
  {
    document.getElementById('listview').style.display="block";
    document.getElementById('colview').style.display="none";
  }
   function col_view()
  {
    document.getElementById('listview').style.display="none";
    document.getElementById('colview').style.display="block";
  }
  </script>

</body>

</html>
