<?php 
    include 'patail/conect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Table</title>
    <link rel="stylesheet" href="table.css?v=<?= time(); ?>">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <h1>PRODUCT</h1>
        <div class ="table">
        <table border='1' cellpadding='10' >
        <tr>
                <th style = "width : 50">ID</th>
                <th style = "width : 200">Name</th>
                <th style = "width : 150">Product</th>
                <th style = "width : 50">Quantity</th>
                <th style = "width : 200">Status</th>
                <th style = "width : 250">Image</th>
                <th style = "width : 300">Email</th>
                <th style = "width : 300">Password</th>
                <th style = "width : 400">Message</th>
                <th style = "width : 400">UPDATE</th>
                <th style = "width : 400">DELETE</th>
            </tr>
  
        <?php
    $sql = "SELECT * FROM product_tbl ORDER BY id DESC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // Output data in a table
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>" . $row["id"] . "</td>
        <td>" . $row["name"] . "</td>
        <td>" . $row["p_name"] . "</td>
        <td>" . $row["qty"] . "</td>
        <td>" . $row["status"] . "</td>
        <td><img src='uploads/" . htmlspecialchars($row['img']) . "' alt='" . htmlspecialchars($row['img']) . "' width='150'></td>
        <td>" . $row["email"] . "</td>
        <td>" . $row["password"] . "</td>
        <td>" . $row["message"] . "</td>
        <td><a href='edit.php?editId=" . $row["id"] . "'><i class='fa fa-edit'></i></a></td>
        <td><a class='btn-delete' href='delete.php?deleteId=" . $row["id"] . "'><i class='fa fa-trash'></i></a></td>
      </tr>";
    }
    echo "</table>";
    } else {
        echo "No records found.";
    }

    $conn->close();
    ?>
  </table>
         <a href="index.php">Back Home</a>
    </div>
</body>
</html>