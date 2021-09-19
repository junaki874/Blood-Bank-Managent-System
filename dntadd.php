<?php
require_once("dbcontroller.php");
$db_handle = new DBController();

if(!empty($_POST["username"])) {
	$username = mysql_real_escape_string(strip_tags($_POST["username"]));
	$name = mysql_real_escape_string(strip_tags($_POST["name"]));
	$bld_grp = mysql_real_escape_string(strip_tags($_POST["bld_grp"]));
	$quantity = mysql_real_escape_string(strip_tags($_POST["quantity"]));
	$adr = mysql_real_escape_string(strip_tags($_POST["adr"]));
    $date = mysql_real_escape_string(strip_tags($_POST["date"]));
    $day = mysql_real_escape_string(strip_tags($_POST["day"]));
	$time = mysql_real_escape_string(strip_tags($_POST["time"]));



  $sql = "INSERT INTO donation(username,name,bld_grp,quantity,adr,date, day ,time ) VALUES ('" . $username . "','" . $name . "','" .$bld_grp . "','" .$quantity. "','" .$adr  . "','" .$date  . "','" .$day  . "','" .$time  . "')";
  $faq_id = $db_handle->executeInsert($sql);
	if(!empty($faq_id)) {
		$sql = "SELECT * from donation WHERE ID = '$faq_id' ";
		$posts = $db_handle->runSelectQuery($sql);
	}
?>
<tr class="table-row" id="table-row-<?php echo $posts[0]["id"]; ?>">
<td contenteditable="true" onBlur="saveToDatabase(this,'username','<?php echo $posts[0]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[0]["username"]; ?></td>
<td contenteditable="true" onBlur="saveToDatabase(this,'name','<?php echo $posts[0]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[0]["name"]; ?></td>

<td contenteditable="true" onBlur="saveToDatabase(this,'bld_grp','<?php echo $posts[0]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[0]["bld_grp"]; ?></td>
<td contenteditable="true" onBlur="saveToDatabase(this,'quantity','<?php echo $posts[0]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[0]["quantity "]; ?></td>
<td contenteditable="true" onBlur="saveToDatabase(this,'adr','<?php echo $posts[0]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[0]["adr"]; ?></td>
<td contenteditable="true" onBlur="saveToDatabase(this,'date','<?php echo $posts[0]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[0]["date "]; ?></td>

<td contenteditable="true" onBlur="saveToDatabase(this,'day','<?php echo $posts[0]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[0]["day "]; ?></td>

<td contenteditable="true" onBlur="saveToDatabase(this,'time','<?php echo $posts[0]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[0]["time "]; ?></td>

<td><a class="ajax-action-links" onclick="deleteRecord(<?php echo $posts[0]["id"]; ?>);">Delete</a></td>
</tr>  
<?php } ?>

