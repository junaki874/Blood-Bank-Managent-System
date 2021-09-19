<?php
// Start the session
session_start();
?>

<?php



if(isset($_POST['save']))
{
    extract($_POST);
    include 'database.php';
    $sql=mysqli_query($conn,"SELECT * FROM admin where email='$Email' and password='$Password'");
    $row  = mysqli_fetch_array($sql);
    if(is_array($row))
    {
        $_SESSION["ID"] = $row['ID'];
        $_SESSION["name"] = $row['User_Name'];
        $_SESSION["email"]=$row['Email'];
        $_SESSION["password"]=$row['Password'];
         header("Location: adminHome.php"); 
    }
    else 
    {
        echo "Invalid Email ID/Password";
        header("Location: login.php"); 
    }
}
?>
