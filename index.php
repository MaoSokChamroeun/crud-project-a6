
<?php 
include 'patail/conect.php';
// echo "Connection Successful"; // Avoid echo if using header() later

$edit_data = null;
$next_id = 1;

// Check if editing
if (isset($_GET['editId'])) {
    $editId = $_GET['editId'];
    $sql = "SELECT * FROM product_tbl WHERE id = $editId";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $edit_data = $result->fetch_assoc();
    }
} else {
    // Get max ID for new entry
    $sql = "SELECT MAX(id) AS max_id FROM product_tbl";
    $result = $conn->query($sql);
    if ($result && $row = $result->fetch_assoc()) {
        $next_id = $row['max_id'] + 1;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN DASHBOARD</title>
    <link rel="stylesheet" href="edit.css?v=<?= time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class ="container">
            <h1>POST DASHBOARD</h1>
            <form action="admin.php" method="POST" enctype="multipart/form-data" class="form-control">
            <label for="">ID</label>
            <input type="text" name="txt-id" readonly value="<?php echo $edit_data ? $edit_data['id'] : $next_id; ?>">

            <label for="">Name</label>
            <input type="text" name="txt-name" >

            <label for="">Product Name</label>
            <input type="text" name="txt-product">

            <label for="">Quantity</label>
            <input type="text" name="txt-qty">

            <label for="">Status</label>
            <select name="txt-status">
                <option value="">Select status</option>
                <option value="Available">Available</option>
                <option value="Out of Stock">Out of Stock</option>
            </select>

              <div class = "image-container">
                <label for="">Upload Image</label>
                <div class = "box-image" id="box-image">
                     <input class = "input-img" type="file" name="txt-image" id = "txt-image" >
                     <img id="preview-image" class="preview-image" src="" alt="Preview">
                </div>
                
            </div>

            <label for="">Email</label>
            <input type="text" name="txt-email">

            <label for="">Password</label>
            <input type="text" name="txt-password">

            <label for="">Message</label>
            <textarea name="txt-msg"><?php echo $edit_data['message'] ?? ''; ?></textarea>
            <button type="submit" name="btn-update">POST</button>
        </form>

        <a href="display_table.php" class="btn_table">Go To Table</a>
        </div>
    
</body>
</html>
<script>
document.getElementById('txt-image').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('preview-image');
    const boxImage = document.getElementById('box-image');
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
            boxImage.style.backgroundImage = 'none';
            
        };
        reader.readAsDataURL(file);
    } else {
        preview.src = "";
        preview.style.display = 'none';
        boxImage.style.backgroundImage = 'url("https://icons.veryicon.com/png/o/miscellaneous/common-fill-icon/gallery-33.png")';
    }
});
</script>
