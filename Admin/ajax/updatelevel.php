<?php
require_once '../connect.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id=$_POST['id'];
    $status=$_POST['status'];
    if ($status == 1) {
        $query = "UPDATE student SET level = ? where id_student = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['Beginner', $id]);
    }
    else if ($status == 2) {
        $query = "UPDATE student SET level = ? where id_student = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['Intermediate', $id]);
    }
    else if ($status == 3) {
        $query = "UPDATE student SET level = ? where id_student = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['Advance', $id]);
    }
}
?>