<?php
require_once '../connect.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $cn = $_POST['cn'];
    $con = $_POST['con'];
    $tn = $_POST['tn'];
    $sd = $_POST['sd'];
    $ed = $_POST['ed'];
    $query = "SELECT * from course where course_name = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$con]);
    $temp = $stmt->fetch();
    $cid = $temp['id_course'];

    $query = "SELECT * from teacher where concat(first_name, ' ', last_name) = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$tn]);
    $temp = $stmt->fetch();
    $tid = $temp['id_teacher'];
    
    $query = "INSERT INTO class (class_name, id_course, id_teacher, start_date, end_date) VALUES(?,?,?,?,?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$cn, $cid, $tid, $sd, $ed]);
}
?>