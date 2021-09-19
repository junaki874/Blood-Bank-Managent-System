<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$sql = "UPDATE collection set " . $_POST["column"] . " = '".$_POST["editval"]."' WHERE  ID=".$_POST["ID"];
$result = $db_handle->executeUpdate($sql);
?>
