<?php
require_once '../connect.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['idc'];
    $number = $_POST['number'];
    $scrf = $_POST['scrf'];
    $percent = $_POST['percent'];
    if ($number == 1) {
        $query = "INSERT INTO score (score_for, percentage, id_class) VALUES(?,?,?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$scrf, $percent, $id]);
    }
    else if ($number == 2) {
        $name = $_POST['name'];
        $score = $_POST['score'];

        $query = "SELECT * from student where concat(first_name, ' ', last_name) = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$name]);
        $temp = $stmt->fetch();
        $sid = $temp['id_student'];

        $query = "SELECT * from score where score_for = ? and percentage = ? and id_class = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$scrf, $percent, $id]);
        $temp = $stmt->fetch();
        $ids = $temp['id_score'];

        $query = "INSERT INTO student__score (score, id_score, id_student) VALUES (?,?,?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$score, $ids, $sid]);
    }
}
?>