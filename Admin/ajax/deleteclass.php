<?php
require_once '../connect.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['id'];
    $query = "DELETE FROM class WHERE id_class = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
}
?>