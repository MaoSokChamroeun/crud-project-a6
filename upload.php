<?php 
        $file = $_FILES['txt-image'];
        $imgName = $file['name'];
        $ext = pathinfo($imgName, PATHINFO_EXTENSION);	
        $newName = time();
        $tmp = $file['tmp_name'];
        move_uploaded_file($tmp, '/images/'.$newName.'.'.$ext);	 
        $msg['imgName'] = $newName.'.'.$ext;
        echo json_encode($msg);
?>      