<?php
require_once("dbcontroller.php");
$db_handle = new DBController();

if(!empty($_POST["User_Name"])) {
	$User_Name = mysql_real_escape_string(strip_tags($_POST["User_Name"]));
	$Email = mysql_real_escape_string(strip_tags($_POST["Email"]));
	$Password = mysql_real_escape_string(strip_tags($_POST["Password"]));
	$Confirm_Password = mysql_real_escape_string(strip_tags($_POST["Confirm_Password "]));

  $sql = "INSERT INTO register (User_Name,Email,Password,Password) VALUES ('" . $User_Name . "','" . $Email . "','" . $Password . "','" .$Confirm_Password. "')";
  $faq_id = $db_handle->executeInsert($sql);
	if(!empty($faq_id)) {
		$sql = "SELECT * from register WHERE ID = '$faq_id' ";
		$posts = $db_handle->runSelectQuery($sql);
	}
?>
<tr class="table-row" id="table-row-<?php echo $posts[0]["id"]; ?>">
<td contenteditable="true" onBlur="saveToDatabase(this,'User_Name','<?php echo $posts[0]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[0]["User_Name"]; ?></td>
<td contenteditable="true" onBlur="saveToDatabase(this,'Email','<?php echo $posts[0]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[0]["Email"]; ?></td>

<td contenteditable="true" onBlur="saveToDatabase(this,'Password','<?php echo $posts[0]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[0]["Password"]; ?></td>
<td contenteditable="true" onBlur="saveToDatabase(this,'Confirm_Password ','<?php echo $posts[0]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[0]["Confirm_Password "]; ?></td>


<td><a class="ajax-action-links" onclick="deleteRecord(<?php echo $posts[0]["id"]; ?>);">Delete</a></td>
</tr>  
<?php } ?>
