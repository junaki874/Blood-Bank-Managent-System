<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title> Search Donors</title>

        <link rel="stylesheet" href="searchStyle.css">
    </head>

    <body>
        <div class="full-page">
            <div class="navbar">
                <div>
                    <a href='search.php'>Search Donors</a>
                </div>
                <nav>
                    <ul id='MenuItems'>
                    <li><button class='loginbtn' onclick="document.getElementById('login-form').style.display='block'" style="width:auto;">Enter information</button></li>
                    <li><a href='bldDetails.php'>Blood Details</a></li>  
                    <li><a href='logout.php'>Log out</a></li>
                    </ul>
                </nav>
    
            </div>
     

 
        <div id='login-form'class='login-page'>

            <div class="form-box">
    <form id='login' class='input-group-login' method="post" action="listDonors.php">
        <input type='text'class='input-field'name="Blood_grp" placeholder='enter blood group' required >
        <input type='text'class='input-field' name="Address" placeholder='enter address' required>



        <button name="search" type='submit'class='submit-btn'>Search</button>
</form>     
</div>
</div>
</div>

    </body>
</html>