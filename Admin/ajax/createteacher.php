<?php
require_once '../connect.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $fn = $_POST['fn'];
    $ln = $_POST['ln'];
    $add = $_POST['add'];
    $email = $_POST['email'];
    $bd = $_POST['bd'];
    $bp = $_POST['bp'];
    $pass = $_POST['pass'];
    $query = "INSERT INTO teacher (first_name, last_name, address, email, birth_date, birth_place, password) VALUES(?,?,?,?,?,?,?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$fn, $ln, $add, $email, $bd, $bp, md5($pass)]);
}
?>