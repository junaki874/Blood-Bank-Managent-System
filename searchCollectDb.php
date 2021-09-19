
<?php
require_once("DBController.php");
$db_handle = new DBController();
$result = $db_handle->runQuery("SELECT * FROM donation");
$header = $db_handle->runQuery("SELECT `COLUMN_NAME` 
FROM `INFORMATION_SCHEMA`.`COLUMNS` 
WHERE `TABLE_SCHEMA`='blood_bank' 
    AND `TABLE_NAME`='collection'"

);
$conn = new mysqli('localhost', 'root', '', 'blood_bank');

$result=mysqli_query($conn,"SELECT * FROM collection ORDER BY ID DESC");

?>
<html>  
 <head>  
          <title>Serach donation record</title>  
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


               <li><a href='information.php'>Home</a></li>
              <li><a href='collectingForm.php'>Search record</a></li>
             <li><a href='logout.php'>Log out</a></li>
          </ul>
      </nav>

  </div>


  <div class="container">  
   <br />  
   <br />  
   <br />  
 
<div class="table-responsive">  
    <h3 align="center">Donation Report</h3><br />  
    <table id="editable_table" class="table table-bordered table-striped">
    
     <tbody>


     <?php
    if(isset($_POST['search'])){
  
      $usernm= $_POST['User'];
   
      
      $sql = "SELECT * FROM collection where username = '$usernm' ";
      
      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
    
     ob_end_clean();
          
      require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);

		
foreach($header as $heading) {
	foreach($heading as $column_heading)
		$pdf->Cell(20,15,$column_heading,1);
}
foreach($result as $row) {
	$pdf->SetFont('Arial','',10);	
	$pdf->Ln();
	foreach($row as $column)
		$pdf->Cell(20,15,$column,1);
}
$pdf->Output();

          
      } else {
        echo "0 results";
      }
      
      }
     ?>
     </tbody>
    </table>
    <a href='#'>View as pdf</a> 
   </div>  
  
  </div> 

 </body>  
</html>  


