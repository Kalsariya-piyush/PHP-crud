<?php 
    include "connect.php";

    if(isset($_GET["id"])) {
        $eid = $_GET["id"];

        $query = "SELECT * FROM `prods` WHERE id=$eid";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($result);
        $title = $row["title"];
        $desc = $row["desc"];
        $qty = $row["qty"];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'];
        $desc = $_POST['desc'];
        $qty = $_POST['qty'];

            $sql = "UPDATE `prods` SET `title`='$title',`desc`='$desc',`qty`='$qty' WHERE id=$eid";
        
            if(mysqli_query($conn,$sql)) {
                header("Location: index.php");
            } else {
                die(mysqli_error($conn));
            }

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Add Product</title>
</head>
<body>
        <?php 
            include 'header.php';
        ?>

    <form id="addprod" class="container col-md-6 mt-5" method="post">
        <div class="form-group">
            <label for="title">title</label>
            <input value="<?php echo $title ?>" class="form-control" type="title" name="title" id="title" placeholder="Enter title" >
        </div>
        <div class="form-group">
            <label for="desc">desc</label>
            <input value="<?php echo $desc ?>" class="form-control" type="desc" name="desc" id="desc" placeholder="Enter desc" >
        </div>
        <div class="form-group">
            <label for="qty">qty</label>
            <input value="<?php echo $qty ?>" class="form-control" type="qty" name="qty" id="qty" placeholder="Enter qty" >
        </div>

        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
    <!-- jquery  -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
            $('#addprod').submit(function (event) {
                const title = $("#title").val();
                const desc = $("#desc").val();
                const qty = $('#qty').val();
    
                if(title === '' || desc === '' || qty === '') {
                    alert("All fields are requierd !!");
                    event.preventDefault();
                }
            })
    </script>

</body>
</html>