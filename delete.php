<?php 
include 'patail/conect.php';
    if (isset($_GET['deleteId'])) {
        $id = intval($_GET['deleteId']); // Sanitize input
        $sql = "DELETE FROM product_tbl WHERE id = $id";
        $rs = $conn->query($sql);
    
        if ($rs === TRUE) {
            echo "Record has been deleted";
            header("Location: display_table.php"); // Correct header usage
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    }
 
    $conn->close();
?>