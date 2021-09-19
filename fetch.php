<?php
//DB Connection
include 'database.php';
 
$column = ["ID", "date", "day", "vanue", "time"];
 
$query = "SELECT * FROM camp ";
 
if (isset($_POST["search"]["value"])) {
    $query .=
        '
 WHERE date LIKE "%' .
        $_POST["search"]["value"] .
        '%" 
 OR day LIKE "%' .
        $_POST["search"]["value"] .
        '%" 
 OR vanue LIKE "%' .
        $_POST["search"]["value"] .
        '%" 
 OR time LIKE "%' .
        $_POST["search"]["value"] .
        '%" 
 ';
}
 
if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $column[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
} else {
    $query .= 'ORDER BY ID ASC ';
}
$query1 = '';
 
if ($_POST["length"] != -1) {
    $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
 
$statement =   $conn->prepare($query);
 
$statement->execute();
 
$number_filter_row = $statement->rowCount();
 
$statement =  $conn->prepare($query . $query1);
 
$statement->execute();
 
$result = $statement->fetchAll();
 
$data = [];
 
foreach ($result as $row) {
    $sub_array = [];
    $sub_array[] = $row['ID'];
    $sub_array[] = $row['date'];
    $sub_array[] = $row['day'];
    $sub_array[] = $row['vanuer'];
    $sub_array[] = $row['time'];
    $data[] = $sub_array;
}
 
function count_all_data(  $conn)
{
    $query = "SELECT * FROM camp";
    $statement =   $conn->prepare($query);
    $statement->execute();
    return $statement->rowCount();
}
 
$output = [
    'draw' => intval($_POST['draw']),
    'recordsTotal' => count_all_data(  $conn),
    'recordsFiltered' => $number_filter_row,
    'data' => $data,
];
 
echo json_encode($output);
 
?>