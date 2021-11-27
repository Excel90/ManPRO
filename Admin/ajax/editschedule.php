<?php
require_once '../connect.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['id'];
    $cn = $_POST['cn'];
    $days = $_POST['days'];
    $time = $_POST['time'];
    $dur = $_POST['dur'];
    $loc = $_POST['loc'];

    $query = "SELECT * from class where class_name = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$cn]);
    $temp = $stmt->fetch();
    $cid = $temp['id_class'];

    $query = "UPDATE schedule SET days = ?, time = ?, duration = ?, location = ?, id_class = ? WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$days, $time, $dur, $loc, $cid, $id]);
}
?>