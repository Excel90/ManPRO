<?php
require_once '../connect.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['id'];
    $fn = $_POST['fn'];
    $ln = $_POST['ln'];
    $add = $_POST['add'];
    $email = $_POST['email'];
    $bd = $_POST['bd'];
    $bp = $_POST['bp'];
    $query = "UPDATE student SET first_name = ?, last_name = ?, address = ?, email = ?, birth_date = ?, birth_place = ? WHERE id_student = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$fn, $ln, $add, $email, $bd, $bp, $id]);
}
?>