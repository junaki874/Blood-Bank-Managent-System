<?php
extract($_POST);
include_once("database.php");
$sql=mysqli_query($conn,"SELECT * FROM register where Email='$email'");
if(mysqli_num_rows($sql)>0)
{
    echo "Email Id Already Exists"; 
	exit;
}
if(isset($_POST['save']))
{
    $user_Name = $_POST['User_Name'];
    $email= $_POST['Email'];
    $password = $_POST['Password'];
    $confirm_Password = $_POST['Confirm_Password'];

    $sql="INSERT INTO register(User_Name, Email, Password, Confirm_Password) 
                VALUES ('$user_Name','$email', '$password', '$confirm_Password')";
                header ("Location: index.php?status=success");
   
      if($conn->query($sql) === TRUE) {
        
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      $conn->close();


    }
?>                                                                                                                                                                                                                                                              