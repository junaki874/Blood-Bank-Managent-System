<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Home</title>
        <link rel="stylesheet" href="infoStyle.css">
    </head>

<body>
    <div class="full-page">
        <div class="navbar">
         
            <nav>
                <ul id='MenuItems'>
                     <li><a href='userViewCamp.php'>Camp</a></li>
                    <li><button class='loginbtn' onclick="document.getElementById('login-form').style.display='block'" style="width:auto;">Donar Registration</button></li>

                    <li><a href='bldDetails.php'>Blood Details</a></li>
                    <li><a href='userView.php'>View Donors</a></li>
                    <li><a href='viewPatientBldReq.php'>View Blood Request</a></li>
                    <li><a href='about.php'>About Us</a></li>
                    <li><a href='logout.php'>Log out</a></li>
                </ul>
            </nav>

        </div>
  
<div id='login-form'class='login-page'>

<div class="form-box">

    <form id='login' class='input-group-login'method="post" action="infoDatabase.php" >
       
        <input type='text'class='input-field' name="Name" placeholder='enter name' value="<?php echo $_SESSION["name"] ?>" required >
        <input type='text'class='input-field'name="Address" placeholder='enter address'  required>
        <input type='text'class='input-field' name="Blood_grp" placeholder='enter blood group' required>
        <input type='text'class='input-field' name="Phn_Num" placeholder='contact number' required>



        <button type='submit' name="save" class='submit-btn'>save</button>
</form>     


</div>                                              

</div>

	<script>
        var modal = document.getElementById('login-form');
        window.onclick = function(event) 
        {
            if (event.target == modal) 
            {
                modal.style.display = "none";
            }
        }
    </script>

</body>


</html>