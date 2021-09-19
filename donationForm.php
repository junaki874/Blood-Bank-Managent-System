<html>  
    <head>  
        <title>Donation Form</title>  
            
        <link rel = "stylesheet" type = "text/css" href = "adminStyle.css">   
    </head>  
    <body>  
        <div id = "frm">  
            <h1>Donation Form</h1>  
            <form name="f1" action = "donationFormDb.php" onsubmit = "return validation()" method = "post">  
                <p>  
                    <label> UserName: </label>  
                    <input type = "text" id ="user" name  = "User" />  
                </p>  
                <p>  
                    <label> Name: </label>  
                    <input type = "text" id ="pass" name  = "Name" />  
                </p>  
                <p>  
                    <label>Blood Group: </label>  
                    <input type = "text" id ="pass" name  = "Bld_grp" />  
                </p>
                <p>  
                    <label> Quantity: </label>  
                    <input type = "text" id ="pass" name  = "Quantt" />  
                </p>
                <p>  
                    <label> Address: </label>  
                    <input type = "text" id ="pass" name  = "adrs" />  
                </p>
                <p>  
                    <label> Date: </label>  
                    <input type = "text" id ="pass" name  = "Date" placeholder="DD/MM/YY"/>  
                </p>
                <p>  
                    <label> Day: </label>  
                    <input type = "text" id ="pass" name  = "Day" />  
                </p>
                <p>  
                    <label> Time: </label>  
                    <input type = "text" id ="pass" name  = "tm" />  
                </p>
                <p>     

                    <input type =  "submit" id = "btn" value = "Submit" name  = "save" />  
                </p>  
            </form>  
        </div>  
   
        
    </body>     
    </html>  