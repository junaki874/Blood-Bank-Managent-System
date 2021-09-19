
<?php
extract($_POST);
include_once("database.php");
$sql=mysqli_query($conn,"SELECT * FROM Personal_Info where Name='$name'");
if(mysqli_num_rows($sql)>0)
{
    echo "Empty information."; 
	exit;
}
if(isset($_POST['save']))
{
    $name = $_POST['Name'];
    $address= $_POST['Address'];
    $blood_grp = $_POST['Blood_grp'];
    $phn_num = $_POST['Phn_Num'];


$sql = "UPDATE Personal_Info SET Name='$name' Address='$address' Blood_grp='$blood_grp' Phn_Num='$phn_num' WHERE ID=9";

             header ("Location: edit.php?status=success");
   
      if($conn->query($sql) === TRUE) {
        
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      $conn->close();


    }
?>  