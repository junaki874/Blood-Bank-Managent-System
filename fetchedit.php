<?php

include 'database.php';
 
if ($_POST['action'] == 'edit') {
    $data = [
        ':date' => $_POST['date'],
        ':day' => $_POST['day'],
        ':vanue' => $_POST['vanue'],
        ':time' => $_POST['time'],
        ':ID' => $_POST['ID'],
    ];
 
    $query = "
 UPDATE camp
 SET date = :date, 
day = :day, 
vanue = :vanue,
 time = :timet 
 WHERE ID = :ID
 ";
    $statement =  $conn->prepare($query);
    $statement->execute($data);
    echo json_encode($_POST);
}
 
if ($_POST['action'] == 'delete') {
    $query =
        "
 DELETE FROM camp
 WHERE ID = '" .
        $_POST["ID"] .
        "'
 ";
    $statement =   $conn->prepare($query);
    $statement->execute();
    echo json_encode($_POST);
}
 
?>