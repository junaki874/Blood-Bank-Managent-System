<?php
require_once("dbcontroller.php");
$db_handle = new DBController();

if(!empty($_POST["date"])) {
	$date = mysql_real_escape_string(strip_tags($_POST["date"]));
	$day = mysql_real_escape_string(strip_tags($_POST["day"]));
	$vanue = mysql_real_escape_string(strip_tags($_POST["vanue"]));
	$time = mysql_real_escape_string(strip_tags($_POST["time"]));

  $sql = "INSERT INTO camp (date,day,vanue,time) VALUES ('" . $date . "','" . $day . "','" . $vanue . "','" .$time. "')";
  $faq_id = $db_handle->executeInsert($sql);
	if(!empty($faq_id)) {
		$sql = "SELECT * from camp WHERE ID = '$faq_id' ";
		$posts = $db_handle->runSelectQuery($sql);
	}
?>
<tr class="table-row" id="table-row-<?php echo $posts[0]["id"]; ?>">
<td contenteditable="true" onBlur="saveToDatabase(this,'date','<?php echo $posts[0]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[0]["date"]; ?></td>
<td contenteditable="true" onBlur="saveToDatabase(this,'day','<?php echo $posts[0]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[0]["day"]; ?></td>

<td contenteditable="true" onBlur="saveToDatabase(this,'vanue','<?php echo $posts[0]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[0]["vanue"]; ?></td>
<td contenteditable="true" onBlur="saveToDatabase(this,'time','<?php echo $posts[0]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[0]["time "]; ?></td>


<td><a class="ajax-action-links" onclick="deleteRecord(<?php echo $posts[0]["id"]; ?>);">Delete</a></td>
</tr>  
<?php } ?>
