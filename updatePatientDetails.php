

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






<?php
require_once("dbcontroller.php");
$db_handle = new DBController();

$sql = "SELECT * from patient";
$posts = $db_handle->runSelectQuery($sql);
?>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function createNew() {
	$("#add-more").hide();

	var data = '<tr class="table-row" id="new_row_ajax">' +

	'<td contenteditable="true" id="reason" onBlur="addToHiddenField(this,\'reason\')" onClick="editRow(this);"></td>' +
	'<td contenteditable="true" id="hospital_name" onBlur="addToHiddenField(this,\'hospital_name\')" onClick="editRow(this);"></td>' +
     '<td contenteditable="true" id="hospital_adress" onBlur="addToHiddenField(this,\'hospital_adress\')" onClick="editRow(this);"></td>' +
	'<td contenteditable="true" id="contact_num" onBlur="addToHiddenField(this,\'contact_num\')" onClick="editRow(this);"></td>' +
     '<td contenteditable="true" id="blod_grp" onBlur="addToHiddenField(this,\'blod_grp\')" onClick="editRow(this);"></td>' +
	'<td contenteditable="true" id="time" onBlur="addToHiddenField(this,\'time\')" onClick="editRow(this);"></td>' +


	'<td><input type="hidden" id="reason" /><input type="hidden" id="hospital_name" /><input type="hidden" id="hospital_adress" /><input type="hidden" id="contact_num" /><td><input type="hidden" id="blod_grp" /><input type="hidden" id="time" /><span id="confirmAdd"><a onClick="addToDatabase()" class="ajax-action-links">Save</a> / <a onclick="cancelAdd();" class="ajax-action-links">Cancel</a></span></td>' +	
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
    url: "patientedit.php",
    type: "POST",
    data:'column='+column+'&editval='+$(editableObj).text()+'&ID='+id,
    success: function(data){
      $(editableObj).css("background","#FDFDFD");
    }
  });
}
function addToDatabase() {
  var reason = $("#reason").val();
  var hospital_name = $("#hospital_name").val();
   var hospital_adress= $("#hospital_adress").val();
  var contact_num = $("#contact_num").val();
   var blod_grp= $("#blod_grp").val();
  var time  = $("#time").val();
  
	  $("#confirmAdd").html('<img src="loaderIcon.gif" />');
	  $.ajax({
		url: "patientadd.php",
		type: "POST",
		data:'reason='+reason+'&hospital_name='+hospital_name+'&hospital_adress='+hospital_adress+'&contact_num='+contact_num+'&blod_grp='+blod_grp+'&time='+time,
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
			url: "patientdelete.php",
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
   <p> Update patient details: </p>
	<tr>
	  <th class="table-header">Reason</th>
	  <th class="table-header">Hospital Name</th>
  <th class="table-header">Hospital Address</th>
	  <th class="table-header">Contact Number</th>
  <th class="table-header">Blood Group</th>
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
		<td contenteditable="true" onBlur="saveToDatabase(this,'reason','<?php echo $posts[$k]["ID"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["reason"]; ?></td>
		<td contenteditable="true" onBlur="saveToDatabase(this,'hospital_name','<?php echo $posts[$k]["ID"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["hospital_name"]; ?></td>
		<td contenteditable="true" onBlur="saveToDatabase(this,'hospital_adress','<?php echo $posts[$k]["ID"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["hospital_adress"]; ?></td>
		<td contenteditable="true" onBlur="saveToDatabase(this,'contact_num','<?php echo $posts[$k]["ID"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["contact_num"]; ?></td>
		<td contenteditable="true" onBlur="saveToDatabase(this,'blod_grp','<?php echo $posts[$k]["ID"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["blod_grp"]; ?></td>
		<td contenteditable="true" onBlur="saveToDatabase(this,'time','<?php echo $posts[$k]["ID"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["time"]; ?></td>
		<td><a class="ajax-action-links" onclick="deleteRecord(<?php echo $posts[$k]["ID"]; ?>);">Delete</a></td>
	  </tr>
	  <?php
	}
	}
	?>
  </tbody>
</table>


</body>
</html>
