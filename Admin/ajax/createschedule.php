<?php
require_once '../connect.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
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

    $query = "INSERT INTO schedule (days, time, duration, location, id_class) VALUES(?,?,?,?,?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$days, $time, $dur, $loc, $cid]);
}
?>