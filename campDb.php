<?php
extract($_POST);
include_once("database.php");
$sql=mysqli_query($conn,"SELECT * FROM camp where date='$date1");
if(mysqli_num_rows($sql)>0)
{
    echo "Empty information."; 
	exit;
}
if(isset($_POST['save']))
{
    $date1 = $_POST['Date'];
    $day1= $_POST['Day'];
    $vanue1 = $_POST['Vanue'];
    $time1 = $_POST['Con_Time'];

    $sql="INSERT INTO camp(date,day,vanue,time) 
                VALUES ('$date1','$day1', '$vanue1', ' $time1')";
                header ("Location: camp.php?status=success");
   
      if($conn->query($sql) === TRUE) {
        
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      $conn->close();


    }
?>                                                                                                                                                                                                                                                              