<?php
require_once '../connect.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $ids = $_POST['id'];
    $idc = $_POST['idclass'];
    $query = "DELETE FROM score WHERE id_student = ? AND id_class = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$ids, $idc]);
    $query = "DELETE FROM attendance WHERE id_student = ? AND id_class = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$ids, $idc]);
}
?>