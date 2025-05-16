<?php
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $dbname = "crud";

    $conn = new mysqli($servername , $username ,$pass , $dbname);

    if(!$conn){
        die("Error Connection Faild : " . mysqli_connect_error());
    }
?>