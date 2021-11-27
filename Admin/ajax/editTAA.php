<?php
require_once '../connect.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id=1;
    $text = $_POST['text'];
    $query = "UPDATE company SET terms = ? WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$text, $id]);
}
?>