
<?php
include "database.php";
$result=mysqli_query($conn,"SELECT * FROM request ORDER BY ID DESC");

?>
<html>  
 <head>  
          <title>Update camp vanue</title>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>            
    <script src="jquery.tabledit.min.js"></script>
    </head>  
    <body>  
  <div class="container">  
   <br />  
   <br />  
   <br />  
   <div> <p><a href="adminRequest.php">Request Activity</a></p></div>
<div class="table-responsive">  
    <h3 align="center">Request List</h3><br />  
    <table id="editable_table" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>ID</th>
       <th>Reason</th>
       <th>Hospital_Name</th>
       <th>Address</th>
       <th>Contact Number</th>

       <th>Blood Group</th>
       <th>Tme</th>
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


