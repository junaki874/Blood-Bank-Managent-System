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

    $sql="INSERT INTO Personal_Info(Name, Address, Blood_grp, Phn_Num) 
                VALUES ('$name','$address', '$blood_grp', '$phn_num')";
                header ("Location: information.php?status=success");
   
      if($conn->query($sql) === TRUE) {
        
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      $conn->close();


    }
?>                                                                                                                                                                                                                                                              