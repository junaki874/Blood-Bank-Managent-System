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

$sql = "SELECT * from Personal_Info";
$posts = $db_handle->runSelectQuery($sql);
?>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function createNew() {
	$("#add-more").hide();

	var data = '<tr class="table-row" id="new_row_ajax">' +

	'<td contenteditable="true" id="Name" onBlur="addToHiddenField(this,\'Name\')" onClick="editRow(this);"></td>' +
	'<td contenteditable="true" id="Address" onBlur="addToHiddenField(this,\'Address\')" onClick="editRow(this);"></td>' +
'   <td contenteditable="true" id="Blood_grp" onBlur="addToHiddenField(this,\'Blood_grp\')" onClick="editRow(this);"></td>' +
	'<td contenteditable="true" id="Phn_Num" onBlur="addToHiddenField(this,\'Phn_Num\')" onClick="editRow(this);"></td>' +

	'<td><input type="hidden" id="Name" /><input type="hidden" id="Address" /><input type="hidden" id="Blood_grp" /><input type="hidden" id="Phn_Num" /><span id="confirmAdd"><a onClick="addToDatabase()" class="ajax-action-links">Save</a> / <a onclick="cancelAdd();" class="ajax-action-links">Cancel</a></span></td>' +	
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
    url: "donoredit.php",
    type: "POST",
    data:'column='+column+'&editval='+$(editableObj).text()+'&ID='+id,
    success: function(data){
      $(editableObj).css("background","#FDFDFD");
    }
  });
}
function addToDatabase() {
  var Name = $("#Name").val();
  var Address = $("#Address").val();
  let Blood_grp= $('#Blood_grp').val();
  var Phn_Num = $("#Phn_Num").val();
  
	  $("#confirmAdd").html('<img src="loaderIcon.gif" />');
	  $.ajax({
		url: "donoradd.php",
		type: "POST",
		data:'Name='+Name+'&Address='+Address+'&Blood_grp='+Blood_grp+'&Phn_Num='+Phn_Num,
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
			url: "donordelete.php",
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
    Update Donor Information
	<tr>
	  <th class="table-header">Name</th>
	  <th class="table-header">Address</th>
  <th class="table-header">Blood Group</th>
	  <th class="table-header">Phone Number</th>
	  <th class="table-header">Actions</th>
	</tr>
  </thead>
  <tbody id="table-body">
	<?php
	if(!empty($posts)) { 
	foreach($posts as $k=>$v) {
	  ?>
	  <tr class="table-row" id="table-row-<?php echo $posts[$k]["ID"]; ?>">
		<td contenteditable="true" onBlur="saveToDatabase(this,'Name','<?php echo $posts[$k]["ID"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["Name"]; ?></td>
		<td contenteditable="true" onBlur="saveToDatabase(this,'Address','<?php echo $posts[$k]["ID"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["Address"]; ?></td>
		<td contenteditable="true" onBlur="saveToDatabase(this,'Blood_grp','<?php echo $posts[$k]["ID"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["Blood_grp"]; ?></td>
		<td contenteditable="true" onBlur="saveToDatabase(this,'Phn_Num','<?php echo $posts[$k]["ID"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["Phn_Num"]; ?></td>
		<td><a class="ajax-action-links" onclick="deleteRecord(<?php echo $posts[$k]["ID"]; ?>);">Delete</a></td>
	  </tr>
	  <?php
	}
	}
	?>
  </tbody>
</table>
