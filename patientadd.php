<?php
require_once("dbcontroller.php");
$db_handle = new DBController();

if(!empty($_POST["reason"])) {
	$reason = mysql_real_escape_string(strip_tags($_POST["reason"]));
	$hospital_name = mysql_real_escape_string(strip_tags($_POST["$hospital_name"]));
	$hospital_adress = mysql_real_escape_string(strip_tags($_POST["hospital_adress"]));
	$contact_num = mysql_real_escape_string(strip_tags($_POST["contact_num"]));
	$blod_grp = mysql_real_escape_string(strip_tags($_POST["blod_grp"]));
	$time = mysql_real_escape_string(strip_tags($_POST["time"]));



  $sql = "INSERT INTO patient(reason,hospital_name,hospital_adress,contact_num,blod_grp ,time ) VALUES ('" . $reason . "','" . $hospital_name . "','" .$hospital_adress . "','" .$contact_num . "','" .$blod_grp  . "','" .$time  . "')";
  $faq_id = $db_handle->executeInsert($sql);
	if(!empty($faq_id)) {
		$sql = "SELECT * from patient WHERE ID = '$faq_id' ";
		$posts = $db_handle->runSelectQuery($sql);
	}
?>
<tr class="table-row" id="table-row-<?php echo $posts[0]["id"]; ?>">
<td contenteditable="true" onBlur="saveToDatabase(this,'reason','<?php echo $posts[0]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[0]["reason"]; ?></td>
<td contenteditable="true" onBlur="saveToDatabase(this,'hospital_name','<?php echo $posts[0]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[0]["hospital_name"]; ?></td>

<td contenteditable="true" onBlur="saveToDatabase(this,'hospital_adress','<?php echo $posts[0]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[0]["hospital_adress"]; ?></td>
<td contenteditable="true" onBlur="saveToDatabase(this,'contact_num','<?php echo $posts[0]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[0]["contact_num "]; ?></td>
<td contenteditable="true" onBlur="saveToDatabase(this,'blod_grp','<?php echo $posts[0]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[0]["blod_grp"]; ?></td>
<td contenteditable="true" onBlur="saveToDatabase(this,'time','<?php echo $posts[0]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[0]["time "]; ?></td>


<td><a class="ajax-action-links" onclick="deleteRecord(<?php echo $posts[0]["id"]; ?>);">Delete</a></td>
</tr>  
<?php } ?>
