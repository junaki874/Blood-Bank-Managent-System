
<?php
include "database.php";
$result=mysqli_query($conn,"SELECT * FROM camp ORDER BY ID DESC");

?>
<html>  
 <head>  
          <title>Update camp vanue</title>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>            
    <script src="jquery.tabledit.min.js"></script>
    <link rel="stylesheet" href="pageStyle.css">

    </head>  
    <body> 

    <div class="navbar">
          
          <nav>
              <ul id='MenuItems'>


              
                  <li><a href='information.php'>  Home</a></li>
                 <li><a href='logout.php'>Log out</a></li>
              </ul>
          </nav>

      </div>


  <div class="container">  
   <br />  
   <br />  
   <br />  
   
   <div>

  
<div class="table-responsive">  
    <h3 align="center">Details of Camp for Collecting Blood</h3><br />  
    <table id="editable_table" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>ID</th>
       <th>Date</th>
       <th>Day</th>
       <th>Vanue</th>
       <th>Contact Time</th>
      </tr>
     </thead>
     <tbody>
     <?php
     while($row = mysqli_fetch_array($result))
     {
      echo '
      <tr>
       <td>'.$row["ID"].'</td>
       <td>'.$row['date'].'</td>
       <td>'.$row['day'].'</td>
       <td>'.$row['vanue'].'</td>
       <td>'.$row['time'].'</td>
      </tr>
      ';
     }
     ?>
     </tbody>
    </table>
   </div>  
  </div>  
 </body>  
</html>  


