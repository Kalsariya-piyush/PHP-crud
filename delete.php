<?php 
    include "connect.php";
    if(isset($_GET["id"])) {
        $did = $_GET["id"];
        $sql = "DELETE FROM `prods` WHERE id=$did";

        if(mysqli_query($conn,$sql)) {
            header("Location: index.php");
        } else {
            echo mysqli_error($conn);
        }
    }
?>