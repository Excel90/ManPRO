<?php
require_once '../connect.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $ids = $_POST['ids'];
    $idc = $_POST['idc'];
    $score = $_POST['score'];
    $att1 = $_POST['att1'];
    $att2 = $_POST['att2'];
    $att3 = $_POST['att3'];
    $query = "UPDATE score SET score = ? WHERE id_student = ? AND id_class = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$score, $ids, $idc]);
    $query = "UPDATE attendance SET att_1 = ?, att_2 = ?, att_3 = ? WHERE id_student = ? AND id_class = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$att1, $att2, $att3, $ids, $idc]);
}
?>