<?php 
    $host="localhost";
    $user = "root";
    $pass = "";
    $dbname = "store";

    $conn = mysqli_connect($host,$user,$pass,$dbname);

    if(!$conn) {
        die('Connection Failed');
    }
?>