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
    <title>Sign up</title>
</head>
<body>
    <form id="signupform" class="container col-md-6 mt-5" action="signup.php" method="post">
        <div class="form-group">
            <label for="name">name</label>
            <input class="form-control" type="name" name="name" id="name" placeholder="Enter name" >
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" placeholder="Enter email" >
        </div>
        <div class="form-group">
            <label for="password">password</label>
            <input class="form-control" type="password" name="password" id="password" placeholder="Enter password" >
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>
    <!-- jquery  -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
            $('#signupform').submit(function (event) {
                const name = $("#name").val();
                const email = $("#email").val();
                const pass = $('#password').val();
    
                if(name === '' || email === '' || pass === '') {
                    alert("All fields are requierd !!");
                    event.preventDefault();
                }
            })
    </script>

    <?php 
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $pass = $_POST['password'];
            $role = "user";

            $sql = "INSERT INTO `users`(`name`, `password`, `email`,`role`) VALUES ('$name','$pass','$email','$role')";
            
            $checkQuery = "SELECT * FROM `users` WHERE email='$email' AND password='$pass'";
            $result = mysqli_query($conn,$checkQuery);
            if(mysqli_num_rows($result) > 0) {
                echo "User Already Exists";
            } else {
                if(mysqli_query($conn,$sql)) {
                    header("Location: login.php");
                } else {
                    die(mysqli_error($conn));
                }
            }

        }
    ?>

</body>
</html>