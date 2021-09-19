
<?php
include "database.php";
$result=mysqli_query($conn,"SELECT * FROM collection ORDER BY ID DESC");

?>
<html>  
 <head>  
          <title>Collecting list</title>  
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


              
                  <li><a href='adminHome.php'>  Home</a></li>
                  <li><a href='updateClt.php'>Update</a></li>
                  <li><a href='record.php'>  Record</a></li>
                  <li><a href='searchCollect.php'> Search</a></li>
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
    <h3 align="center">Collecting List</h3><br />  
    <table id="editable_table" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>ID</th>
       <th>Username</th>
       <th>Name</th>
       <th>Blood Group</th>
       <th>Quantity</th>
       <th>Address</th>
       <th>Date</th>
       <th>Day</th>
       <th>Time</th>
      </tr>
     </thead>
     <tbody>
     <?php
     while($row = mysqli_fetch_array($result))
     {
      echo '
      <tr>
       <td>'.$row["ID"].'</td>
       <td>'.$row['username'].'</td>
       <td>'.$row['name'].'</td>
       <td>'.$row['quantity'].'</td>
       <td>'.$row['bld_grp'].'</td>
       <td>'.$row['adr'].'</td>
       <td>'.$row['date'].'</td>
       <td>'.$row['day'].'</td>
       <td>'.$row['time'].'</td>
      </tr>
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


