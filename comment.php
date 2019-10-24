<!DOCTYPE html>
<html lang="en">

<head>
<?php include("includes/header.php"); ?>
  </head>

<body id="page-top">

 <?php include("includes/topnav.php"); ?>

  <div id="wrapper">

    <!-- Sidebar -->
    
<?php include("includes/sidenav.php"); ?>

    	<div class="container-fluid">
        <div class="row dash_row outer-w3-agile">
            <div class="col-md-12">
              <div class="row">
          <div class="col-md-12">
         <a href="#"> All (<span></span>) </a> |  <a href="#"> Comment (<span></span>) 
        </div>
</div>     
<div class="row dash_row" id="filter">
   <div class="col-md-2">
    <select class="form-control">
      <option>All Comment Types</option>
      <option>Comments</option>
      <option>Pings</option>
    </select>
  </div>
  <div class="col-md-2">
     <button type="button" class="btn btn-primary">Apply</button>
  </div> 
</div>
</div>
</div>
        <div class="row dash_row">
    		<div class="col-md-12 outer-w3-agile">
              <div class="table-responsive">
              <table id="mytable" class="table table-bordred table-striped">        
                   <thead>
                   <th><input type="checkbox" id="checkall" /></th>
                    <th>Author</th>
                     <th>Comment</th>
                     <th>inResponse</th>
                     <th>Submitted On</th>                  
                   </thead>
    <tbody>   
    <tr>
    <td><input type="checkbox" class="checkthis" /></td>
    <td class="page_control"><label></label></td>
    <td class="author_td"><label></label></td>
    <td><label></label></td>
    <td><label></label></td>
     <td><button class="table_btn btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#quickedit" ><span class="fa fa-comment"></span></button></td>
    
  </tr>
    </tbody>
</table>
          </div>
            		</div>
              </div>
    	</div>
 <script type="text/javascript">
    $('#datepicker').datepicker({
        weekStart: 1,
        daysOfWeekHighlighted: "6,0",
        autoclose: true,
        todayHighlight: true,
    });
    $('#datepicker').datepicker("setDate", new Date());
</script> 
</body>
</html>