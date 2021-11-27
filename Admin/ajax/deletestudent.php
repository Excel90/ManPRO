<?php
require_once '../connect.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['id'];
    $query = "DELETE FROM student WHERE id_student = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
}
?>