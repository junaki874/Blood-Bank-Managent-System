<?php
require_once("dbcontroller.php");
$db_handle = new DBController();

$sql = "SELECT * from blood_details";
$posts = $db_handle->runSelectQuery($sql);
?>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function createNew() {
	$("#add-more").hide();

	var data = '<tr class="table-row" id="new_row_ajax">' +

	'<td contenteditable="true" id="bld_type" onBlur="addToHiddenField(this,\'bld_type\')" onClick="editRow(this);"></td>' +
	'<td contenteditable="true" id="availibility" onBlur="addToHiddenField(this,\'availibility\')" onClick="editRow(this);"></td>' +
     '<td contenteditable="true" id="hos_name" onBlur="addToHiddenField(this,\'hos_name\')" onClick="editRow(this);"></td>' +
	'<td contenteditable="true" id="hos_adr" onBlur="addToHiddenField(this,\'hos_adr\')" onClick="editRow(this);"></td>' +
     '<td contenteditable="true" id="con_num" onBlur="addToHiddenField(this,\'con_num\')" onClick="editRow(this);"></td>' +



	'<td><input type="hidden" id="bld_type" /><input type="hidden" id="availibility" /><input type="hidden" id="hos_name" /><input type="hidden" id="hos_adr" /><td><input type="hidden" id="con_num" /><span id="confirmAdd"><a onClick="addToDatabase()" class="ajax-action-links">Save</a> / <a onclick="cancelAdd();" class="ajax-action-links">Cancel</a></span></td>' +	
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
    url: "bldAvedit.php",
    type: "POST",
    data:'column='+column+'&editval='+$(editableObj).text()+'&ID='+id,
    success: function(data){
      $(editableObj).css("background","#FDFDFD");
    }
  });
}
function addToDatabase() {
  var bld_type = $("#bld_type").val();
  var availibity = $("#availibity").val();
  var hos_name = $("#hos_name").val();
   var hos_adr= $("#hos_adr").val();
   var con_num= $("#con_num").val();

  
	  $("#confirmAdd").html('<img src="loaderIcon.gif" />');
	  $.ajax({
		url: "bldAvadd.php",
		type: "POST",
		data:'bld_type='+bld_type+'&availibity='+availibity+'&hos_name='+hos_name+'&hos_adr='+hos_adr+'&con_num='+con_num,
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
			url: "bldAvdelete.php",
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
    Update Available blood: 
	<tr>
	  <th class="table-header">Blood Type</th>
      <th class="table-header">Availability</th>
	  <th class="table-header">Hospital Name</th>
      <th class="table-header">Hospital Address</th>
	  <th class="table-header">Contact Number</th>

	  <th class="table-header">Actions</th>
	</tr>
  </thead>
  <tbody id="table-body">
	<?php
	if(!empty($posts)) { 
	foreach($posts as $k=>$v) {
	  ?>
	  <tr class="table-row" id="table-row-<?php echo $posts[$k]["ID"]; ?>">
		<td contenteditable="true" onBlur="saveToDatabase(this,'bld_type','<?php echo $posts[$k]["ID"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["bld_type"]; ?></td>
		<td contenteditable="true" onBlur="saveToDatabase(this,'availibity','<?php echo $posts[$k]["ID"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["availibity"]; ?></td>
		<td contenteditable="true" onBlur="saveToDatabase(this,'hos_name','<?php echo $posts[$k]["ID"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["hos_name"]; ?></td>
		<td contenteditable="true" onBlur="saveToDatabase(this,'hos_adr','<?php echo $posts[$k]["ID"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["hos_adr"]; ?></td>
		<td contenteditable="true" onBlur="saveToDatabase(this,'con_num','<?php echo $posts[$k]["ID"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["con_num"]; ?></td>

		<td><a class="ajax-action-links" onclick="deleteRecord(<?php echo $posts[$k]["ID"]; ?>);">Delete</a></td>
	  </tr>
	  <?php
	}
	}
	?>
  </tbody>
</table>
