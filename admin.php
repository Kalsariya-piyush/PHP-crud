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
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<?php 
        include 'header.php';
        echo "<p?>"."Hiiii ".$name."</p>";
    ?>
</body>
</html>