<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="pageStyle.css">

</head>  
<body> 

<div class="navbar">
	  
	  <nav>
		  <ul id='MenuItems'>


		  
			  <li><a href='adminHome.php'>  Home</a></li>
			 <li><a href='logout.php'>Log out</a></li>
		  </ul>
	  </nav>

  </div>
</body>
</html>



<?php
require_once("dbcontroller.php");
$db_handle = new DBController();

$sql = "SELECT * from register";
$posts = $db_handle->runSelectQuery($sql);
?>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function createNew() {
	$("#add-more").hide();
	var data = '<tr class="table-row" id="new_row_ajax">' +
	'<td contenteditable="true" id="User_Name" onBlur="addToHiddenField(this,\'User_Name\')" onClick="editRow(this);"></td>' +
	'<td contenteditable="true" id="Email" onBlur="addToHiddenField(this,\'Email\')" onClick="editRow(this);"></td>' +
'   <td contenteditable="true" id="Password" onBlur="addToHiddenField(this,\'Password\')" onClick="editRow(this);"></td>' +
	'<td contenteditable="true" id="Confirm_Password" onBlur="addToHiddenField(this,\'Confirm_Password\')" onClick="editRow(this);"></td>' +
	'<td><input type="hidden" id="User_Name" /><input type="hidden" id="Email" /><input type="hidden" id="Password" /><input type="hidden" id="Confirm_Password" /><span id="confirmAdd"><a onClick="addToDatabase()" class="ajax-action-links">Save</a> / <a onclick="cancelAdd();" class="ajax-action-links">Cancel</a></span></td>' +	
	'</tr>';
  $("#table-body").append(data);
}
function cancelAdd() {
	$("#add-more").show();
	$("#new_row_ajax").remove();
}
function editRow(editableObj) {
  $(editableObj).css("background","#FFF");
}

function saveToDatabase(editableObj,column,id) {
  $(editableObj).css("background","#FFF url(loaderIcon.gif) no-repeat right");
  $.ajax({
    url: "regedit.php",
    type: "POST",
    data:'column='+column+'&editval='+$(editableObj).text()+'&ID='+id,
    success: function(data){
      $(editableObj).css("background","#FDFDFD");
    }
  });
}
function addToDatabase() {
  var User_Name = $("#User_Name").val();
  var Email = $("#Email").val();
   var Password = $("#Password").val();
  var Confirm_Password = $("#Confirm_Password").val();
  
	  $("#confirmAdd").html('<img src="loaderIcon.gif" />');
	  $.ajax({
		url: "add.php",
		type: "POST",
		data:'User_Name='+User_Name+'&Email='+Email+'&Password='+Password+'&Confirm_Password='+Confirm_Password,
		success: function(data){
		  $("#new_row_ajax").remove();
	  $("#add-more").show();		  
		  $("#table-body").append(data);
		}
	  });
}
function addToHiddenField(addColumn,hiddenField) {
	var columnValue = $(addColumn).text();
	$("#"+hiddenField).val(columnValue);
}

function deleteRecord(ID) {
	if(confirm("Are you sure you want to delete this row?")) {
		$.ajax({
			url: "delete.php",
			type: "POST",
			data:'ID='+ID,
			success: function(data){
			  $("#table-row-"+ID).remove();
			}
		});
	}
}
</script>

<style>
body{width:615px;}
.tbl-qa{width: 98%;font-size:0.9em;background-color: #f5f5f5;}
.tbl-qa th.table-header {padding: 5px;text-align: left;padding:10px;}
.tbl-qa .table-row td {padding:10px;background-color: #FDFDFD;}
.ajax-action-links {color: #09F; margin: 10px 0px;cursor:pointer;}
.ajax-action-button {border:#094 1px solid;color: #09F; margin: 10px 0px;cursor:pointer;display: inline-block;padding: 10px 20px;}
</style>

<table class="tbl-qa">
  <thead>
	<tr>
	  <th class="table-header">Username</th>
	  <th class="table-header">Email</th>
  <th class="table-header">Password</th>
	  <th class="table-header">Confirm Password</th>
	  <th class="table-header">Actions</th>
	</tr>
  </thead>
  <tbody id="table-body">
	<?php
	if(!empty($posts)) { 
	foreach($posts as $k=>$v) {
	  ?>
	  <tr class="table-row" id="table-row-<?php echo $posts[$k]["ID"]; ?>">
		<td contenteditable="true" onBlur="saveToDatabase(this,'User_Name','<?php echo $posts[$k]["ID"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["User_Name"]; ?></td>
		<td contenteditable="true" onBlur="saveToDatabase(this,'Email','<?php echo $posts[$k]["ID"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["Email"]; ?></td>
		<td contenteditable="true" onBlur="saveToDatabase(this,'Password','<?php echo $posts[$k]["ID"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["Password"]; ?></td>
		<td contenteditable="true" onBlur="saveToDatabase(this,'Confirm_Password','<?php echo $posts[$k]["ID"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["Confirm_Password"]; ?></td>
		<td><a class="ajax-action-links" onclick="deleteRecord(<?php echo $posts[$k]["ID"]; ?>);">Delete</a></td>
	  </tr>
	  <?php
	}
	}
	?>
  </tbody>
</table>
