<?php
require_once("dbcontroller.php");
$db_handle = new DBController();

if(!empty($_POST["Name"])) {
	$Name = mysql_real_escape_string(strip_tags($_POST["Name"]));
	$Address = mysql_real_escape_string(strip_tags($_POST["Address"]));
	$Blood_grp = mysql_real_escape_string(strip_tags($_POST["Blood_grp"]));
	$Phn_Num = mysql_real_escape_string(strip_tags($_POST["Phn_Num"]));

  $sql = "INSERT INTO Personal_Info (Name,Address,Blood_grp,Phn_Num) VALUES ('" . $Name . "','" . $Address . "','" .$Blood_grp . "','" .$Phn_Num . "')";
  $faq_id = $db_handle->executeInsert($sql);
	if(!empty($faq_id)) {
		$sql = "SELECT * from Personal_Info WHERE ID = '$faq_id' ";
		$posts = $db_handle->runSelectQuery($sql);
	}
?>
<tr class="table-row" id="table-row-<?php echo $posts[0]["id"]; ?>">
<td contenteditable="true" onBlur="saveToDatabase(this,'Name','<?php echo $posts[0]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[0]["Name"]; ?></td>
<td contenteditable="true" onBlur="saveToDatabase(this,'Address','<?php echo $posts[0]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[0]["Address"]; ?></td>

<td contenteditable="true" onBlur="saveToDatabase(this,'Blood_grp','<?php echo $posts[0]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[0]["Blood_grp"]; ?></td>
<td contenteditable="true" onBlur="saveToDatabase(this,'Phn_Num','<?php echo $posts[0]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[0]["Phn_Num "]; ?></td>


<td><a class="ajax-action-links" onclick="deleteRecord(<?php echo $posts[0]["id"]; ?>);">Delete</a></td>
</tr>  
<?php } ?>
