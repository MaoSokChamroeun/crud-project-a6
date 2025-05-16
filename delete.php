<?php 

$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "product_tbl";

$conn = new mysqli($servername , $username ,$pass , $dbname);

if(!$conn){
    die("Error Connection Faild : " . mysqli_connect_error());
}
?>
<?php 
    if (isset($_GET['deleteId'])) {
        $id = intval($_GET['deleteId']); // Sanitize input
        $sql = "DELETE FROM tbl_product WHERE id = $id";
        $rs = $conn->query($sql);
    
        if ($rs === TRUE) {
            echo "Record has been deleted";
            header("Location: table.php"); // Correct header usage
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    }
 
    $conn->close();
?>