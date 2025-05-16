<?php
$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "crud";

$conn = new mysqli($servername, $username, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If the form was submitted (POST request)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['txt-id'];
    $name = $_POST['txt-name'];
    $product = $_POST['txt-product'];
    $qty = $_POST['txt-qty'];
    $status = $_POST['txt-status'];
    $image = $_FILES['txt-image']['name'];
    $tmp_image = $_FILES['txt-image']['tmp_name'];
  // Hardcoded image name for now, modify as needed
    $email = $_POST['txt-email'];
    $password = $_POST['txt-password'];
    $msg = $_POST['txt-msg'];

    
    if (isset($_FILES['txt-image']) && $_FILES['txt-image']['error'] == 0) {
        $image = $_FILES['txt-image']['name'];
        $tmp_image = $_FILES['txt-image']['tmp_name'];
        // Move file to desired location
        move_uploaded_file($tmp_image, "uploads/" . $image);
    } else {
        $image = ''; // or handle it another way if image isn't uploaded
    }

    // Check if any required field is empty
    if (
        empty($id) || empty($name) || empty($product) || empty($qty) || 
        empty($status) || empty($image) || empty($email) || empty($password) || empty($msg)
    ) {
        echo "Please fill in all fields.";
    } else {
        // Insert new record if the id does not exist
        $checkSql = "SELECT id FROM product_tbl WHERE id = '$id'";
        $result = $conn->query($checkSql);

        if ($result && $result->num_rows == 0) {
            // ID doesn't exist, so insert new record
            $sql = "INSERT INTO product_tbl (id, name, p_name, qty, status, img, email, password, message)
                    VALUES ('$id', '$name', '$product', '$qty', '$status', '$image', '$email', '$password', '$msg')";

            if ($conn->query($sql) === TRUE) {
                echo "New record inserted into the table.";
                header("Location: index.php"); // Redirect after insertion
                exit();
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            // ID exists, so update the existing record
                $updateSql = "UPDATE product_tbl SET 
                    name = '$name',
                    p_name = '$product',
                    qty = '$qty',
                    status = '$status',
                    email = '$email',
                    img = '$image',
                    password = '$password',
                    message = '$msg'
                    WHERE id = '$id'";

            if ($conn->query($updateSql) === TRUE) {
                echo "Record updated successfully.";
                header("Location: table.php"); // Redirect after updating
                exit();
            } else {
                echo "Error: " . $conn->error;
            }
        }
    }
}



?>

