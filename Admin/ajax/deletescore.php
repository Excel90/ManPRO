<?php
require_once '../connect.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['id'];

    $query = "DELETE FROM student__score WHERE id_score = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    $query = "DELETE FROM score WHERE id_score = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
}
?>