<?php
require_once("dbcontroller.php");
$db_handle = new DBController();

if(!empty($_POST["bld_type"])) {
	$bld_type = mysql_real_escape_string(strip_tags($_POST["bld_type"]));
	$availibity = mysql_real_escape_string(strip_tags($_POST["$vavailibity "]));
	$hos_name = mysql_real_escape_string(strip_tags($_POST["hos_name"]));
	$hos_adr = mysql_real_escape_string(strip_tags($_POST["hos_adr"]));
	$con_num = mysql_real_escape_string(strip_tags($_POST["con_num"]));




  $sql = "INSERT INTO blood_details(bld_type,availibity ,hos_name,hos_adr,con_num ) VALUES ('" . $bld_type . "','" . $availibity  . "','" .$hos_name . "','" .$hos_adr . "','" .\$con_num  . "')";
  $faq_id = $db_handle->executeInsert($sql);
	if(!empty($faq_id)) {
		$sql = "SELECT * from blood_details WHERE ID = '$faq_id' ";
		$posts = $db_handle->runSelectQuery($sql);
	}
?>
<tr class="table-row" id="table-row-<?php echo $posts[0]["id"]; ?>">
<td contenteditable="true" onBlur="saveToDatabase(this,'bld_type','<?php echo $posts[0]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[0]["bld_type"]; ?></td>
<td contenteditable="true" onBlur="saveToDatabase(this,'availibity ','<?php echo $posts[0]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[0]["availibity "]; ?></td>

<td contenteditable="true" onBlur="saveToDatabase(this,'hos_name','<?php echo $posts[0]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[0]["hos_name"]; ?></td>
<td contenteditable="true" onBlur="saveToDatabase(this,'hos_adr','<?php echo $posts[0]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[0]["hos_adr"]; ?></td>
<td contenteditable="true" onBlur="saveToDatabase(this,'con_num','<?php echo $posts[0]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[0]["con_num"]; ?></td>




<td><a class="ajax-action-links" onclick="deleteRecord(<?php echo $posts[0]["id"]; ?>);">Delete</a></td>
</tr>  
<?php } ?>
