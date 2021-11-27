<?php
require_once '../connect.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $idc = $_POST['idc'];
    $score = $_POST['score'];
    $att1 = $_POST['att1'];
    $att2 = $_POST['att2'];
    $att3 = $_POST['att3'];
    $query = "SELECT * FROM student WHERE student_name = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$name]);
    $result= [];
    $result = $stmt->fetch();
    $id = $result['id_student'];
    $query = "INSERT INTO score(id_student, id_class, score) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id, $idc, $score]);
    $query = "INSERT INTO attendance(id_student, id_class, att_1, att_2, att_3) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id, $idc, $att1, $att2, $att3]);
}
?>