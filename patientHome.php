<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
       
        <link rel="stylesheet" href="adHomStyle.css">
    </head>

<body>
    <div class="full-page">
        <div class="navbar">
          
            <nav>
                <ul id='MenuItems'>
                <li><a href='adminHome.php'>  Home</a></li>
                    <li><button class='loginbtn' onclick="document.getElementById('login-form').style.display='block'" style="width:auto;">Add Patient Detalis</button></li>
                    <li><a href='updatePatientDetails.php'>Update Patient Detalis</a></li>
            
                   <li><a href='logout.php'>Log out</a></li>
                </ul>
            </nav>

        </div>
  
<div id='login-form'class='login-page'>

<div class="form-box">

<form id='login' class='input-group-login'method="post" action="patientDb.php" >
       <p> Why need blood?</p>
        <input type='text'class='input-field' name="Reason" placeholder='enter reason'  required >
        <p> Enter hospital name</p>
        <input type='text'class='input-field'name="hos_name" placeholder='Enter hospital name'  required>
        <p> Enter hospital address</p>
        <input type='text'class='input-field' name="hos_adress" placeholder='Enter hospital address' required>
        <p> Enter contact number</p>
        <input type='text'class='input-field' name="phn_Num" placeholder='contact number' required>
        <p> Enter blood group</p>
        <input type='text'class='input-field' name="grp" placeholder='Enter blood group' required>
        <p> When need blood?</p>
        <input type='text'class='input-field' name="need_time" placeholder='contact number' required>



        <button type='submit' name="save" class='submit-btn'>Submit patient details</button>
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