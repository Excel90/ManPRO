<?php
require_once "../databased.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if(isset($_SESSION['username'])){
        $sql = "SELECT * FROM `student` WHERE `id_student` = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_SESSION['username']]);
        $fetch = $stmt->fetch();
        $studentid = $fetch['id_student'];
        $studentname =$fetch['first_name'];
        $idclass = $_SESSION['id_class'];
        $_SESSION['id_class'] = "";
        // Where the file is going to be stored
    
        print_r($_FILES);
        print_r($_FILES['berkas']['type']);
    
        if ($_FILES['berkas']['type'] == "image/jpeg" or $_FILES['berkas']['type'] == "image/png") {
            $target_dir = "../uploads/Payment/";
            $_FILES['berkas']['name'] = $studentid.$studentname.".jpg";
            $file = $_FILES['berkas']['name'];
            $path = pathinfo($file);
            $filename = $path['filename'];
            $ext = $path['extension'];
            $temp_name = $_FILES['berkas']['tmp_name'];
            $path_filename_ext = $target_dir . $filename;
    
            $sql = "SELECT * FROM `upload` WHERE `id_student` = (?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$studentid]);
            $fetch = $stmt->fetch();

            // Check if file already exists
            if($fetch['status_verify'] == 0){
                $path_filename_ext = $path_filename_ext . $stmt->rowCount() . "." . $ext;
                move_uploaded_file($temp_name, $path_filename_ext);
                $sql = "UPDATE `upload` SET `path_file` = ? WHERE `id_student` = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$path_filename_ext, $studentid]);
                echo header("Location: ../student/student.php?success");
            } else {
                $path_filename_ext = $path_filename_ext . $stmt->rowCount() . "." . $ext;
                move_uploaded_file($temp_name, $path_filename_ext);
                $sql = "INSERT INTO `upload` VALUES (default, ?, ?, '0', '0', ?)";

                $stmt = $pdo->prepare($sql);
                $stmt->execute([$studentid,$idclass, $path_filename_ext]);
                echo header("Location: ../student/student.php");
            }
        }
        else {
            
            echo header("Location: ../student/student.php?error=1");
        }
    }
}
else {
    echo header("Location: ../student/student.php");
}
?>