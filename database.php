<?php
    $url="localhost";
    $username="root";
    $password="";
    $dbname="blood_bank";
    $conn=new mysqli($url,$username,$password,$dbname);
    if(!$conn){
        die('Could not Connect My Sql:' .mysql_error());
    }

?>
