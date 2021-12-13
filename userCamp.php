<!DOCTYPE html>
<html>
<head>
  <title>Camp Information</title>
</head>
<body>

<table border="2">
  <tr>
    <td>Name</td>
    <td>Address</td>
    <td>Blood_grp</td>
    <td>Phn_Num</td>
  </tr>

<?php

include "database.php";

$sql = "SELECT * FROM Personal_Info";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo        
        '<tr>
             <td>'.$row['Name'].'</td>
             <td>'.$row['Address'].'</td>
             <td>'.$row['Blood_grp'].'</td>
             <td>'.$row['Phn_Num'].'</td>
      
        </tr>';

    }
} else {
  echo "0 results";
}
$conn->close();
?>
</table>
</body>
</html>
