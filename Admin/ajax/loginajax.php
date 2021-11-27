<?php
require_once '../connect.php';
session_start();
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = "SELECT * FROM admin WHERE admin_name = ? AND password = ?";
        $loginstmt = $pdo->prepare($query);
        $loginstmt->execute([$email, md5($password)]);
        $data = $loginstmt->fetch();
        if($loginstmt->rowCount() == 1) {
            $_SESSION['id'] = $data['id_admin'];
            $_SESSION['name'] = $data['admin_name'];
            $_SESSION['status'] = "Admin";
            $result = 1;
        }
        else {
            $result = 3;   
        }
    }
    else{
        if(isset($_POST['email']) && isset($_POST['password'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $query = "SELECT * FROM teacher WHERE email = ? AND password = ?";
            $loginstmt = $pdo->prepare($query);
            $loginstmt->execute([$email, md5($password)]);
            if($loginstmt->rowCount() == 1) {
                $data = $loginstmt->fetch();
                $_SESSION['id'] = $data['id_teacher'];
                $_SESSION['first_name'] = $data['first_name'];
                $_SESSION['last_name'] = $data['last_name'];
                $_SESSION['email'] = $data['email'];
                $_SESSION['status'] = "Teacher";
                $result = 1;
            }
            else if ($loginstmt->rowCount() == 0) {
                $result = 2;
            }
        }
        else{
            $result = 0;
        }
    }
    echo $result;
}
?>