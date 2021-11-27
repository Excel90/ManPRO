<?php
require_once "../databased.php";
$first = $_POST['firstname'];
$last = $_POST['lastname'];
$birthdate= $_POST['birthdate'];
$address = $_POST['address'];
$city = $_POST['city'];
$email = $_POST['email'];

$sql = "SELECT * FROM `student` WHERE `id_student` = (?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$_SESSION['username']]);
$fetch = $stmt->fetch();
$studentid = $fetch['id_student'];
$studentname = $fetch['first_name'];

$target_dir = "../uploads/Profile/";
$_FILES['berkas']['name'] = $studentid.$studentname.".jpg";
$file = $_FILES['berkas']['name'];
$path = pathinfo($file);
$filename = $path['filename'];
$ext = $path['extension'];
$path_filename_ext = $target_dir . $filename . "." . $ext;

move_uploaded_file($_FILES['berkas']['tmp_name'], $path_filename_ext);
$sql = "UPDATE `student` SET `first_name` = ?, `last_name` = ?, `address` = ?, `birth_date` = ?, `birth_place` = ?, `email` = ?, `picture` = ? WHERE `student`.`id_student` = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$first,$last,$address,$birthdate,$city,$email,$path_filename_ext,$studentid]);

echo header("Location: ../student/student.php");