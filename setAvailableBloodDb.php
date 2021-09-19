<?php
extract($_POST);
include_once("database.php");
$sql=mysqli_query($conn,"SELECT * FROM blood_details where bld_type='$type'");
if(mysqli_num_rows($sql)>0)
{
    echo "Empty information."; 
	exit;
}
if(isset($_POST['save']))
{
    $type = $_POST['Name'];
    $avail= $_POST['Avial'];
    $blood_grp = $_POST['hospital_name'];
    $hos = $_POST['hospital_adr'];
    $phn_num = $_POST['Phn_Num'];

    $sql="INSERT INTO blood_details(bld_type, availibity, hos_name, hos_adr,con_num ) 
                VALUES ('$type',' $avail', '$blood_grp','$hos', '$phn_num')";
                header ("Location: setAvailableBlood.php?status=success");
   
      if($conn->query($sql) === TRUE) {
        
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      $conn->close();


    }
?>                                                                                                                                                                                                                                                              