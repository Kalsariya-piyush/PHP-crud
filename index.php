<?php
    include 'connect.php';

    session_start();
    if(isset($_SESSION['name']) && isset($_SESSION['username']) && isset($_SESSION['role'])) {
        $name = $_SESSION['name'];
        $email = $_SESSION['username'];
        $role = $_SESSION['role'];
    } else {
        header('Location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Home</title>

</head>
<body>
        <?php 
            include 'header.php';
            echo "<p?>"."Hiiii ".$name."</p>";
        ?>

        <div class="container">
            <input type="search" name="search" id="search" placeholder="Search ... " class="form-control">
        </div>

        <div id="searchResults" class="container"></div>

        <!-- jquery  -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            $(
                $(document).ready(function(){
                    $.ajax({
                        url:"liveSearch.php",
                        method: "POST",
                        data:{
                            searchTerm:null
                        },
                        success:function(data) {
                            $('#searchResults').html(data);
                        }
                    })
                    $("#search").keyup(function(){
                        const input = $("#search").val();
                            $.ajax({
                                url:"liveSearch.php",
                                method: "POST",
                                data:{
                                    searchTerm:input
                                },
                                success:function(data) {
                                    $('#searchResults').html(data);
                                }
                            })
                    })
                })
            )
        </script>
</body>
</html>