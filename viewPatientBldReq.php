
<?php
include "database.php";
$result=mysqli_query($conn,"SELECT * FROM patient ORDER BY ID DESC");

?>
<html>  
 <head>  
          <title>List of Blood Request for patient</title>  
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


          
              <li><a href='information.php'>Blood Request</a></li>
             <li><a href='logout.php'>Log out</a></li>
          </ul>
      </nav>

  </div>

  <div class="container">  
   <br />  
   <br />  
   <br />  

<div class="table-responsive">  
    <h3 align="center">Blood Request List for Patient</h3><br />  
    <table id="editable_table" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>ID</th>
       <th>Reason</th>
       <th>Hospital Name</th>
       <th>Address</th>
       <th>Phone Number</th>
       <th>Blood Group</th>
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
       <td>'.$row['reason'].'</td>
       <td>'.$row['hospital_name'].'</td>
       <td>'.$row['hospital_adress'].'</td>
       <td>'.$row['contact_num'].'</td>
       <td>'.$row['blod_grp'].'</td>
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


