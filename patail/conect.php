<?php
    $servername = "sql206.infinityfree.com";
    $username = "if0_39004689";
    $pass = "0SHhH2lIQKVTkZ";
    $dbname = "if0_39004689_crud_operation";

    $conn = new mysqli($servername , $username ,$pass , $dbname);

    if(!$conn){
        die("Error Connection Faild : " . mysqli_connect_error());
    }
?>