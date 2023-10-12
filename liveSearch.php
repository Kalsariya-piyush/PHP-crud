<?php
    include 'connect.php';

    if(isset($_POST['searchTerm'])) {
        $input = $_POST['searchTerm'];
        $query = "SELECT * FROM `prods` WHERE title LIKE '{$input}%'";

        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result)) { ?>
            <table class="table table-bordered table-striped mt-4">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Operations</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $title = $row['title'];
                            $desc = $row['desc'];
                            $qty = $row['qty'];
                            ?>
                            <tr>
                                <td><?php echo $id ?></td>
                                <td><?php echo $title ?></td>
                                <td><?php echo $desc ?></td>
                                <td><?php echo $qty ?></td>
                                <td>
                                    <button class="btn-primary btn">
                                       <a href="edit-prod.php?id=<?php echo $id?>" class="text-light">Edit</a></button>
                                    <button class="btn-danger btn">
                                        <a href="delete.php?id=<?php echo $id?>" class="text-light">
                                            Delete
                                        </a>
                                    </button>
                                </td>
                            </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
            <?php
        } else {
            echo "No data Found";
        }
    } else {
        $input = $_POST['searchTerm'];
        $query = "SELECT * FROM `prods`";

        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result)) { ?>
            <table class="table table-bordered table-striped mt-4">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $name = $row['name'];
                            $email = $row['email'];
                            ?>
                            <tr>
                                <td><?php echo $id ?></td>
                                <td><?php echo $name ?></td>
                                <td><?php echo $email ?></td>
                            </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
            <?php
        } else {
            echo "No data Found";
        }
    }
?>