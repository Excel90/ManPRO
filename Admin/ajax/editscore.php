<?php
require_once '../connect.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['ids'];
    $number = $_POST['number'];
    if ($number == 1) {
        $scrf = $_POST['scrf'];
        $percent = $_POST['percent'];
        $query = "UPDATE score set score_for = ?, percentage = ? where id_score = ?";
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

        $query = "UPDATE student__score SET score = ? WHERE id_score = ? and id_student = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$score, $id, $sid]);
    }
}
?>