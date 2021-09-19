<html>  
    <head>  
        <title>Donation Form</title>  
            
        <link rel = "stylesheet" type = "text/css" href = "adminStyle.css">   
  

</head>  
<body> 

<div class="navbar">
      
      <nav>
        

             <a href='viewCltList.php'>Collecting List</a>
      
         
      </nav>

  </div>




        <div id = "frm">  
            <h1>Search Form</h1>  
            <form name="f1" action = "searchCollectDb.php" onsubmit = "return validation()" method = "post">  
                <p>  
                    <label> Enter username: </label>  
                  </p>
                    <input type = "text" id ="user" name  = "User" />  
                 

                    <input type =  "submit" id = "btn" value = "Search" name  = "search" />  
               
            </form>  
        </div>  
   
        
    </body>     
    </html>  