<?php
extract($_POST);
include_once("database.php");
$sql=mysqli_query($conn,"SELECT * FROM donation where username='$user'");
if(mysqli_num_rows($sql)>0)
{
    echo "Empty information."; 
	exit;
}
if(isset($_POST['save']))
{
    $user = $_POST['User'];
    $dname = $_POST['Name'];
    $bld= $_POST['Bld_grp'];
    $qntt= $_POST['Quantt'];
    $adrss = $_POST['adrs'];
    $dt = $_POST['Date'];
    $dy = $_POST['Day'];
    $times = $_POST['tm'];



    $sql="INSERT INTO donation(username,name,bld_grp,quantity , adr , date,day,time) 
                VALUES ('$user','$dname', '$bld', '$qntt','$adrss','$dt','$dy','$times')";
                header ("Location: collectingForm.php?status=success");
   
      if($conn->query($sql) === TRUE) {
        
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      $conn->close();


    }
?>                                                                                                                                                                                                                                                              