
<?php
include "database.php";
$result=mysqli_query($conn,"SELECT * FROM Personal_Info ORDER BY ID DESC");

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


              <li><a href='adminSearch.php'>Search Donor</a></li>
                  <li><a href='adminHome.php'>View Donor</a></li>
                 <li><a href='logout.php'>Log out</a></li>
              </ul>
          </nav>

      </div>


  <div class="container">  
   <br />  
   <br />  
   <br />  
<div class="table-responsive">  
    <h3 align="center">Donar List</h3><br />  
    <table id="editable_table" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>ID</th>
       <th>Name</th>
       <th>Address</th>
       <th>Blood Group</th>
       <th>Phone Number</th>
      </tr>
     </thead>
     <tbody>
     <?php
     while($row = mysqli_fetch_array($result))
     {
      echo '
      <tr>
       <td>'.$row["ID"].'</td>
       <td>'.$row['Name'].'</td>
       <td>'.$row['Address'].'</td>
       <td>'.$row['Blood_grp'].'</td>
       <td>'.$row['Phn_Num'].'</td>
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


