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

$sql = "SELECT * from camp";
$posts = $db_handle->runSelectQuery($sql);
?>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function createNew() {
	$("#add-more").hide();

	var data = '<tr class="table-row" id="new_row_ajax">' +

	'<td contenteditable="true" id="date" onBlur="addToHiddenField(this,\'date\')" onClick="editRow(this);"></td>' +
	'<td contenteditable="true" id="day" onBlur="addToHiddenField(this,\'day\')" onClick="editRow(this);"></td>' +
'   <td contenteditable="true" id="vanue" onBlur="addToHiddenField(this,\'vanue\')" onClick="editRow(this);"></td>' +
	'<td contenteditable="true" id="time" onBlur="addToHiddenField(this,\'time\')" onClick="editRow(this);"></td>' +

	'<td><input type="hidden" id="date" /><input type="hidden" id="day" /><input type="hidden" id="vanue" /><input type="hidden" id="time" /><span id="confirmAdd"><a onClick="addToDatabase()" class="ajax-action-links">Save</a> / <a onclick="cancelAdd();" class="ajax-action-links">Cancel</a></span></td>' +	
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
    url: "Campedit.php",
    type: "POST",
    data:'column='+column+'&editval='+$(editableObj).text()+'&ID='+id,
    success: function(data){
      $(editableObj).css("background","#FDFDFD");
    }
  });
}
function addToDatabase() {
  var date = $("#date").val();
  var day = $("#day").val();
   var vanue = $("#vanue").val();
  var time = $("#time").val();
  
	  $("#confirmAdd").html('<img src="loaderIcon.gif" />');
	  $.ajax({
		url: "Campadd.php",
		type: "POST",
		data:'date='+date+'&day='+day+'&vanue='+vanue+'&time='+time,
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
			url: "Campdelete.php",
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
body{width:715px;}
.tbl-qa{width: 98%;font-size:0.9em;background-color: #f5f5f5;}
.tbl-qa th.table-header {padding: 5px;text-align: left;padding:10px;}
.tbl-qa .table-row td {padding:10px;background-color: #FDFDFD;}
.ajax-action-links {color: #09F; margin: 10px 0px;cursor:pointer;}
.ajax-action-button {border:#094 1px solid;color: #09F; margin: 10px 0px;cursor:pointer;display: inline-block;padding: 10px 20px;}
</style>

<table class="tbl-qa">
  <thead>
    Update camp: </br>
	<tr>
	  <th class="table-header">Date</th>
	  <th class="table-header">Day</th>
  <th class="table-header">Vanue</th>
	  <th class="table-header">Time</th>
	  <th class="table-header">Actions</th>
	</tr>
  </thead>
  <tbody id="table-body">
	<?php
	if(!empty($posts)) { 
	foreach($posts as $k=>$v) {
	  ?>
	  <tr class="table-row" id="table-row-<?php echo $posts[$k]["ID"]; ?>">
		<td contenteditable="true" onBlur="saveToDatabase(this,'date','<?php echo $posts[$k]["ID"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["date"]; ?></td>
		<td contenteditable="true" onBlur="saveToDatabase(this,'day','<?php echo $posts[$k]["ID"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["day"]; ?></td>
		<td contenteditable="true" onBlur="saveToDatabase(this,'vanue','<?php echo $posts[$k]["ID"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["vanue"]; ?></td>
		<td contenteditable="true" onBlur="saveToDatabase(this,'Confirm_Password','<?php echo $posts[$k]["ID"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["time"]; ?></td>
		<td><a class="ajax-action-links" onclick="deleteRecord(<?php echo $posts[$k]["ID"]; ?>);">Delete</a></td>
	  </tr>
	  <?php
	}
	}
	?>
  </tbody>
</table>
