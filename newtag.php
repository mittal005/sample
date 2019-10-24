
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
            		<div class="col-md-5 ">
            			<form>
            				<h5 class="text-center">Add New Category</h5>
            				<hr>
            				
            				<label>Name</label>
            				<input type="text" class="form-control" id="firstName" placeholder="" value="" required="">	
            				<br>	
                            <label>Slug</label>
            				<input type="text" class="form-control"  placeholder="" value="" required="">
            				<br>
            				<label> Parent Category</label>
            				<select class="form-control">
            					<br>
                                        <option>select category</option>
                                        <option>News</option>
                                    </select>
                                    <br>
            			 <label>Description</label>
            				<textarea class="form-control"  rows="5" required=""></textarea>
            				<div class="row">
            					<div class="offset-md-3 col-md-6 col-offset-md-3">
            						<br>
            					<button type="button" class="btn btn-primary">Add New Category</button>
            				</div>
            				</div>
            			</div>
            			</form>
            			<div class="col-md-7 ">
                    <div class="row">
                      <div class="col-md-4">
            <select class="form-control">
      <option>All Dates</option>

    </select>
  </div>
  <div class="col-md-4">
    <button type="button" class="button btn btn-primary">Apply</button>
     
   </div>
   <div class="col-md-4">
   </div>
   </div>
   <br>
        <div class="table-responsive">                
              <table id="mytable" class="table table-bordred table-striped">                  
                   <thead>                   
                   <th><!-- <input type="checkbox" id="checkall" /> --></th>
                   <th>Name</th>
                    <th>Slug</th>
                     <th>Description</th>
                    
                     <th>count</th>
                      <th>Edit</th>                      
                       <th>Delete</th>
                   </thead>
    <tbody>
    <tr>
    <td><input type="checkbox" class="checkthis" /></td>
    <td>Mohsin</td>
    <td>Irshad</td>
    <td>isometric.mohsin@gmail.com</td>
    <td>+923335586757</td>
    <td class="page_control"><a href="Edit Category.php"><span class="fa fa-pencil">
    </span></button></td></a>
    <td class="page_control"><span class="fa fa-trash"></span></button></td>
    </tr>   
    </tbody>        
</table>
         
            </div>          
        </div>
	</div>
</div>
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
      </div>
          <div class="modal-body">
          <div class="form-group">
        <input class="form-control " type="text" placeholder="Mohsin">
        </div>
        <div class="form-group">        
        <input class="form-control " type="text" placeholder="Irshad">
        </div>
        <div class="form-group">
        <textarea rows="2" class="form-control" placeholder="CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan"></textarea        
        </div>
      </div>
          <div class="modal-footer ">
        <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>    
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">       
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
      </div>
        <div class="modal-footer ">
        <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
      </div>
  </body>
</html>
