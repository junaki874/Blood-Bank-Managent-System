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
                <li><a href='adminHome.php'>Home</a></li>
                <li><button class='loginbtn' onclick="document.getElementById('login-form').style.display='block'" style="width:auto;">Add Camp Information</button></li>
                     <li><a href='updateCamp.php'>Update Camp Information</a></li>
                    <li><a href='logout.php'>Log out</a></li>
                </ul>
            </nav>

        </div>
  
<div id='login-form'class='login-page'>

<div class="form-box">

    <form id='login' class='input-group-login'method="post" action="campDb.php" >
       
        <input type='text'class='input-field' name="Date" placeholder='enter date'" required >
        <input type='text'class='input-field'name="Day" placeholder='enter day'  required>
        <input type='text'class='input-field' name="Vanue" placeholder='enter vanue' required>
        <input type='text'class='input-field' name="Con_Time" placeholder='contact time' required>



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