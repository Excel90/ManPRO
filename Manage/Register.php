<?php
require_once "../databased.php";
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_second = $_POST['password_second'];
    $first = $_POST['firstname'];
    $last = $_POST['lastname'];
    $birthdate= $_POST['birthdate'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $today = new DateTime(date("Y-m-d"));

    $sql = "SELECT * FROM `student` WHERE `email` = (?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);

    $fetch = $stmt->fetch();
    $studentid = $fetch['id_student'];


    if ($stmt->rowcount() >= 1) {
        echo header("Location: ../signin.php?error=1");
    } else {
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);
        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            echo header("Location: ../signin.php?error=2");    
        }
        else if ($password != $password_second) {
            echo header("Location: ../signin.php?error=3");
        }
        else {
            $hashPassword = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO student VALUES (default, ?, ?, ?, ?, ?, ?, ?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$first,$last,$address,$birthdate,$city,$email,$hashPassword,'../uploads/Generic/generic.png','Beginner']);

            echo header("Location: ../signin_complete.php");
        }
    }

} else {
    echo header("Location: ../student/student.php");
}
?>