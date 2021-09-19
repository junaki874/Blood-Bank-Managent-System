
<?php  

include 'database.php';


$input = filter_input_array(INPUT_POST);

$date1 = mysqli_real_escape_string($conn, $input["date"]);
$day1 = mysqli_real_escape_string($conn, $input["day"]);
$vanue1 = mysqli_real_escape_string($conn, $input["vanue"]);
$time1 = mysqli_real_escape_string($conn, $input["time"]);

if($input["action"] === 'edit')
{
 $query = "
 UPDATE camp
 SET date = '".$date1."', 
  day = '".$day1."' 
  vanue = '".$vanue1."' 
time = '".$time1."' 
 WHERE ID = '".$input["ID"]."'
 ";

 mysqli_query($conn, $query);

}
if($input["action"] === 'delete')
{
 $query = "
 DELETE FROM camp 
 WHERE ID = '".$input["ID"]."'
 ";
 mysqli_query($conn, $query);
}

echo json_encode($input);

?>
