<?php
    include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Login</title>
</head>
<body>
    <form id="signupform" class="container col-md-6 mt-5" action="login.php" method="post">
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" placeholder="Enter email" >
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password" placeholder="Enter password" >
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>

    <!-- jquery  -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
            $('#signupform').submit(function (event) {
                const email = $("#email").val();
                const pass = $('#password').val();
    
                if(email === '' || pass === '') {
                    alert("All fields are requierd !!");
                    event.preventDefault();
                }
            })
    </script>

    <?php 
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $pass = $_POST['password'];

            $checkQuery = "SELECT * FROM `users` WHERE email='$email' AND password='$pass'";

            $result = mysqli_query($conn,$checkQuery);

            if(mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                session_start();
                $_SESSION['name'] = $row['name'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['username'] = $row['email'];
                header("Location: index.php");
                exit();
            } else {
                echo "User Does Not Exists";
                exit();
            }

        }
    ?>

</body>
</html>