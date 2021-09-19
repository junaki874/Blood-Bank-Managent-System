
<?php
// Start the session
session_start();
?>

<?php



if(isset($_POST['save']))
{
    extract($_POST);
    include 'database.php';

    $user_name = $_POST['user'];   
    $pwd = $_POST['pass'];


    $sql=mysqli_query($conn,"SELECT * FROM admin_log where username='$user_name' and password='$pwd'");
    $row  = mysqli_fetch_array($sql);
    if(is_array($row))
    {
        $_SESSION["ID"] = $row['ID'];
        $_SESSION["username"] = $row['user'];
        $_SESSION["password"]=$row['pass'];


         header("Location: adminHome.php"); 
    }
    else 
    {
        echo "Invalid username or password";
        header("Location:authentication.php"); 
    }
}
?>
