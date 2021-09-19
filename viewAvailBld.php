
<?php
include "database.php";
$result=mysqli_query($conn,"SELECT * FROM blood_details ORDER BY ID DESC");

?>
<html>  
 <head>  
          <title>Available blood list: </title>  
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


          
              <li><a href='bldDetails.php'>Blood Details</a></li>
             <li><a href='logout.php'>Log out</a></li>
          </ul>
      </nav>

  </div>


  <div class="container">  
   <br />  
   <br />  
   <br />  
 
<div class="table-responsive">  
    <h3 align="center">Available Blood List</h3><br />  
    <table id="editable_table" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>ID</th>
       <th>Blood Type</th>
       <th>Availability</th>
       <th>Hospital Name</th>
       <th>Hospital Adress</th>

       <th>Contact Number</th>
      </tr>
     </thead>
     <tbody>
     <?php
     while($row = mysqli_fetch_array($result))
     {
      echo '
      <tr>
       <td>'.$row["ID"].'</td>
       <td>'.$row['bld_type'].'</td>
       <td>'.$row['availibity'].'</td>
       <td>'.$row['hos_name'].'</td>
       <td>'.$row['hos_adr'].'</td>
       <td>'.$row['con_num'].'</td>

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


