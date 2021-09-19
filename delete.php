<?php
require_once("dbcontroller.php");
$db_handle = new DBController();

if(!empty($_POST['ID'])) {
	$id = $_POST['ID'];
	$sql = "DELETE FROM  register WHERE ID = '$id' ";
	$db_handle->executeQuery($sql);
}
?>
