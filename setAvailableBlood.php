<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Personal Information</title>
        <link rel="stylesheet" href="infoStyle.css">
    </head>

<body>
    <div class="full-page">
        <div class="navbar">
         
            <nav>
                <ul id='MenuItems'>
                <li><a href='adminHome.php'>Update Blood</a></li>
                    <li><button class='loginbtn' onclick="document.getElementById('login-form').style.display='block'" style="width:auto;">Add Available Blood Details</button></li>

                    <li><a href='upAvailBld.php'>Update Blood Details</a></li>
          
                    <li><a href='logout.php'>Log out</a></li>
                </ul>
            </nav>

        </div>
  
<div id='login-form'class='login-page'>

<div class="form-box">

    <form id='login' class='input-group-login'method="post" action="setAvailableBloodDb.php" >
       <p> Blood type: </p>
        <input type='text'class='input-field' name="Name" placeholder='enter blood type' required >
        <p> Availibility (yes/no): </p>
        <input type='text'class='input-field'name="Avial" placeholder='enter availability'  required>
        <p> Hospital name: </p>
        <input type='text'class='input-field' name="hospital_name" placeholder='enter hospital name' required>
        <p> Hospital address: </p>
        <input type='text'class='input-field' name="hospital_adr" placeholder='enter address' required>


        <p> Contact Number: </p>
        <input type='text'class='input-field' name="Phn_Num" placeholder='contact number' required>



        <button type='submit' name="save" class='submit-btn'>Upload details</button>
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