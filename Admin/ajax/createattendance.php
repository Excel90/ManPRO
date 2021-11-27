<?php
require_once '../connect.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['idc'];
    $number = $_POST['number'];
    $attn = $_POST['attn'];
    $date = $_POST['date'];
    $topic = $_POST['topic'];
    if ($number == 1) {
        $query = "INSERT INTO attendance (attendance_n, date, topic, id_class) VALUES(?,?,?,?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$attn, $date, $topic, $id]);
    }
    else if ($number == 2) {
        $name = $_POST['name'];
        $status = $_POST['status'];

        $query = "SELECT * from student where concat(first_name, ' ', last_name) = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$name]);
        $temp = $stmt->fetch();
        $sid = $temp['id_student'];

        $query = "SELECT * from attendance where attendance_n = ? and date = ? and topic = ? and id_class = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$attn, $date, $topic, $id]);
        $temp = $stmt->fetch();
        $ida = $temp['id_attendance'];

        $query = "INSERT INTO student__attendance (status, id_attendance, id_student) VALUES (?,?,?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$status, $ida, $sid]);
    }
}
?>