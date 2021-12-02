<?php
require_once '../connect.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $about = $_POST['about'];
    $query = "UPDATE course SET course_name = ?, price = ?, description = ? WHERE id_course = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$name, $price, $about, $id]);
}
?>