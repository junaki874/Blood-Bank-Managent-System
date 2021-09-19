<?php
extract($_POST);
include_once("database.php");
$sql=mysqli_query($conn,"SELECT * FROM patient where reason='$resn'");
if(mysqli_num_rows($sql)>0)
{
    echo "Empty information."; 
	exit;
}
if(isset($_POST['save']))
{
    $resn = $_POST['Reason'];
    $hosName = $_POST['hos_name'];
    $address= $_POST['hos_adress'];
    $con_num= $_POST['phn_Num'];
    $blood_grp = $_POST['grp'];
    $times = $_POST['need_time'];

    $sql="INSERT INTO patient(reason,hospital_name,hospital_adress,contact_num , blod_grp , time) 
                VALUES ('$resn','$hosName', '$address', '$con_num','$blood_grp','$times')";
                header ("Location: patientHome.php?status=success");
   
      if($conn->query($sql) === TRUE) {
        
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      $conn->close();


    }
?>                                                                                                                                                                                                                                                              