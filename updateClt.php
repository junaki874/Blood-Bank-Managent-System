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

$sql = "SELECT * from collection";
$posts = $db_handle->runSelectQuery($sql);
?>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function createNew() {
	$("#add-more").hide();

	var data = '<tr class="table-row" id="new_row_ajax">' +

	'<td contenteditable="true" id="username" onBlur="addToHiddenField(this,\'username\')" onClick="editRow(this);"></td>' +
	'<td contenteditable="true" id="=name" onBlur="addToHiddenField(this,\'name\')" onClick="editRow(this);"></td>' +
     '<td contenteditable="true" id="bld_grp" onBlur="addToHiddenField(this,\'bld_grp\')" onClick="editRow(this);"></td>' +
	'<td contenteditable="true" id="quantity" onBlur="addToHiddenField(this,\'quantity\')" onClick="editRow(this);"></td>' +
     '<td contenteditable="true" id="adr" onBlur="addToHiddenField(this,\'adr\')" onClick="editRow(this);"></td>' +
     '<td contenteditable="true" id="date" onBlur="addToHiddenField(this,\'date\')" onClick="editRow(this);"></td>' +
     '<td contenteditable="true" id="day" onBlur="addToHiddenField(this,\'day\')" onClick="editRow(this);"></td>' +
	'<td contenteditable="true" id="time" onBlur="addToHiddenField(this,\'time\')" onClick="editRow(this);"></td>' +


	'<td><input type="hidden" id="username" /><input type="hidden" id="name" /><input type="hidden" id="bld_grp" /><input type="hidden" id="quantity" /><td><input type="hidden" id="adr" /><input type="hidden" id="date" /><input type="hidden" id="day" /><input type="hidden" id="time" /><span id="confirmAdd"><a onClick="addToDatabase()" class="ajax-action-links">Save</a> / <a onclick="cancelAdd();" class="ajax-action-links">Cancel</a></span></td>' +	
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
    url: "cltedit.php",
    type: "POST",
    data:'column='+column+'&editval='+$(editableObj).text()+'&ID='+id,
    success: function(data){
      $(editableObj).css("background","#FDFDFD");
    }
  });
}
function addToDatabase() {
   var username = $("#username").val();
   var name = $("#name").val();
   var bld_grp= $("#bld_grp").val();
   var quantity= $("#quantity").val();
   var adr= $("#adr").val();
   var date= $("#date").val();
   var day= $("#day").val();
   var time  = $("#time").val();
  
	  $("#confirmAdd").html('<img src="loaderIcon.gif" />');
	  $.ajax({
		url: "cltadd.php",
		type: "POST",
		data:'username='+username+'&name='+name+'&bld_grp='+bld_grp+'&quantity='+quantity+'&adr='+adr+'&date='+date+'&day='+day+'&time='+time,
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
			url: "cltdelete.php",
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
    Update Collection Form:
	<tr>
	  <th class="table-header">Username</th>
	  <th class="table-header">Name</th>
  <th class="table-header">Blood Group</th>
	  <th class="table-header">Quantity</th>
  <th class="table-header">Address</th>
	  <th class="table-header">Date</th>
	  <th class="table-header">Day</th>
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
		<td contenteditable="true" onBlur="saveToDatabase(this,'username','<?php echo $posts[$k]["ID"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["username"]; ?></td>
		<td contenteditable="true" onBlur="saveToDatabase(this,'name','<?php echo $posts[$k]["ID"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["name"]; ?></td>
		<td contenteditable="true" onBlur="saveToDatabase(this,'bld_grp','<?php echo $posts[$k]["ID"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["bld_grp"]; ?></td>
		<td contenteditable="true" onBlur="saveToDatabase(this,'quantity','<?php echo $posts[$k]["ID"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["quantity"]; ?></td>
		<td contenteditable="true" onBlur="saveToDatabase(this,'adr','<?php echo $posts[$k]["ID"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["adr"]; ?></td>
		<td contenteditable="true" onBlur="saveToDatabase(this,'date','<?php echo $posts[$k]["ID"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["date"]; ?></td>
		<td contenteditable="true" onBlur="saveToDatabase(this,'day','<?php echo $posts[$k]["ID"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["day"]; ?></td>

		<td contenteditable="true" onBlur="saveToDatabase(this,'time','<?php echo $posts[$k]["ID"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["time"]; ?></td>
		<td><a class="ajax-action-links" onclick="deleteRecord(<?php echo $posts[$k]["ID"]; ?>);">Delete</a></td>
	  </tr>
	  <?php
	}
	}
	?>
  </tbody>
</table>
